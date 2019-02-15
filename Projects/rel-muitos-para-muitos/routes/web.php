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

use App\Projeto;
use App\Desenvolvedor;
use App\Alocacao;

Route::get('/desenvolvedor_projeto', function () {
    $desenvolvedores = Desenvolvedor::with('projetos')->get();

    foreach($desenvolvedores as $d){
        echo "<p> Nome do Desenvolvedor: " . $d->nome . "</p>";
        echo "<p> Cargo: " . $d->cargo . "</p>";
        if(count($d->projetos) > 0){
            echo "Projetos: <br>";
            echo "<ul>";
            foreach($d->projetos as $p) {
                echo "<li>";
                echo "Nome: " . $p->nome . " | ";
                echo "Horas: " . $p->estimativa_horas . " | ";
                echo "Horas Trabalhadas: " . $p->pivot->horas_semanais . " ; ";
                echo "</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }

    //return $desenvolvedores->toJson();
});

Route::get('/projeto_desenvolvedor', function () {
    $projetos = Projeto::with('desenvolvedores')->get();

    foreach($projetos as $d){
        echo "<p> Nome do projeto: " . $d->nome . "</p>";
        echo "<p> Estimativa de horas: " . $d->estimativa_horas . "</p>";
        if(count($d->desenvolvedores) > 0){
            echo "Desenvolvedores: <br>";
            echo "<ul>";
            foreach($d->desenvolvedores as $p) {
                echo "<li>";
                echo "Nome: " . $p->nome . " | ";
                echo "Cargo: " . $p->cargo . " | ";
                echo "Horas Trabalhadas: " . $p->pivot->horas_semanais . " ; ";
                echo "</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }

    //return $projetos->toJson();
});

Route::get('/alocar', function () {
    $projeto = Projeto::find(4);
    if(isset($projeto)){
        //$projeto->desenvolvedores()->attach(2, ['horas_semanais' => 12]);
        $projeto->desenvolvedores()->attach([
            3 => ['horas_semanais' => 50]
        ]);
    }
});

Route::get('/desalocar', function () {
    $projeto = Projeto::find(4);
    if(isset($projeto)){
        //$projeto->desenvolvedores()->attach(2, ['horas_semanais' => 12]);
        $projeto->desenvolvedores()->detach([1, 2, 3]);
    }
});