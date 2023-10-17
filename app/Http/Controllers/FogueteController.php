<?php

namespace App\Http\Controllers;

use App\Models\Foguete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FogueteController extends Controller
{


    // Salvar foguetes no banco de dados

    public function SalvarFoguetes()
    {
        $response = Http::withoutVerifying();

        $foguetes = $response->get('https://api.spacexdata.com/v3/rockets')->json();

        foreach ($foguetes as $fogueteData) {

            $foguete = Foguete::where('nome', $fogueteData['rocket_name'])->first();

            if ($foguete){
                return response()->json(["message" => "Dados dos Foguetes da SpaceX já salvos"], 202);
            }

            if (!$foguete) {
                Foguete::create([
                    'nome' => $fogueteData['rocket_name'],
                    'status' => 'não lançado',
                    'custo' => $fogueteData['cost_per_launch'],
                    'imagem' => $fogueteData['flickr_images'][0],
                    'motor_tipo' => $fogueteData['engines']['type'],
                    'motor_ver' => $fogueteData['engines']['version']
                ]);
            }
        }

        return response()->json(["message" => "Dados dos foguetes da SpaceX salvos com sucesso"], 202);
    }


    // retorna Todos os foguetes

    public function TodosFoguetes()
    {
        $foguetes = Foguete::all();

        return response()->json($foguetes);
    }

    // busca um foguete

    public function UmFoguete($id)
    {
        $foguete = Foguete::find($id);

        return response()->json($foguete);
    }
}
