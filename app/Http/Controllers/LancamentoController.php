<?php

namespace App\Http\Controllers;

use App\Models\Foguete;
use App\Models\Lancamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LancamentoController extends Controller
{


    public function CriarLancamento(Request $request,int $id)
    {


        $foguete = Foguete::find($id);

        $lancamento = new Lancamento();

        $lancamento->foguete_id = $id;
        $lancamento->data_de_lancamento = $request->input('data');
        $lancamento->status = True;
        $lancamento->lucro = $request->input('lucro');

        $lucro = $foguete->custo * ($lancamento->lucro / 100);
        $valorComLucro = $foguete->custo + $lucro;

        $lancamento->valor = $valorComLucro;

        $lancamento->faturamento = $valorComLucro - $foguete->custo;

        // $lancamento->save();


        return response()->json($lancamento, 202);

    }

    public function TodosLancamentos()
    {

        $lancamentos = Lancamento::all();

        return response()->json($lancamentos);

    }


}
