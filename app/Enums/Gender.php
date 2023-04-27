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

    public static function fromIndonesia(string $input): self
    {
        return match ($input) {
            self::Man->inIndonesia() => self::Man,
            self::Women->inIndonesia() => self::Women,
        };
    }
}
