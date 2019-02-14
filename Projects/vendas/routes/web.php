<?php

use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function(){
    $cats = DB::table('categorias')->get();
    foreach($cats as $c){
        echo "id: " . $c->id . "; ";
        echo "nome: " . $c->nome . "; <br>";
    }

    echo "<hr>";

    $nomes = DB::table('categorias')->pluck('nome');
    foreach($nomes as $nome){
        echo "$nome <br>";
    }

    echo " <hr>";

    $cats = DB::table('categorias')->where('id', 1)->get();

    foreach($cats as $c){
        echo "id: " . $c->id . "; ";
        echo "nome: " . $c->nome . "; <br>";
    }

    echo "<hr> <p>Retorna um array utilizando like: </p>";

    $nomes = DB::table('categorias')->where('nome', 'like', '%p%')->get();

    foreach($nomes as $c){
        echo "id: " . $c->id . "; ";
        echo "nome: " . $c->nome . "; <br>";
    }

    echo "<hr> <p>Sentenças lógicas </p>";

    $nomes = DB::table('categorias')->where('id', 1)->orWhere('id', 2)->get();

    foreach($nomes as $c){
        echo "id: " . $c->id . "; ";
        echo "nome: " . $c->nome . "; <br>";
    }

    echo "<hr> <p>Intervalos </p>";

    $nomes = DB::table('categorias')->whereBetween('id', [1,2])->get();

    foreach($nomes as $c){
        echo "id: " . $c->id . "; ";
        echo "nome: " . $c->nome . "; <br>";
    }

    echo "<hr> <p>Intervalos </p>";

    $nomes = DB::table('categorias')->whereNotBetween('id', [1,2])->get();

    foreach($nomes as $c){
        echo "id: " . $c->id . "; ";
        echo "nome: " . $c->nome . "; <br>";
    }

    echo "<hr> <p>Intervalos </p>";

    $nomes = DB::table('categorias')->whereIn('id', [1,3,4])->get();

    foreach($nomes as $c){
        echo "id: " . $c->id . "; ";
        echo "nome: " . $c->nome . "; <br>";
    }

    echo "<hr> <p>Intervalos </p>";

    $nomes = DB::table('categorias')->whereNotIn('id', [1,3,4])->get();

    foreach($nomes as $c){
        echo "id: " . $c->id . "; ";
        echo "nome: " . $c->nome . "; <br>";
    }

    echo "<hr> <p>Sentenças lógicas </p>";

    $nomes = DB::table('categorias')->where([
        ['id', 1],
        ['nome', 'Roupas']
    ])->get();

    foreach($nomes as $c){
        echo "id: " . $c->id . "; ";
        echo "nome: " . $c->nome . "; <br>";
    }

    echo "<hr> <p> Ordenando por nome </p>";

    $nomes = DB::table('categorias')->orderBy('nome')->get();

    foreach($nomes as $c){
        echo "id: " . $c->id . "; ";
        echo "nome: " . $c->nome . "; <br>";
    }

    echo "<hr> <p> Ordenando por nome Decrescente</p>";

    $nomes = DB::table('categorias')->orderBy('nome', 'desc')->get();

    foreach($nomes as $c){
        echo "id: " . $c->id . "; ";
        echo "nome: " . $c->nome . "; <br>";
    }

});

Route::get('/novascategorias', function(){
    $id = DB::table('categorias')->insertGetId(['nome'=>'Carros']);
    echo "Novo ID = $id <br>";
});

Route::get('/atualizandocategorias', function(){
    $cats = DB::table('categorias')->where('id', 1)->get();
    echo "<p> Antes da atualização: </p>";
    echo "id: " . $cats[0]->id . "; ";
    echo "nome: " . $cats[0]->nome . "; <br>";
    DB::table('categorias')->where('id', 1)->update(['nome'=>'Roupas Infantis']);
    $cats = DB::table('categorias')->where('id', 1)->get();
    echo "<p> Depois da atualização: </p>";
    echo "id: " . $cats[0]->id . "; ";
    echo "nome: " . $cats[0]->nome . "; <br>";
});

Route::get('/removendocategorias', function(){
    $cats = DB::table('categorias')->first();
    echo "<p> Antes da remoção: </p>";
    echo "id: " . $cats->id . "; ";
    echo "nome: " . $cats->nome . "; <br>";
    DB::table('categorias')->where('id', 1)->delete();
    $cats = DB::table('categorias')->first();
    echo "<p> Depois da remoção: </p>";
    echo "id: " . $cats->id . "; ";
    echo "nome: " . $cats->nome . "; <br>";
});