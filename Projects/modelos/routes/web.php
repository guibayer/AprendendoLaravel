<?php

use App\Categoria;

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

Route::get('/', function () {
    $categorias = Categoria::all();
    foreach($categorias as $c){
        echo "id: " . $c->id . " , ";
        echo "nome: " . $c->nome . " ; ";
    }
});

Route::get('/inserir/{nome}', function($nome){
   $cat = new Categoria();
   $cat->nome = $nome;
   $cat->save();
   return redirect('/');
});

Route::get('/categoria/{id}', function($id){
    $cat = Categoria::findOrFail($id);
    if(isset($cat)) {
        echo "id: " . $cat->id . " , ";
        echo "nome: " . $cat->nome . " ; ";
    }else{
        echo "Categoria não encontrada";
    }
});

Route::get('/atualizar/{id}/{nome}', function($id, $nome){
    $cat = Categoria::findOrFail($id);
    if(isset($cat)) {
        $cat->nome = $nome;
        $cat->save();
        return redirect('/');
    }else {
        echo "Categoria não encontrada";
    }
});

Route::get('/remover/{id}', function($id){
    $cat = Categoria::findOrFail($id);
    if(isset($cat)) {
        $cat->delete();
        return redirect('/');
    }else {
        echo "Categoria não encontrada";
    }
});

Route::get('/categoriaidmaiorque/{id}', function($id){
    $cat = Categoria::where('id', '>', $id)->get();
    if(isset($cat)) {
        foreach($cat as $c){
            echo "id: " . $c->id . " , ";
            echo "nome: " . $c->nome . " ; ";
        }
    }else {
        echo "Categoria não encontrada";
    }
    $count = Categoria::where('id', '>=', $id)->count();
    echo "Count: ". $count . "; ";
    $max = Categoria::where('id', '>=', $id)->max('id');
    echo "Max: ". $max . "; ";
});

Route::get('/ids123', function(){
    $cat = Categoria::find([1,2,3]);
    if(isset($cat)) {
        foreach($cat as $c){
            echo "id: " . $c->id . " , ";
            echo "nome: " . $c->nome . " ; ";
        }
    }else {
        echo "Categoria não encontrada";
    }
});

Route::get('/todas', function () {
    $categorias = Categoria::withTrashed()->get();
    foreach($categorias as $c){
        echo "id: " . $c->id . " , ";
        echo "nome: " . $c->nome . " ; ";
        if($c->trashed()){
            echo "Apagado";
        }
        echo "<br>";
    }
});

Route::get('/ver/{id}', function($id){
    //$cat = Categoria::withTrashed()->find($id);
    $cat = Categoria::withTrashed()->where('id', $id)->get()->first();
    if(isset($cat)) {
        echo "id: " . $cat->id . " , ";
        echo "nome: " . $cat->nome . " ; ";
        if($cat->trashed()){
            echo "Apagado";
        }
    }else{
        echo "Categoria não encontrada";
    }
});

Route::get('/somenteapagadas', function(){
    //$cat = Categoria::withTrashed()->find($id);
    $cat = Categoria::onlyTrashed()->get();
    if(isset($cat)) {
        foreach($cat as $c){
            echo "id: " . $c->id . " , ";
            echo "nome: " . $c->nome . " ; ";
        }
    }else{
        echo "Categoria não encontrada";
    }
});

Route::get('/restaurar/{id}', function($id){
    $cat = Categoria::withTrashed()->find($id);
    if(isset($cat)) {
        $cat->restore();
        echo "id: " . $cat->id . " , ";
        echo "nome: " . $cat->nome . " ; ";
        if($cat->trashed()){
            echo "Apagado";
        }
    }else{
        echo "Categoria não encontrada";
    }
});

Route::get('/apagarpermanente/{id}', function($id){
    $cat = Categoria::withTrashed()->find($id);
    if(isset($cat)) {
        $cat->forceDelete();
        echo "id: " . $cat->id . " , ";
        echo "nome: " . $cat->nome . " ; ";
        if($cat->trashed()){
            echo "Apagado";
        }
    }else{
        echo "Categoria não encontrada";
    }
});