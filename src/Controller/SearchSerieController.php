<?php

namespace App\Controller;

use App\Entity\SearchSerie;
use App\Entity\Serie;
use App\Form\SerieSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchSerieController extends AbstractController
{
    /**
     * @Route("/search_serie", name="search_serie")
     */
    public function index(Request $request)
    {
        $seriesRepo =  $this->getDoctrine()->getRepository(Serie::class);
        $uneSerie = new SearchSerie;

        $form = $this->createForm(SerieSearchType::class, $uneSerie);
        $form->handleRequest($request);

        if (($form->isSubmitted() && $form->isValid()) && ($uneSerie->getGenres()->count() > 0 || $uneSerie->getMaxDuree()->getTimestamp() > 0)) {
            $LesSeries = $seriesRepo->findAllSeriesBySearch($uneSerie)->getResult();
        } else {
            $LesSeries = $seriesRepo->findBy(array(), array('titre' => 'ASC'));
        }
        return $this->render('search_serie/index.html.twig', [
            'serie' => $uneSerie,
            'form' => $form->createView(),
            'lesSeries' => $LesSeries
        ]);
    }
}
