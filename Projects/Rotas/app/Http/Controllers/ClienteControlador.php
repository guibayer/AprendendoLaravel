<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteControlador extends Controller
{
    public function index()
    {
        return "Lista de todos os Clientes - Raiz";
    }
    public function create()
    {
        return "Formulário para cadastrar novo cliente";
    }
    public function store(Request $request)
    {
        $s = "Armazenar";

        return $s;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
