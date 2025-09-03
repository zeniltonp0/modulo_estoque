<?php

namespace App\Helpers;

class UnitConverter
{
    /**
     * Formata um valor numérico e sua unidade para uma exibição amigável.
     * Ex: 1500, 'g' se torna '1,50 kg'
     * Ex: 50, 'un' se torna '50 un'
     *
     * @param float $value O valor numérico do estoque.
     * @param string $unit A unidade de medida ('g', 'ml', 'un', etc.).
     * @return string A string formatada.
     */
    public static function format(float $value, string $unit): string
    {
        switch (strtolower($unit)) {
            case 'g':
                return $value >= 1000
                    ? number_format($value / 1000, 2, ',', '.') . ' kg'
                    : number_format($value, 0, ',', '.') . ' g';
            case 'ml':
                return $value >= 1000
                    ? number_format($value / 1000, 2, ',', '.') . ' L'
                    : number_format($value, 0, ',', '.') . ' ml';
            case 'un':
                return number_format($value, 0, ',', '.') . ' un';
            default:
                return number_format($value, 2, ',', '.') . ' ' . $unit;
        }
    }
}