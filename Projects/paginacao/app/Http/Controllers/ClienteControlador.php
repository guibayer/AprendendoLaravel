<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;


class ClienteControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Na página do laravel tem mais coisas do que podemos acessar que essa função paginate retorna!
        //$clientes = Cliente::all();
        $clientes = Cliente::paginate(10);

        return view('index', compact('clientes'));
    }

    public function indexjs()
    {
        return view('indexjs');
    }

    public function indexJson()
    {
        return Cliente::paginate(10);
    }

}
