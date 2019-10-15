<?php

namespace App\Controller;

use App\Entity\Serie;
use App\Repository\SerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="news")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {

        $repository = $this->getDoctrine()->getRepository(Serie::class);
        $LesNews = $repository->findAll();
        $news = $paginator->paginate($LesNews, $request->query->getInt('page', 1), 4);

        return $this->render('news/news.html.twig', [
            'lesNews' => $news,
        ]);
    }
}
