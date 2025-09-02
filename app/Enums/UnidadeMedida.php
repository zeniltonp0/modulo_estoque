<?php

namespace App\Enums;

enum UnidadeMedida: string
{
    case Grama = 'g';
    case Mililitro = 'ml';
    case Unidade = 'un';
    case Quilograma = 'kg';
    case Litro = 'l';

    public function getLabel(): string
    {
        return match ($this) {
            self::Grama => 'Gramas',
            self::Mililitro => 'Mililitros',
            self::Unidade => 'Unidades',
            self::Quilograma => 'Quilogramas',
            self::Litro => 'Litros',
        };
    }
}