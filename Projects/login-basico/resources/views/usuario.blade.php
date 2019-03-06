@auth
<h4>Olá {{Auth::user()->name}} seu email é: {{Auth::user()->email}} </h4>
@endauth

@guest
    <h4>Você não está logado</h4>
@endguest