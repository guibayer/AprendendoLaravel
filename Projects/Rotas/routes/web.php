<?php

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('pagina');
});

Route::get('/ola', function () {
    return "<h1>Eaiiiiiiiiii parceiro</h1>";
});

Route::get('/nome/{nome}', function($nome){
    return "<h1>Ola $nome</h1>";
});

Route::get('/seunomecomregra/{nome}/{n}', function($nome, $n){
    for ($i = 0; $i < $n; $i++){
        echo "<h1>Olá $nome</h1>";
    }
})->where('n', '[0-9]+')->where('nome', '[A-Za-z]+');

Route::get('/seunomesemregra/{nome?}', function($nome = null){
    if(isset($nome)){
        echo "<h1>Olá, $nome!</h1>";
    }
    else{
        echo "Você não passou nenhum nome";
    }
});

Route::prefix('app')->group(function(){
    Route::get('/', function(){
       return 'Pagina principal do app';
    });
    Route::get('/profile', function(){
        return 'Perfil';
    });
    Route::get('/about', function(){
        return 'Sobre';
    });
});

Route::redirect('/aqui', '/ola', 301);

Route::view('/hello', 'hello');

Route::view('/viewnome', 'hellonome',
    ['nome'=>'Joao', 'sobrenome'=>'Silva']);

Route::get('/hellonome/{nome}/{sobrenome}', function($nome, $sobrenome){
    return view('hellonome', ['nome'=> $nome, 'sobrenome'=> $sobrenome]);
});

Route::get('/rest/hello', function(){
    return "Hello (GET)";
});

Route::post('/rest/hello', function(){
    return "Hello (POST)";
});

Route::put('/rest/hello', function(){
    return "Hello (PUT)";
});

Route::delete('/rest/hello', function(){
    return "Hello (DELETE)";
});

Route::patch('/rest/hello', function(){
    return "Hello (PATCH)";
});

Route::options('/rest/hello', function(){
    return "Hello (OPTIONS)";
});

Route::post('/rest/imprimir', function(Request $req){
    $nome = $req->input('nome');
    return "Hello $nome!!(POST)";
});

Route::match(['get', 'post'], '/rest/hello2', function(){
    return "Hello World2";
});

Route::get('/produtos', function(){
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebook</li>";
    echo "<li>Impressora</li>";
    echo "<li>Mouse</li>";
    echo "</ol>";
})->name('meusProdutos');

Route::get('/linkprodutos', function(){
    $url = route('meusProdutos');
    echo "<a href=\"" . $url . "\">Meus Produtos</a>";
});

Route::get('/redirecionarprodutos', function(){
   return redirect()->route('meusProdutos');
});

Route::get('/nome', 'MeuControlador@getNome');

Route::get('/nome', 'MeuControlador@getIdade');

Route::get('/multiplicar/{n1}/{n2}', 'MeuControlador@multiplicar');

Route::get('/nomeID/{id}', 'MeuControlador@getNomeByID');

Route::resource('/cliente', 'ClienteControlador');

Route::get('/ola', function(){
    return view('minhaview')
        ->with('nome', 'Joao')
        ->with('sobrenome', 'Silva');
});

Route::get('/ola/{nome}/{sobrenome}', function($nome, $sobrenome){
    /*return view('minhaview')
        ->with('nome', $nome)
        ->with('sobrenome', $sobrenome);
    */
    $parametros = ['nome' => $nome, 'sobrenome' => $sobrenome];
    return view('minhaview', $parametros);
});

Route::get('/email/{email}', function($email){
    if(View::exists('email'))
        return view('email');
    else
        return view('erro');
});

Route::get('/produtos', 'ProdutoControlador@listar');

Route::get('/secaoprodutos/{palavra}', 'ProdutoControlador@secaoprodutos');

Route::get('/mostraropcoes', 'ProdutoControlador@mostrar_opcoes');

Route::get('/opcoes/{opcao}', 'ProdutoControlador@opcoes');

Route::get('/loop/for/{n}', 'ProdutoControlador@loopFor');

Route::get('/loop/foreach', 'ProdutoControlador@loopForeach');

