<?php

declare(strict_types=1);

namespace App\Tests;

use App\Service\Game;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class GameTest extends KernelTestCase
{

    public function testCreateSetOfCards(): void
    {
        $kernel = self::bootKernel();
        $container = $kernel->getContainer();

        // this line is important ↓
        $gameService = $container->get(Game::class);

        $cards = $gameService->initiateGameAtexo(true);

        $cardsValue = [];
        foreach ($cards as $key => $card) {
            $cardsValue[] = $card->getValue()->value;
        }

        $this->assertCount(10, $cards);
        $this->assertIsArray($cards);

        
    }
}