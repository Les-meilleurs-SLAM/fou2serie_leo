<?php

namespace App\Controller;

use App\Entity\Genre;
use App\Entity\Serie;
use App\Repository\SerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SerieController extends AbstractController
{
    /**
     * @Route("/serie", name="serie")
     */

    public function index()
    {
        $LesSeries = $this->getDoctrine()->getRepository(Serie::class)->findBy(array(), array('titre' => 'ASC'));
        $lesGenres= $this->getDoctrine()->getRepository(Genre::class)->findAll();

        return $this->render('serie/serie.html.twig', [
            'LesSeries' => $LesSeries,
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
        $lesGenres = $UneSeries->getGenres();
        dump($lesGenres);

        return $this->render('serie/infoSerie.html.twig', [
            'serie' => $UneSeries,
            "lesGenres" => $lesGenres,
        ]);
    }
    /**
     * @Route("/serie/{id}", name="SerieByGenre")
     */
    public function goGenre($id)
    {
        $repositoryGenre = $this->getDoctrine()->getRepository(Genre::class)->find($id);
        $lesSeries=$repositoryGenre->getSeries();
        $lesGenres= $this->getDoctrine()->getRepository(Genre::class)->findAll();

        return $this->render('serie/serie.html.twig', [
            'LesSeries' => $lesSeries,
            'lesGenres' => $lesGenres,
        ]);
    }
}
