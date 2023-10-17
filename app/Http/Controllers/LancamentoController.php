<?php

namespace App\Http\Controllers;

use App\Models\Foguete;
use App\Models\Lancamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LancamentoController extends Controller
{


    public function CriarLancamento(Request $request, int $id)
    {
        $foguete = Foguete::find($id);

        $existeLancamento = Lancamento::where('foguete_id', $id)
            ->exists();

        if ($existeLancamento) {
            return response()->json(["message" => "Já existe um lançamento para este foguete nesta data"], 400);
        }

        $lancamento = new Lancamento();

        $lancamento->foguete_id = $id;
        $lancamento->data_de_lancamento = $request->input('data');
        $foguete->status = 'lançado';
        $lancamento->lucro = $request->input('lucro');
        $lancamento->foguete_nome = $foguete->nome;
        $lancamento->foguete_imagem = $foguete->imagem;

        $lucro = $foguete->custo * ($lancamento->lucro / 100);
        $valorComLucro = $foguete->custo + $lucro;

        $lancamento->valor = $valorComLucro;
        $lancamento->faturamento = $valorComLucro - $foguete->custo;

        $lancamento->save();
        $foguete->save();

        return response()->json($lancamento, 202);
    }

    public function TodosLancamentos()
    {

        $lancamentos = Lancamento::all();



        return response()->json($lancamentos);
    }
}
