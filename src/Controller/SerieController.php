<?php

namespace App\Controller;

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
        $LesSeries= $this->getDoctrine()->getRepository(Serie::class)->findBy(array(),array('titre' => 'ASC'));

        return $this->render('serie/serie.html.twig', [
            'LesSeries' => $LesSeries,
        ]);
    }
    /**
     * @Route("/infoSerie/{id}", name="infoSerie")
     */
    public function getInfo($id)
    {
        dump($id);
        $repository = $this->getDoctrine()->getRepository(Serie::class);
        $UneSeries = $repository->find($id);

        return $this->render('serie/infoSerie.html.twig', [
            'serie' => $UneSeries,
        ]);
    }
}

