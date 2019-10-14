<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Serie;
use App\Form\SerieType;

use Symfony\Component\HttpFoundation\Request;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index()
    {
        $LesSeries = $this->getDoctrine()->getRepository(Serie::class)->findBy(array(), array('titre' => 'ASC'));

        return $this->render('admin/adminAll.html.twig', [
            'lesSeries' => $LesSeries,
        ]);
    }
    /**
     * @Route("/editAdmin/{id}", name="editAdmin")
     */
    public function editAdmin($id, Request $request)
    {
        $repositorySerie = $this->getDoctrine()->getRepository(Serie::class);
        $UneSeries = $repositorySerie->find($id);
        $form = $this->createForm(SerieType::class, $UneSeries);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $return = $this->getDoctrine()->getManager();
            $return->flush();
            return $this->redirectToRoute('serie');
        }

        return $this->render('admin/editAdmin.html.twig', [
            'serie' => $UneSeries,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/ajoutserie", name="ajoutSerie")
     */
    public function ajoutSerie(Request $request)
    {
        $uneSerie = new Serie;

        $form = $this->createForm(SerieType::class, $uneSerie);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $return = $this->getDoctrine()->getManager();
            $return->persist($uneSerie);
            $return->flush();
            return $this->redirectToRoute('serie');
        }
        return $this->render('admin/ajoutserie.html.twig', [
            'serie' => $uneSerie,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/supprserie/{id}", name="suppSerie")
     */
    public function supprSerie($id, Request $request)
    {
        $uneSerie = new Serie;

        $repositorySerie = $this->getDoctrine()->getRepository(Serie::class);
        $uneSerie = $repositorySerie->find($id);

        return $this->render('admin/supprserie.html.twig', [
            'serie' => $uneSerie,
        ]);
    }

    /**
     * @Route("/confirme/{id}", name="confirme")
     */
    public function confirme($id)
    {
        $uneSerie = new Serie;

        $repositorySerie = $this->getDoctrine()->getRepository(Serie::class);
        $uneSerie = $repositorySerie->find($id);
        $return = $this->getDoctrine()->getManager();
        $return->remove($uneSerie);
        $return->flush();

        return $this->redirectToRoute('serie');
    }
}
