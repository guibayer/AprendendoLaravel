<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;

class DepartamentoControlador extends Controller
{
    public function index(){
        echo "<h4>Lista de Categorias</h4>";
        echo "<ul>";
        echo "<li>Informática</li>";
        echo "<li>Eletrônicos</li>";
        echo "<li>Carros</li>";
        echo "</ul>";
        echo "<hr>";

    }
}
