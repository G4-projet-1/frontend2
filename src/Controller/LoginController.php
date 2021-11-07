<?php

namespace App\Controller;

use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
      {
         // erreurs de login gérés ici
         $error = $authenticationUtils->getLastAuthenticationError();

         // dernier pseudo entré par le user

         $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
            'last_username' => $lastUsername,
             'error'         => $error,
        ]);
    }

      /**
     * @Route("/facial_login", name="facial_login")
     */
    public function facial_login(): Response
    {
      
        return $this->render('login/facial_login.html.twig', [
            'controller_name' => 'IndexController'
        ]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(): Response
    {
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }
}
