<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <title>Paginação</title>

    <style>
        body {
            padding:20px;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                Tabela de Clientes
            </div>
            <div class="card-body">
                <h5 class="card-title" id="cardTitle">hello</h5>
                <table class="table table-hover" id="tabelaCliente">
                    <thead>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Sobrenome</th>
                        <th scope="col">E-mail</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>gui</td>
                            <td>bayer</td>
                            <td>gui@bayer.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <nav id="paginator">
                    <ul class="pagination">
<!--
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">2</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                        </li>
-->
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>

    <script type="text/javascript">

        function getItemProximo(data){
            if(data.current_page == data.last_page){
                return '<li class="page-item disabled"></li>';
            }else{
                i = data.current_page+1;
                return '<li class="page-item"><a class="page-link"  pagina = "'+ i + '" href="javascript:void(0)">Próximo</a></li>';
            }
        }

        function getItemAnterior(data){
            if(1 == data.current_page){
                return '<li class="page-item disabled"></li>';
            }else{
                i = data.current_page-1;
                return '<li class="page-item"><a class="page-link"  pagina = " '+ i + '" href="javascript:void(0)">Anterior</a></li>';
            }
        }

        function getItem(data, i){
            if(i == data.current_page){
                return '<li class="page-item active"><a class="page-link" href="#">' + i + '</a></li>';
            }else{
                return '<li class="page-item"><a class="page-link" pagina = "'+ i + '" href="javascript:void(0)">' + i + '</a></li>';
            }
        }

        function montarPaginator(data){
            $('#paginator>ul>li').remove();
            $('#paginator>ul').append(getItemAnterior(data));

            n = data.per_page;
            if(data.current_page - n/5 <=1 ){
                inicio = 1;
            }else if(data.last_page - data.current_page < n){
                inicio = data.last_page - n + 1;
            }
            else{
                inicio = data.current_page - n/2;
            }

            fim = inicio + n - 1;

            for(i = inicio; i < fim; i++){
                s = getItem(data, i);
                $('#paginator>ul').append(s);
            }

            $('#paginator>ul').append(getItemProximo(data));
        }

        function montarLinha(cliente) {
            return '<tr>' +
                '<td>' + cliente.id + '</td>' +
                '<td>' + cliente.nome + '</td>' +
                '<td>' + cliente.sobrenome + '</td>' +
                '<td>' + cliente.email + '</td>' +
            '</tr>';
        }

        function montarTabela(data){
            $("#tabelaCliente>tbody>tr").remove();
            for (i = 0;  i< data.data.length;i++){
                s = montarLinha(data.data[i]);
                $("#tabelaCliente>tbody").append(s);
            }
        }

        function carregarClientes(pagina){
            $.get('/json', {page: pagina}, function(resp){
                console.log(resp);
                montarTabela(resp);
                montarPaginator(resp);
                $('#paginator>ul>li>a').click(function(){
                    carregarClientes($(this).attr('pagina'));
                })
                $('#cardTitle').html("Exibindo " + resp.per_page + " cliente de " + resp.total + " ( " + resp.from + " a "
                + resp.to + " )");
            })
        }

        $(function(){
            carregarClientes(8);

        })

    </script>
</body>
</html>
