<?php

namespace App\Controller;

use App\Service\NavBarService;
use App\Repository\ArticleRepository;
use App\Repository\SectionRepository;
use App\Repository\ActivityRepository;
use App\Repository\TeamCategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SectionController extends AbstractController
{
    #[Route('/{slugSection}', name: 'home_section')]
    public function home(
        string $slugSection,
        SectionRepository $sectionRepository,
        NavBarService $navBarService
    ): Response {
        $section = $sectionRepository->findOneByWithNavBarMenus(['slug' => $slugSection]);
        $subMenusLoggedInMember = $navBarService->generateNavBarSubMenusLoggedInMember();

        return $this->render('section/home.html.twig', [
            'section' => $section,
            'subMenusLoggedInMember' => $subMenusLoggedInMember,
        ]);
    }


    #[Route('/{slugSection}/actualites', name: 'news_section')]
    public function listArticleAssociation(
        string $slugSection,
        SectionRepository $sectionRepository,
        NavBarService $navBarService,
        ArticleRepository $articleRepository
    ): Response {
        $section = $sectionRepository->findOneByWithNavBarMenus(['slug' => $slugSection]);
        $subMenusLoggedInMember = $navBarService->generateNavBarSubMenusLoggedInMember();
        $articles = $articleRepository->getArticlesBySection($section);

        return $this->render('section/news/news_list.html.twig', [
            'section' => $section,
            'subMenusLoggedInMember' => $subMenusLoggedInMember,
            'articles' => $articles,
        ]);
    }

    #[Route('/{slugSection}/actualites/{idArticle}-{slugArticle}', name: 'detail_news_section')]
    public function detailArticleSection(
        int $idArticle,
        string $slugArticle,
        string $slugSection,
        SectionRepository $sectionRepository,
        NavBarService $navBarService,
        ArticleRepository $articleRepository
    ): Response {
        $section = $sectionRepository->findOneByWithNavBarMenus(['slug' => $slugSection]);
        $subMenusLoggedInMember = $navBarService->generateNavBarSubMenusLoggedInMember();
        $article = $articleRepository->findOneBy(['id' => $idArticle, 'slug' => $slugArticle]);

        return $this->render('section/news/news_detail.html.twig', [
            'section' => $section,
            'subMenusLoggedInMember' => $subMenusLoggedInMember,
            'article' => $article,
        ]);
    }

    #[Route('/{slugSection}/informations-pratiques', name: 'useful_informations_section')]
    public function usefulInformationSection(
        string $slugSection,
        SectionRepository $sectionRepository,
        NavBarService $navBarService
    ): Response {
        $section = $sectionRepository->findOneByWithNavBarMenus(['slug' => $slugSection]);
        $subMenusLoggedInMember = $navBarService->generateNavBarSubMenusLoggedInMember();
        $activityPlaces = $section->getActivityPlaces();

        return $this->render('section/useful_informations/useful_informations.html.twig', [
            'section' => $section,
            'subMenusLoggedInMember' => $subMenusLoggedInMember,
            'activityPlaces' => $activityPlaces,
        ]);
    }

    #[Route('/{slugSection}/nos_equipes', name: 'our_team_categories_section')]
    public function ourTeamCategoriesSection(
        string $slugSection,
        SectionRepository $sectionRepository,
        NavBarService $navBarService
    ): Response {
        $section = $sectionRepository->findOneByWithNavBarMenus(['slug' => $slugSection]);
        $subMenusLoggedInMember = $navBarService->generateNavBarSubMenusLoggedInMember();
        $teamCategories = $section->getTeamCategories();

        return $this->render('section/activities_teams/our_team_categories.html.twig', [
            'section' => $section,
            'subMenusLoggedInMember' => $subMenusLoggedInMember,
            'teamCategories' => $teamCategories,
        ]);
    }

    #[Route('/{slugSection}/nos_equipes/{slugNavBarSubMenu}', name: 'our_teams_section')]
    public function ourTeamsSection(
        string $slugSection,
        string $slugNavBarSubMenu,
        SectionRepository $sectionRepository,
        NavBarService $navBarService,
        TeamCategoryRepository $teamCategoryRepository
    ): Response {
        $section = $sectionRepository->findOneByWithNavBarMenus(['slug' => $slugSection]);
        $subMenusLoggedInMember = $navBarService->generateNavBarSubMenusLoggedInMember();
        $teamCategory = $teamCategoryRepository->findOneByWithTeamsData(['slug' => $slugNavBarSubMenu, 'section' => $section]);

        return $this->render('section/activities_teams/our_teams.html.twig', [
            'section' => $section,
            'subMenusLoggedInMember' => $subMenusLoggedInMember,
            'teamCategory' => $teamCategory,
        ]);
    }

    #[Route('/{slugSection}/nos_activites', name: 'our_activities_section')]
    public function ourActivitiesSection(
        string $slugSection,
        SectionRepository $sectionRepository,
        NavBarService $navBarService,
        ActivityRepository $activityRepository
    ): Response {
        $section = $sectionRepository->findOneByWithNavBarMenus(['slug' => $slugSection]);
        $subMenusLoggedInMember = $navBarService->generateNavBarSubMenusLoggedInMember();
        $activities = $activityRepository->findByWithClassesData(['section' => $section]);

        return $this->render('section/activities_teams/our_activities.html.twig', [
            'section' => $section,
            'subMenusLoggedInMember' => $subMenusLoggedInMember,
            'activities' => $activities,
        ]);
    }
}
