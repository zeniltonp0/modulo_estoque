<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-mongo', function () {
    try {
        DB::connection('mongodb')->command(['ping' => 1]);
        return '<h1>✅ Conectado ao MongoDB com sucesso!</h1>';
    } catch (\Exception $e) {
        return '<h1>❌ Falha na conexão com o MongoDB.</h1><p>Erro: ' . $e->getMessage() . '</p>';
    }
});