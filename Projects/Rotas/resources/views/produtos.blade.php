<html>
<head>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>

    @if(isset($produtos))
        @foreach($produtos as $p)
            <p>Nome: {{$p}}</p>
        @endforeach
    @else
        <h2>Variável produtos não foi passada como parâmetro.</h2>
    @endif


<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>