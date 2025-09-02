<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Relations\BelongsTo;

class Item extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'items';

    protected $fillable = [
        'produto_id',
        'estoque_id',
        'quantidade_inicial',
        'quantidade_atual',
        'status',
        'data_entrada',
    ];

    protected $casts = [
        'data_entrada' => 'datetime',
        'quantidade_inicial' => 'decimal:2',
        'quantidade_atual' => 'decimal:2',
    ];

    public function produto(): BelongsTo
    {
        return $this->belongsTo(Produto::class);
    }

    public function estoque(): BelongsTo
    {
        return $this->belongsTo(Estoque::class);
    }
}