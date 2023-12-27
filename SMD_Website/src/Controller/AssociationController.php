<?php

namespace App\Controller;

use App\Entity\Association;
use App\Repository\ArticleRepository;
use App\Repository\NavBarLinkRepository;
use App\Repository\AssociationRepository;
use App\Repository\ActivityPlaceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AssociationController extends AbstractController
{
    #[Route('/', name: 'home_association')]
    public function home(AssociationRepository $associationRepository, NavBarLinkRepository $navBarLinkRepository): Response
    {
        $association = $associationRepository->getAssociationData();
        $navBarLinks = $navBarLinkRepository->getNavBarByAssociation($association);

        return $this->render('association/home.html.twig', [
            'association' => $association,
            'navBarLinks' => $navBarLinks,
        ]);
    }

    #[Route('/actualites', name: 'news_association')]
    public function listArticleAssociation(AssociationRepository $associationRepository, NavBarLinkRepository $navBarLinkRepository, ArticleRepository $articleRepository): Response
    {
        $association = $associationRepository->getAssociationData();
        $navBarLinks = $navBarLinkRepository->getNavBarByAssociation($association);
        $articles = $articleRepository->getArticlesByAssociation($association);

        return $this->render('association/news/news_list.html.twig', [
            'association' => $association,
            'navBarLinks' => $navBarLinks,
            'articles' => $articles,
        ]);

    }

    #[Route('/actualites/{idArticle}-{slugArticle}', name: 'detail_news_association')]
    public function detailArticleAssociation(int $idArticle, string $slugArticle, AssociationRepository $associationRepository, NavBarLinkRepository $navBarLinkRepository, ArticleRepository $articleRepository): Response
    {
        $association = $associationRepository->getAssociationData();
        $navBarLinks = $navBarLinkRepository->getNavBarByAssociation($association);
        $article = $articleRepository->findOneBy(['id' => $idArticle, 'slug' => $slugArticle]);

        return $this->render('association/news/news_detail.html.twig', [
            'association' => $association,
            'navBarLinks' => $navBarLinks,
            'article' => $article,
        ]);
    }

    #[Route('/informations-pratiques', name: 'useful_informations_association')]
    public function usefulInformationAssociation(AssociationRepository $associationRepository, NavBarLinkRepository $navBarLinkRepository, ActivityPlaceRepository $activityPlaceRepository): Response
    {
        $association = $associationRepository->getAssociationData();
        $navBarLinks = $navBarLinkRepository->getNavBarByAssociation($association);
        $activityPlaces = $activityPlaceRepository->findBy(['association' => $association]);

        return $this->render('association/useful_informations/useful_informations.html.twig', [
            'association' => $association,
            'navBarLinks' => $navBarLinks,
            'activityPlaces' => $activityPlaces,
        ]);

    }
}