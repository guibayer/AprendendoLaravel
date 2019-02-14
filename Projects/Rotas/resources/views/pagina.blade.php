<html>
<head>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>

    @alerta()
        @slot('tipo')
            danger
        @endslot
        @slot('titulo')
            <h1>Erro fatalll</h1>
        @endslot
        <strong>Erro: </strong> Sua mensagem de erro.
    @endalerta


    <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>