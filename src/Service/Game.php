<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\Card;
use App\Entity\CardValues;
use App\Entity\Colors;

class Game
{
    private const VALUES_ORDER_RULES = [
        'ace',
        '2',
        '3',
        '4',
        '5',
        '6',
        '7',
        '8',
        '9',
        '10',
        'jack',
        'queen',
        'king'
    ];

    private const COLORS_ORDER_RULES = [
        'diamond',
        'heart',
        'spade',
        'club',
    ];
    private const NUMBER_CARDS_HAND = 10;

    public function initiateGameAtexo(): array
    {
        $cards = [];

        $i = 0;
        while ($i < self::NUMBER_CARDS_HAND ) {
            $card = new Card();
            $card
                ->setValue(CardValues::random())
                ->setColor(Colors::random());
            
            if (!in_array($card, $cards)) {
                $cards[] = $card;
                $i++;
            }
        }

        return $cards;
    }

    public function sortCards(array $cards)
    {
        usort($cards, function (Card $a, Card $b): int {
            if (array_search($a->getValue()->value, self::VALUES_ORDER_RULES) === array_search($b->getValue()->value, self::VALUES_ORDER_RULES)) {
                return array_search($a->getColor()->value, self::COLORS_ORDER_RULES) <=> array_search($b->getColor()->value, self::COLORS_ORDER_RULES);
            }
            return array_search($a->getValue()->value, self::VALUES_ORDER_RULES) <=> array_search($b->getValue()->value, self::VALUES_ORDER_RULES);
        });
        
        return $cards;
    }
    
}

?>