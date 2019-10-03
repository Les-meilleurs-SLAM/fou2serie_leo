<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Repository\SerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="news")
     */
    public function index()
    {

        $repository = $this->getDoctrine()->getRepository(Serie::class);
        $LesNews = $repository->getListNews();
        dump($LesNews);

        return $this->render('news/news.html.twig', [
            'lesNews' => $LesNews,
        ]);
    }
}
