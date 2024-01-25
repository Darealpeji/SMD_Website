<?php

namespace App\Controller;

use App\Service\NavBarService;
use App\Repository\ArticleRepository;
use App\Repository\AssociationRepository;
use App\Repository\ActivityPlaceRepository;
use App\Repository\HistoricalDateRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AssociationController extends AbstractController
{
    #[Route('/', name: 'home_association')]
    public function home(
        AssociationRepository $associationRepository,
        NavBarService $navBarService
    ): Response {
        $association = $associationRepository->getAssociationWithNavBarMenus();
        $subMenusLoggedInMember = $navBarService->generateNavBarSubMenusLoggedInMember();

        return $this->render('association/home.html.twig', [
            'association' => $association,
            'subMenusLoggedInMember' => $subMenusLoggedInMember,
        ]);
    }

    #[Route('/actualites', name: 'news_association')]
    public function listArticleAssociation(
        AssociationRepository $associationRepository,
        NavBarService $navBarService,
        ArticleRepository $articleRepository
    ): Response {
        $association = $associationRepository->getAssociationWithNavBarMenus();
        $subMenusLoggedInMember = $navBarService->generateNavBarSubMenusLoggedInMember();
        $articles = $articleRepository->getArticlesByAssociation($association);

        return $this->render('association/news/news_list.html.twig', [
            'association' => $association,
            'subMenusLoggedInMember' => $subMenusLoggedInMember,
            'articles' => $articles,
        ]);
    }

    #[Route('/actualites/{idArticle}-{slugArticle}', name: 'detail_news_association')]
    public function detailArticleAssociation(
        int $idArticle,
        string $slugArticle,
        AssociationRepository $associationRepository,
        NavBarService $navBarService,
        ArticleRepository $articleRepository
    ): Response {
        $association = $associationRepository->getAssociationWithNavBarMenus();
        $subMenusLoggedInMember = $navBarService->generateNavBarSubMenusLoggedInMember();
        $article = $articleRepository->findOneBy(['id' => $idArticle, 'slug' => $slugArticle]);

        return $this->render('association/news/news_detail.html.twig', [
            'association' => $association,
            'subMenusLoggedInMember' => $subMenusLoggedInMember,
            'article' => $article,
        ]);
    }

    #[Route('/l-association', name: 'presentation_association')]
    public function presentationAssociation(
        AssociationRepository $associationRepository,
        NavBarService $navBarService,
    ): Response {
        $association = $associationRepository->getAssociationWithNavBarMenus();
        $subMenusLoggedInMember = $navBarService->generateNavBarSubMenusLoggedInMember();

        return $this->render('association/presentation/presentation.html.twig', [
            'association' => $association,
            'subMenusLoggedInMember' => $subMenusLoggedInMember,
        ]);
    }

    #[Route('l-association//notre-histoire', name: 'historical_association')]
    public function historicalAssociation(
        AssociationRepository $associationRepository,
        NavBarService $navBarService,
    ): Response {
        $association = $associationRepository->getAssociationWithHistoricalDates();
        $subMenusLoggedInMember = $navBarService->generateNavBarSubMenusLoggedInMember();

        return $this->render('association/presentation/our_history.html.twig', [
            'association' => $association,
            'subMenusLoggedInMember' => $subMenusLoggedInMember,
        ]);
    }

    #[Route('l-association//l-organigramme', name: 'organization_chart_association')]
    public function organizationChartAssociation(
        AssociationRepository $associationRepository,
        NavBarService $navBarService,
    ): Response {
        $association = $associationRepository->getAssociationWithPostCategories();
        $subMenusLoggedInMember = $navBarService->generateNavBarSubMenusLoggedInMember();

        return $this->render('association/presentation/organization_chart.html.twig', [
            'association' => $association,
            'subMenusLoggedInMember' => $subMenusLoggedInMember,
        ]);
    }

    #[Route('/informations-pratiques', name: 'useful_informations_association')]
    public function usefulInformationAssociation(
        AssociationRepository $associationRepository,
        NavBarService $navBarService,
        ActivityPlaceRepository $activityPlaceRepository
    ): Response {
        $association = $associationRepository->getAssociationWithNavBarMenus();
        $subMenusLoggedInMember = $navBarService->generateNavBarSubMenusLoggedInMember();
        $activityPlaces = $activityPlaceRepository->findBy(['association' => $association]);

        return $this->render('association/useful_informations/useful_informations.html.twig', [
            'association' => $association,
            'subMenusLoggedInMember' => $subMenusLoggedInMember,
            'activityPlaces' => $activityPlaces,
        ]);
    }
}
