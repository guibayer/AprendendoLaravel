@extends('layout.app', ["current" => "produtos"])

@section('body')
    <div class="card border">
        <div class="card-body">
            <form action="/produtos" method="POST">
                @csrf
                <div class="form-group">
                    <div class="col-auto my-1">
                        <label for="nomeProduto">Nome do Produto</label>
                        <input type="text" class="form-control" name="nomeProduto"
                               id="nomeProduto" placeholder="Nome do Produto">
                    </div>
                    <div class="col-auto my-1">
                        <label for="nomeProduto">Estoque</label>
                        <input type="number" class="form-control" name="estoqueProduto"
                               id="estoqueProduto" placeholder="Estoque do Produto">
                    </div>
                    <div class="col-auto my-1">
                        <label for="nomeProduto">Preço</label>
                        <input type="number" class="form-control" name="precoProduto"
                               id="estoqueProduto" placeholder="Preço do Produto">
                    </div>
                    <div class="col-auto my-1">
                        <label for="nomeProduto">Categoria</label>
                        <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="categoriaProduto">
                            <option selected>Choose...</option>
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
            </form>
        </div>
    </div>
@endsection