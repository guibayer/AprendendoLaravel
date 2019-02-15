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

use App\Produto;
use App\Categoria;

Route::get('/categorias', function () {
    $cat = Categoria::all();
    if(count($cat) == 0){
        echo "<h4>Você não possui nenhuma categoria cadastrada</h4>";
    }else{
        foreach($cat as $c){
            echo "<p>". $c->id . "-". $c->nome ."</p>";
        }
    }
});

Route::get('/produtos', function () {
    $prods = Produto::all();
    if(count($prods) == 0){
        echo "<h4>Você não possui nenhum produto cadastrada</h4>";
    }else{
        echo "<table>";
        echo "<thead><tr><td>Nome</td><td>Estoque</td><td>Preço</td><td>Categoria</td></tr>";
        foreach($prods as $p){
            echo "<tr>";
            echo "<td>". $p->nome ."</td>";
            echo "<td>". $p->estoque ."</td>";
            echo "<td>". $p->preco ."</td>";
            echo "<td>". $p->categoria->nome ."</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
});

Route::get('/categoriasprodutos', function () {
    $cat = Categoria::all();
    if(count($cat) == 0){
        echo "<h4>Você não possui nenhuma categoria cadastrada</h4>";
    }else{
        foreach($cat as $c){
            echo "<p>". $c->id . "-". $c->nome ."</p>";
            $produtos = $c->produtos;

            if(count($produtos) > 0){
                echo "<ul>";
                foreach($produtos as $p){
                    echo "<li>". $p->nome ."</li>";
                }
                echo "</ul>";
            }
        }
    }
});

Route::get('/categoriasprodutos/json', function(){
   $cats = Categoria::with('produtos')->get();
   return $cats->toJson();
});

Route::get('/adicionarproduto', function(){
    $cat = Categoria::find(1);
    $p = new Produto;
    $p->nome = "Meu novo produto";
    $p->estoque = 10;
    $p->preco = 100;
    //Assim caso tenha o id:
    //$p->categoria_id = 3;
    //Caso tenha a instância:
    $p->categoria()->associate($cat);
    $p->save();

    return $p->toJson();
});

Route::get('/removercategoriadoproduto', function(){
    $p = Produto::find(6);
    if(isset($p)) {
        $p->categoria()->dissociate();
        $p->save();

        return $p->toJson();
    }
    return '';
});

Route::get('/adicionarproduto/{catid}', function($catid){
    $cat = Categoria::with('produtos')->find($catid);
    $p = new Produto;
    $p->nome = "Meu novo produto adicionado";
    $p->estoque = 20;
    $p->preco = 170;

    if(isset($cat)){
        $cat->produtos()->save($p);
    }
    //Reload do cat(como ele foi carregado antes do save se n for feito o reload o novo produto
    // adicionado não irá aparecer na tela)
    $cat->load('produtos');
    return $cat->toJson();
});