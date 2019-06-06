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

        if($filtro){
            $resumo = $request->input('resumo_filtro');

            if($resumo){ 
                $dados['contas']  = Despesa::filtrarPeloResumo($dados, $resumo);
            }

            return view('despesa.contas', compact('dados'));
        }

        return view('despesa.despesas', compact('dados'));
    }

    public static function filtrarPeloResumo($dados, $filtro)
    {
        $arrayFiltrado = [];

        foreach ($dados['contas'] as $key => $row) {
            if(strchr($row['resumo'], $filtro))
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

        if($data < $dataAtual)
            return 'style="border-left: 6px solid red; color: red;" data-toggle="tooltip" data-placement="right" title="Essa conta já está vencida a '.$prazoDias.' dias."';

        switch($prazoDias){
            case $prazoDias > 60:
                $cor = 'green';
                break;
            case $prazoDias > 30:
                $cor = 'orange';
                break;
            default:
                $cor = 'red';
                break;
        }

        return 'style="border-left: 6px solid '.$cor.';" data-toggle="tooltip" data-placement="right" title="Faltam '.$prazoDias.' dias para o vencimento dessa conta."';
    }
}
