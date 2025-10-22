@extends('layouts.app')

@section('title', 'Detalhes do Produto')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>👁️ Detalhes do Produto</h3>
                <div>
                    <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">
                        ✏️ Editar
                    </a>
                    <form action="{{ route('products.destroy', $product) }}" 
                          method="POST" 
                          style="display: inline;"
                          onsubmit="return confirm('Deseja realmente excluir este produto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">
                            🗑️ Excluir
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">ID:</div>
                    <div class="col-md-9">{{ $product->id }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Nome:</div>
                    <div class="col-md-9">{{ $product->nome }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Descrição:</div>
                    <div class="col-md-9">{{ $product->descricao ?? 'Sem descrição' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Quantidade:</div>
                    <div class="col-md-9">
                        <span class="badge bg-{{ $product->quantidade < 10 ? 'danger' : 'success' }} fs-6">
                            {{ $product->quantidade }} unidades
                        </span>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Preço:</div>
                    <div class="col-md-9 fs-5 text-success">
                        R$ {{ number_format($product->preco, 2, ',', '.') }}
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Cadastrado em:</div>
                    <div class="col-md-9">{{ $product->created_at->format('d/m/Y H:i') }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3 fw-bold">Última atualização:</div>
                    <div class="col-md-9">{{ $product->updated_at->format('d/m/Y H:i') }}</div>
                </div>

                <hr>

                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    ← Voltar para Lista
                </a>
            </div>
        </div>
    </div>
</div>
@endsection