<?php

namespace App\Controller;

use App\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class GenreController extends AbstractController
{
    /**
     * @Route("/genre", name="genre")
     */
    public function index()
    {
        // //Liste des genres à ajouter
        // $noms = array('drame', 'comédie', 'comique', 'fantastique', 'horreur', 'thriller', 'policer', 'suspens','documentaire', 'action');
        // foreach ($noms as $i => $nom) {
        //     $liste_genre[$i] = new Genre();
        //     $liste_genre[$i]->setLibelleGenre($nom);
        //     $entityManager=$this->getDoctrine()->getManager();
        //     $entityManager->persist($liste_genre[$i]);
        // }

        // $entityManager->flush();
        // return new Response("ajout effectué");
    }
}
