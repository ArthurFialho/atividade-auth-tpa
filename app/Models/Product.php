<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'categoria',
        'quantidade',
        'preco'
    ];

    protected $casts = [
        'preco' => 'decimal:2',
        'quantidade' => 'integer'
    ];
}