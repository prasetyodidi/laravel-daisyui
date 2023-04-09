<?php

namespace App\Enums;

enum Gender: string
{
    case Man = 'man';
    case Women = 'women';

    function inIndonesia(): string
    {
        return match ($this) {
            self::Man => 'Laki-laki',
            self::Women => 'Perempuan'
        };
    }
}
