<?php

namespace App\Models;

use App\Enums\UnidadeMedida;
use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produto extends Model
{
    use HasFactory;

    protected $connection = 'mongodb'; 
    protected $collection = 'produtos'; 

    protected $fillable = ['name', 'unidade_medida', 'type'];

    protected $casts = [
        'unidade_medida' => UnidadeMedida::class,
    ];
}