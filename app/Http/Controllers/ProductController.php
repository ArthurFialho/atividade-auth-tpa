<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'quantidade' => 'required|integer|min:0',
            'preco' => 'required|numeric|min:0'
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'quantidade.required' => 'O campo quantidade é obrigatório.',
            'quantidade.min' => 'A quantidade não pode ser negativa.',
            'preco.required' => 'O campo preço é obrigatório.',
            'preco.min' => 'O preço não pode ser negativo.'
        ]);

        Product::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'quantidade' => 'required|integer|min:0',
            'preco' => 'required|numeric|min:0',
            'categoria' => 'nullable|string|max:100'
        ], [
            'nome.required' => 'O campo nome é obrigatório.',
            'quantidade.required' => 'O campo quantidade é obrigatório.',
            'quantidade.min' => 'A quantidade não pode ser negativa.',
            'preco.required' => 'O campo preço é obrigatório.',
            'preco.min' => 'O preço não pode ser negativo.',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produto removido com sucesso!');
    }

    public function lowStock()
{
    $products = Product::where('quantidade', '<', 10)
        ->orderBy('quantidade', 'asc')
        ->get();
    
    return view('products.low-stock', compact('products'));
}
}