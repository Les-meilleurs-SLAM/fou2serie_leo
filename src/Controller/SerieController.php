<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Serie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;


class SerieController extends AbstractController
{
    /**
     * @Route("/serie", name="serie")
     */

    public function index(Request $request, PaginatorInterface $paginator)
    {
        $LesSeries = $this->getDoctrine()->getRepository(Serie::class)->findBy(array('estVue' => 0), array('titre' => 'ASC'));
        $lesGenres = $this->getDoctrine()->getRepository(Genre::class)->findAll();
        $Series = $paginator->paginate($LesSeries, $request->query->getInt('page', 1), 6);

        return $this->render('serie/serie.html.twig', [
            'LesSeries' => $Series,
            'lesGenres' => $lesGenres,
        ]);
    }
    /**
     * @Route("/infoSerie/{id}", name="infoSerie")
     */
    public function getInfo($id)
    {
        $repositorySerie = $this->getDoctrine()->getRepository(Serie::class);
        $UneSeries = $repositorySerie->find($id);
        $tempsTotal = $UneSeries->getDureeTotale();
        $heuresTotal = floor($tempsTotal / 60);
        $minutesTotal = $tempsTotal % 60;
        dump($tempsTotal);
        $lesGenres = $UneSeries->getGenres();

        return $this->render('serie/infoSerie.html.twig', [
            'serie' => $UneSeries,
            "lesGenres" => $lesGenres,
            "heuresTotal" => $heuresTotal,
            "minutesTotal" => $minutesTotal,
        ]);
    }
    /**
     * @Route("/serie/{id}", name="SerieByGenre")
     */
    public function goGenre($id, Request $request, PaginatorInterface $paginator)
    {
        $repositoryGenre = $this->getDoctrine()->getRepository(Genre::class)->find($id);
        $lesSeries = $repositoryGenre->getSeries();
        $Series = $paginator->paginate($lesSeries, $request->query->getInt('page', 1), 6);
        $lesGenres = $this->getDoctrine()->getRepository(Genre::class)->findAll();

        return $this->render('serie/serie.html.twig', [
            'LesSeries' => $Series,
            'lesGenres' => $lesGenres,
        ]);
    }
}
