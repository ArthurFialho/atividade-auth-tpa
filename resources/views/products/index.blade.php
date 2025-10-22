@extends('layouts.app')

@section('title', 'Lista de Produtos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>📦 Produtos em Estoque</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        ➕ Novo Produto
    </a>
</div>

@if($products->count() > 0)
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->nome }}</td>
                                <td>
                                    <span class="badge bg-{{ $product->quantidade < 10 ? 'danger' : 'success' }}">
                                        {{ $product->quantidade }}
                                    </span>
                                </td>
                                <td>R$ {{ number_format($product->preco, 2, ',', '.') }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('products.show', $product) }}" 
                                           class="btn btn-sm btn-info" title="Ver">
                                            👁️
                                        </a>
                                        <a href="{{ route('products.edit', $product) }}" 
                                           class="btn btn-sm btn-warning" title="Editar">
                                            ✏️
                                        </a>
                                        <form action="{{ route('products.destroy', $product) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Deseja realmente excluir este produto?')"
                                              style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Excluir">
                                                🗑️
                                            </button>
                                            <div class="mb-3">
    <label for="categoria" class="form-label">Categoria</label>
    <select class="form-select @error('categoria') is-invalid @enderror" 
            id="categoria" 
            name="categoria">
        <option value="">Selecione uma categoria</option>
        <option value="Eletrônicos" {{ old('categoria') == 'Eletrônicos' ? 'selected' : '' }}>Eletrônicos</option>
        <option value="Alimentos" {{ old('categoria') == 'Alimentos' ? 'selected' : '' }}>Alimentos</option>
        <option value="Vestuário" {{ old('categoria') == 'Vestuário' ? 'selected' : '' }}>Vestuário</option>
        <option value="Móveis" {{ old('categoria') == 'Móveis' ? 'selected' : '' }}>Móveis</option>
    </select>
    @error('categoria')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3">
        {{ $products->links() }}
    </div>
@else
    <div class="alert alert-info">
        Nenhum produto cadastrado. <a href="{{ route('products.create') }}">Cadastre o primeiro!</a>
    </div>
@endif
@endsection