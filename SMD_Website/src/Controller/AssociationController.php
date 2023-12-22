<?php

namespace App\Controller;

use App\Entity\Association;
use App\Repository\NavBarLinkRepository;
use App\Repository\AssociationRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AssociationController extends AbstractController
{
    #[Route('/', name: 'association_home')]
    public function home(AssociationRepository $associationRepository, NavBarLinkRepository $navBarLinkRepository): Response
    {
        $association = $associationRepository->getAssociationData();
        
        $navBarLinks = $navBarLinkRepository->getNavBarByAssociation($association);

        return $this->render('association/home.html.twig', [
            'association' => $association,
            'navBarLinks' => $navBarLinks,
        ]);
    }
}