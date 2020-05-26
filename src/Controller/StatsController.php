<?php

namespace App\Controller;

use App\Entity\Serie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StatsController extends AbstractController
{
    /**
     * @Route("/stats", name="stats")
     */
    public function index()
    {
        $lesSeriesVues = $this->getDoctrine()->getRepository(Serie::class)->findBy(array('estVue' => 1));
        $nbSerieVues = count($lesSeriesVues);

        $totalMinutes = 0;
        foreach ($lesSeriesVues as $uneSerie) {
            $totalMinutes += $uneSerie->getDureeTotale() * 60;
        }

        $lesAutresSeries = $this->getDoctrine()->getRepository(Serie::class)->findBy(array('estVue' => 0));
        $nbAutresSerie = count($lesAutresSeries);
        return $this->render('stats/index.html.twig', [
            'nbSerieVues' => $nbSerieVues,
            'nbAutresSeries' => $nbAutresSerie,
            'tpsTotal' => $totalMinutes
        ]);
    }
}
