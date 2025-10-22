@extends('layouts.app')

@section('title', 'Relatório - Estoque Baixo')

@section('content')
<h1>⚠️ Produtos com Estoque Baixo</h1>
<p class="text-muted">Produtos com menos de 10 unidades em estoque</p>

@if($products->count() > 0)
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Quantidade</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->nome }}</td>
                            <td>
                                <span class="badge bg-danger">{{ $product->quantidade }}</span>
                            </td>
                            <td>
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">
                                    Reabastecer
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else
    <div class="alert alert-success">
        ✅ Todos os produtos têm estoque adequado!
    </div>
@endif
@endsection