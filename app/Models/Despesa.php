<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    public static function listarDespesas($request)
    {
        $filtro = $request->input('filtro');

        $dados  = Despesa::obterDadosJson(base_path('files/contas.json'));

        if($filtro)
            $dados['contas']  = Despesa::filtro($dados, $filtro);

        return view('despesa.despesas', compact('dados'));
    }

    public static function filtro($dados, $filtro)
    {
        $arrayFiltrado = [];

        foreach ($dados['contas'] as $key => $row) {
            if($row['resumo'] == $filtro)
                array_push($arrayFiltrado, $row);
        }

        return $arrayFiltrado;
    }

    public static function obterDadosJson($path)
    {
        $pathJson = file_get_contents($path);
        $data = json_decode($pathJson, true);

        return $data;
    }

    public static function verificarVencimento($data)
    {
        $dataAtual = Carbon::now()->format('Y-m-d');
        $prazoDias = Carbon::parse($data)->diffInDays($dataAtual);
        $cor = '';

        if ($prazoDias >= 60)
            $cor = 'green';
        elseif ($prazoDias >= 30)
            $cor = 'orange';
        else
            $cor = 'red';




        return 'style="color:'.$cor.';" data-toggle="tooltip" data-placement="right" title="Faltam '.$prazoDias.' dias para o vencimento dessa conta." id="tr-tooltip"';
    }
}
