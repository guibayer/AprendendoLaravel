<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produtos', 'ProdutoControlador@index');

Route::get('/negado', function (){
    return "Acesso negado.";
})->name('negado');
Route::get('/negadologin', function (){
    return "Prezado usuário, você precisa ser admin para acessar essa página.";
})->name('negadologin');

Route::post('/login', function(Request $req){
    $login_ok = false;
    $admin = false;
    switch($req->input('user')){
        case 'joao':
            $login_ok = $req->input('password') === "senhajoao"; //Três iguais => verifica se os valores e o tipo são iguais
            $admin = true;
            break;
        case 'marcos':
            $login_ok = $req->input('password') === "senhamarcos";
            break;
        case 'default':
            $login_ok = false;
            break;
    }
    if($login_ok){
        $login = ['user' => $req->input('user'), 'admin' => $admin];
        $req->session()->put('login', $login);
        return response("Login OK", 200);
    }else{
        $req->session()->flush();
        return response("Erro no Login", 404);
    }
});

Route::get('/logout', function(Request $request){
    $request->session()->flush();
    return response('Deslogado com sucesso', 200);
});