<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosControlador extends Controller
{
    public function __construct()
    {
        //Lembrar de cadastrar esse middleware 'primeiro' no arquivo kernel.php
        //$this->middleware('primeiro');
    }

    public function index(){
        return '<h3>Lista de Usuários </h3>' .
            '<ul>' .
            '<li>Joao</li>' .
            '<li>José</li>' .
            '<li>Julia</li>' .
            '<li>Marcos</li>' .
            '</ul>';
    }
}
