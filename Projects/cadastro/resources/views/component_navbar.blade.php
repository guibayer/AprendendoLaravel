<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if($current=="home") active @endif">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link @if($current=="produtos") active @endif" href="/produtos">Produtos</a>
            </li>
             <li class="nav-item ">
                <a class="nav-link @if($current=="categorias") active @endif" href="/categorias">Categorias</a>
            </li>
        </ul>
    </div>
</nav>