<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <title>Contas - {{$dados['nome']}}</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Contas - {{$dados['nome']}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>Informações</h3>
                <ul>
                    <li>Nome: {{$dados['nome']}}</li>
                    <li>Email: {{$dados['email']}}</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <form method="GET" action="/" accept-charset="UTF-8" id="form-filtro">
                <div class="col-md-12">
                    <div class="input-group">
                        <input type="text" name="filtro" class="form-control">
                        <div class="input-group-append">
                            <button type="submit" id="button-filtro" class="btn btn-primary">Filtrar</button>
                        </div>   
                        <a href="{{url('/')}}" class="btn btn-primary" style="margin-left: 15px; border-radius: 0px !important">Limpar Filtro</a>
                    </div>
                </div>
            </form>
        </div>
        <br/>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Resumo</th>
                            <th>Título</th>
                            <th>Vencimento</th>
                            <th>Valor</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                                $valorTotal = 0
                            @endphp
                            @foreach ($dados['contas'] as $row)
                                <tr {!! \App\Models\Despesa::verificarVencimento($row['vencimento']) !!}>

                                    <td>{{$row['resumo']}}</td>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>