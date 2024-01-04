<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/connexion', name: 'app_login')]
    public function connexion(AuthenticationUtils $authenticationUtils, Request $request, SessionInterface $session): Response
    {
        // Enregistrez l'URI de la page actuelle dans la session
        $session->set('referer', $request->headers->get('referer'));

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    #[Route('/deconnexion', name: 'app_logout')]
    public function deconnexion(): Response
    {
        throw new \Exception('Don\'t forget to activate logout in security.yaml');
    }

    #[Route('/url_after_login', name: 'url_after_login')]
    public function loginAction(SessionInterface $session)
    {
        // Récupérez l'URI stockée dans la session
        $referer = $session->get('referer');

        if ($referer) {
            // Redirigez l'utilisateur vers l'URI stockée
            return $this->redirect($referer);
        } else {
            // Si aucune URI n'est stockée, redirigez l'utilisateur vers une route par défaut
            return $this->redirectToRoute('home_association');
        }
    }
}
