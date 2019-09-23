<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="news")
     */
    public function index()
    {
        $dateDuJour='23/09/2019';
        $nbNews='20';
        return $this->render('news/index.html.twig', [
            'dateDujour' => $dateDuJour,
            'nbNews' => $nbNews,
        ]);
    }
}
