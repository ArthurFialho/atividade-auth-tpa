@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>✏️ Editar Produto</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome do Produto *</label>
                        <input type="text" 
                               class="form-control @error('nome') is-invalid @enderror" 
                               id="nome" 
                               name="nome" 
                               value="{{ old('nome', $product->nome) }}"
                               required>
                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea class="form-control @error('descricao') is-invalid @enderror" 
                                  id="descricao" 
                                  name="descricao" 
                                  rows="3">{{ old('descricao', $product->descricao) }}</textarea>
                        @error('descricao')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="quantidade" class="form-label">Quantidade *</label>
                            <input type="number" 
                                   class="form-control @error('quantidade') is-invalid @enderror" 
                                   id="quantidade" 
                                   name="quantidade" 
                                   value="{{ old('quantidade', $product->quantidade) }}"
                                   min="0"
                                   required>
                            @error('quantidade')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="preco" class="form-label">Preço (R$) *</label>
                            <input type="number" 
                                   class="form-control @error('preco') is-invalid @enderror" 
                                   id="preco" 
                                   name="preco" 
                                   value="{{ old('preco', $product->preco) }}"
                                   step="0.01"
                                   min="0"
                                   required>
                            @error('preco')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            ← Voltar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            💾 Atualizar Produto
                        </button>
                    </div>
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
        </div>
    </div>
</div>
@endsection