<?php
declare(strict_types=1);

namespace App\Entity;

enum CardValues: string
{
    case TWO = '2';
    case THREE = '3';
    case FOUR = '4';
    case FIVE = '5';
    case SIX = '6';
    case SEVEN = '7';
    case EIGHT = '8';
    case NINE = '9';
    case TEN = '10';
    case JACK = 'jack';
    case QUEEN = 'queen';
    case KING = 'king';
    case ACE = 'ace';


    public static function random(): self
    {
        $count = count(self::cases()) - 1;

        return self::cases()[rand(0, $count)];
    }
}