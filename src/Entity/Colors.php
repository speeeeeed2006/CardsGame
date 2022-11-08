<?php
declare(strict_types=1);

namespace App\Entity;

enum Colors: string
{
    case HEART = 'heart';
    case DIAMOND = 'diamond';
    case SPADE = 'spade';
    case CLUB = 'club';


    public static function random(): self
    {
        $count = count(self::cases()) - 1;

        return self::cases()[rand(0, $count)];
    }
}