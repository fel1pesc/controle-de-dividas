@php
    $valorTotal = 0
@endphp
@foreach ($dados['contas'] as $row)
    <tr {!! \App\Models\Despesa::verificarVencimento($row['vencimento']) !!}>
        <td id='teste'>{{$row['resumo']}}</td>
        <td>{{$row['titulo']}}</td>
        <td>{{date_format(date_create($row['vencimento']), 'd/m/Y')}}</td>
        <td>R$ {{number_format($row['valor'], 2 ,',', '.')}}</td>
    </tr>
    @php $valorTotal += $row['valor'] @endphp
@endforeach
<tr>
    <td colspan="3" style="text-align: right; font-weight: bold;">Total:</td>
    <td>R$ {{number_format($valorTotal, 2 ,',', '.')}}</td>
</tr>