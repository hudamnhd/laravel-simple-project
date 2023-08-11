<?php
// File: app/Helpers/SatuanOptions.php

namespace App\Helpers;

class SatuanOptions
{
    public static function getOptions()
    {
        return [
            'berat' => [
                'KG' => 'KG',
                'HG' => 'HG',
                'DAG' => 'DAG',
                'G' => 'G',
                'DG' => 'DG',
                'CG' => 'CG',
                'MG' => 'MG',
            ],
            'panjang' => [
                'KM' => 'KM',
                'HM' => 'HM',
                'DAM' => 'DAM',
                'M' => 'M',
                'DM' => 'DM',
                'CM' => 'CM',
                'MM' => 'MM',
            ],
            'liter' => [
                'KL' => 'KL',
                'HL' => 'HL',
                'DAL' => 'DAL',
                'L' => 'L',
                'DL' => 'DL',
                'CL' => 'CL',
                'ML' => 'ML',
            ],
            'bebas' => [
                'Lembar' => 'Lembar',
                'Botol' => 'Botol',
                'Piece' => 'Piece',
                'Unit' => 'Unit',
                'Pasang' => 'Pasang',
                'Pack' => 'Pack',
                'Ton' => 'Ton',
            ],
        ];
    }
}
