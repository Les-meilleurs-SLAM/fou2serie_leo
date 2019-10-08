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
        
    // /**
    //  * @Route("/loadGenres", name="loadGenres")
    //  */
    // public function loadGenres()
    // {
    //     //Liste des genres à ajouter
    //     $noms = array('action', 'policier', 'aventure');
    //     $entityManager = $this->getDoctrine()->getManager();
    //     foreach ($noms as $i => $nom) {
    //         // on crée un tableau avec les objets Genre
    //         $liste_genre[$i] = new Genre();
    //         $liste_genre[$i]->setLibelle($nom);
    //         // On persiste la liste
    //         $entityManager->persist($liste_genre[$i]);
    //     }
    //     // On déclenche l'enregistrement
    //     $entityManager->flush();
    //     return new Response("ajout effectué");
    // }
        
    }
}
