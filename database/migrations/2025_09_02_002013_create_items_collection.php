<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('mongodb')->create('items', function (Blueprint $collection) {
            $collection->index('produto_id');
            $collection->index('estoque_id');
            $collection->index('status');
            $collection->index('data_entrada');
        });
    }

    public function down(): void
    {
        Schema::connection('mongodb')->dropIfExists('items');
    }
};