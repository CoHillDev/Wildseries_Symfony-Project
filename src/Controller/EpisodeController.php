<?php

namespace App\Controller;

use App\Entity\Episode;
use App\Entity\Season;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EpisodeController extends AbstractController
{
    #[Route('/program/{programId}/season/{seasonId}/episode/{episodeId}', name: 'episode_show')]
    public function show(Season $season, Episode $episode): Response
    {
        return $this->render('episode/show.html.twig', [
            'season' => $season,
            'episode' => $episode,
        ]);
    }
}
