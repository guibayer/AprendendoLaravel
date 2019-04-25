<html>
<head>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/my.css') }}" rel="stylesheet">

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Myrmidon Team</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    body{
        background-color:white;
    }

    .indexdiv{
        margin-left:4%;
    }

    .indexdiv h1 {
        margin-top:10px;
        margin-bottom:10px;
        text-align: center;
    }
    </style>
</head>
<body>
    @component('component_navbar_top')
    @endcomponent
    <main role="main">
        <div class="row">
        @hasSection('body')
            @yield('body')
        @endif
        </div>
    </main>

    @component('component_footer')
    @endcomponent

    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

</body>
</html>