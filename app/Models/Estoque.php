<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estoque extends Model
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'estoques';
    protected $fillable = ['name'];
}