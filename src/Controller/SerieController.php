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

        return $this->render('serie/serie.html.twig', [
            'LesSeries' => $LesSeries,
        ]);
    }
    /**
     * @Route("/infoSerie/{id}", name="infoSerie")
     */
    public function getInfo($id)
    {
        $repositorySerie = $this->getDoctrine()->getRepository(Serie::class);
        $UneSeries = $repositorySerie->find($id);
        $idGenres = $UneSeries->getGenres();
        $lesGenres=array();
        $i=0;
        foreach ($idGenres as $unGenre) {
            $lesGenres[$i] = $this->getDoctrine()->getRepository(Genre::class)->find($unGenre);
            $i++;
        }

        return $this->render('serie/infoSerie.html.twig', [
            'serie' => $UneSeries,
            "lesGenres" => $lesGenres,
        ]);
    }
}
