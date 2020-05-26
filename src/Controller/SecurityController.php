<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="security_login")
     * */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $lastUsername = $authenticationUtils->getLastUsername();
        $errors = $authenticationUtils->getLastAuthenticationError();
        return $this->render('security/login.html.twig', [
            'lastUsername' => $lastUsername, 'errors' => $errors
        ]);
    }

    /**
     * @Route("/logout", name="security_logout") 
     */
    public function logout()
    {
    }

    /**
     * @Route("/index", name="index") 
     */
    public function index()
    {
        return $this->render('home/index.html.twig');
    }
}
