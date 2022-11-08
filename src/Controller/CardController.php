<?php

namespace App\Controller;

use App\Service\Game;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CardController extends AbstractController
{
     private $game;

     public function __construct(Game  $game)
     {
         $this->game = $game;
     }

    #[Route('/', name: 'app_card')]
    public function index(): Response
    {
        $cards = $this->game->initiateGameAtexo();

        $sortedCards = $this->game->sortCards($cards);
        
        return $this->render('card/index.html.twig', [
            'controller_name' => 'CardController',
            'unsortedCards' => $cards,
            'sortedCards' => $sortedCards
        ]);
    }
}
