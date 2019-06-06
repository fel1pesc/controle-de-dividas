<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contas - {{$dados['nome']}}</title>

    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('jquery/jquery-3.4.1.min.js') }}"></script>
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
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" name="resumo-filtro" id="resumo_filtro" class="form-control">
                    <div class="input-group-append">
                        <button type="button" id="button_filtro" class="btn btn-primary">Filtrar</button>
                    </div>   
                    <a href="{{url('')}}" id="limpar_form_filtro" class="btn btn-primary" style="margin-left: 15px; border-radius: 0px !important">Limpar Filtro</a>
                </div>
            </div>
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
                        <tbody id="table">
                            @includeIf('despesa.contas')
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="{{ asset('js/despesas.js') }}"></script>
</html>