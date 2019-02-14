<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;

class ControladorProduto extends Controller
{
    public function indexView()
    {
        $products = Produto::all();
        return view('produtos', compact('products'));
    }

    public function index()
    {
        $prods = Produto::all();
        return $prods->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Categoria::all();
        return view('novoproduto', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Produto;
        $product->nome = $request->input('nome');
        $product->estoque = $request->input('estoque');
        $product->preco = $request->input('preco');
        $product->categoria_id = $request->input('categoria_id');
        $product->save();

        return json_encode($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        if(isset($produto)){
            return json_encode($produto);
        }
        return response('Produto não encontrado', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto = Produto::find($id);
        $cats = Categoria::all();
        if(isset($produto)){
            return view('editarproduto', compact('produto'), compact('cats'));
        }
        return redirect('/categorias');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        if(isset($produto)){
            $produto->nome = $request->input('nomeProduto');
            $produto->estoque = $request->input('estoqueProduto');
            $produto->preco = $request->input('precoProduto');
            $produto->categoria_id = $request->input('categoriaProduto');
            $produto->save();
            return json_encode($produto);
        }
        return response('Produto não encontrado', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Produto::find($id);
        if(isset($product)){
            $product->delete();
            return response('OK', 200);
        }
        return response('Produto não encontrado', 404);
    }
}
