<?php

namespace App\Controller;

use App\Repository\SectionRepository;
use App\Repository\NavBarLinkRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SectionController extends AbstractController
{
    #[Route('/{slug}', name: 'section_home')]
    public function home(string $slug, SectionRepository $sectionRepository, NavBarLinkRepository $navBarLinkRepository): Response
    {
        $section = $sectionRepository->findOneBy(['slug' => $slug]);

        if (!$section) {
            throw $this->createNotFoundException('Section not found');
        }
    
        $navBarLinks = $navBarLinkRepository->getNavBarBySection($section);

        return $this->render('section/home.html.twig', [
            'section' => $section,
            'navBarLinks' => $navBarLinks,
        ]);
    }
}