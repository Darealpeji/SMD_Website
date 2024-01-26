<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    use TargetPathTrait;

    #[Route('/connexion', name: 'app_login')]
    public function connexion(AuthenticationUtils $authenticationUtils, Request $request, SessionInterface $session): Response
    {
        // Vérifiez si l'URI est déjà stockée dans la session
        $referer = $session->get('referer');

        if (! $referer) {
            // Si l'URI n'est pas déjà stockée, enregistrez l'URI de la page actuelle dans la session
            $referer = $request->headers->get('referer');
            $loginRoute = $this->generateUrl('app_login');

            if ($referer && $referer !== $loginRoute) {
                $session->set('referer', $referer);
            }
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        // Ajoutez le nombre de tentatives échouées dans la session
        $loginAttempts = $session->get('login_attempts', 0);
        $session->set('login_attempts', $loginAttempts + 1);

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
    public function loginAction(SessionInterface $session, Request $request)
    {
        // Récupérez l'URI stockée dans la session
        $referer = $session->get('referer');

        // Si l'URI n'est pas dans la session, essayez de récupérer _target_path de la requête
        if (! $referer) {
            $referer = $request->get('_target_path');
        }

        // Vérifiez le nombre de tentatives échouées
        $loginAttempts = $session->get('login_attempts', 0);

        // Définissez un seuil de tentatives échouées
        $threshold = 3;

        if ($loginAttempts > $threshold) {
            // Bloquez l'accès temporairement (par exemple, pendant 5 minutes)
            // Vous pouvez implémenter cette logique en utilisant une autre variable de session, par exemple 'login_blocked_until'
            $session->set('login_blocked_until', time() + 300);

            // Réinitialisez le nombre de tentatives échouées
            $session->set('login_attempts', 0);

            // Envoyez une notification d'activité suspecte aux administrateurs du site
            // Vous pouvez implémenter cette logique en fonction de vos besoins

            // Redirigez l'utilisateur vers une page indiquant que son compte est temporairement bloqué
            return $this->redirectToRoute('account_blocked');
        }

        // Réinitialisez le nombre de tentatives échouées après une connexion réussie
        $session->set('login_attempts', 0);

        if ($referer) {
            // Redirigez l'utilisateur vers l'URI stockée ou _target_path
            return $this->redirect($referer);
        }

        // Si aucune URI n'est stockée ou le nombre de tentatives est nul, redirigez l'utilisateur vers une route par défaut
        return $this->redirectToRoute('home_association');
    }
}
