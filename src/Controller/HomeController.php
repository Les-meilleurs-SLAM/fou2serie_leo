<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Serie;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */

    public function index()
    {
        return $this->render('home/index.html.twig');
    }
    /**
     * @Route("/testentity", name="testentity")
     */
    public function testentity()
    {
        $serie = new Serie();
        $serie->setTitre("Breaking Bad");
        return $this->render('home/testentity.html.twig', [
            'id' => $serie->getId(),
            'titre' => $serie->getTitre()
        ]);
    }
}
