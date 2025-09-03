<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureStockIsSelected
{
    public function handle(Request $request, Closure $next): Response
    {
        // Se a chave 'active_stock_id' NÃO existir na sessão...
        if (!session()->has('active_stock_id')) {
            // ...redirecione o usuário para a página de seleção de estoque.
            return redirect()->route('stock.select');
        }

        // Se a chave existir, permita que a requisição continue.
        return $next($request);
    }
}