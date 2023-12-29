<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\SectionRepository;
use App\Repository\NavBarLinkRepository;
use App\Repository\ActivityPlaceRepository;
use App\Repository\TeamCategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SectionController extends AbstractController
{
    #[Route('/{slugSection}', name: 'home_section')]
    public function home(string $slugSection, SectionRepository $sectionRepository, NavBarLinkRepository $navBarLinkRepository): Response
    {
        $section = $sectionRepository->findOneBy(['slug' => $slugSection]);
        $navBarLinks = $navBarLinkRepository->getNavBarBySection($section);

        return $this->render('section/home.html.twig', [
            'section' => $section,
            'navBarLinks' => $navBarLinks,
        ]);
    }

    #[Route('/{slugSection}/actualites', name: 'news_section')]
    public function listArticleAssociation(string $slugSection, SectionRepository $sectionRepository, NavBarLinkRepository $navBarLinkRepository, ArticleRepository $articleRepository): Response
    {
        $section = $sectionRepository->findOneBy(['slug' => $slugSection]);
        $navBarLinks = $navBarLinkRepository->getNavBarBySection($section);
        $articles = $articleRepository->getArticlesBySection($section);

        return $this->render('section/news/news_list.html.twig', [
            'section' => $section,
            'navBarLinks' => $navBarLinks,
            'articles' => $articles,
        ]);
    }

    #[Route('/{slugSection}/actualites/{idArticle}-{slugArticle}', name: 'detail_news_section')]
    public function detailArticleSection(int $idArticle, string $slugArticle, string $slugSection, SectionRepository $sectionRepository, NavBarLinkRepository $navBarLinkRepository, ArticleRepository $articleRepository): Response
    {
        $section = $sectionRepository->findOneBy(['slug' => $slugSection]);
        $navBarLinks = $navBarLinkRepository->getNavBarBySection($section);
        $article = $articleRepository->findOneBy(['id' => $idArticle, 'slug' => $slugArticle]);

        return $this->render('section/news/news_detail.html.twig', [
            'section' => $section,
            'navBarLinks' => $navBarLinks,
            'article' => $article,
        ]);
    }

    #[Route('/{slugSection}/informations-pratiques', name: 'useful_informations_section')]
    public function usefulInformationSection(string $slugSection, SectionRepository $sectionRepository, NavBarLinkRepository $navBarLinkRepository): Response
    {
        $section = $sectionRepository->findOneBy(['slug' => $slugSection]);
        $navBarLinks = $navBarLinkRepository->getNavBarBySection($section);
        $activityPlaces = $section->getActivityPlaces();

        return $this->render('section/useful_informations/useful_informations.html.twig', [
            'section' => $section,
            'navBarLinks' => $navBarLinks,
            'activityPlaces' => $activityPlaces,
        ]);
    }

    #[Route('/{slugSection}/nos_equipes', name: 'our_team_categories_section')]
    public function ourTeamCategoriesSection(string $slugSection, SectionRepository $sectionRepository, NavBarLinkRepository $navBarLinkRepository): Response
    {
        $section = $sectionRepository->findOneBy(['slug' => $slugSection]);
        $navBarLinks = $navBarLinkRepository->getNavBarBySection($section);
        $teamCategories = $section->getTeamCategories();

        return $this->render('section/teams/our_team_categories.html.twig', [
            'section' => $section,
            'navBarLinks' => $navBarLinks,
            'teamCategories' => $teamCategories,
        ]);
    }

    #[Route('/{slugSection}/nos_equipes/{slugNavBarDdLink}', name: 'our_teams_section')]
    public function ourTeamsSection(string $slugSection, string $slugNavBarDdLink, SectionRepository $sectionRepository, NavBarLinkRepository $navBarLinkRepository, TeamCategoryRepository $teamCategoryRepository): Response
    {
        $section = $sectionRepository->findOneBy(['slug' => $slugSection]);
        $navBarLinks = $navBarLinkRepository->getNavBarBySection($section);
        $teamCategory = $teamCategoryRepository->findOneBy(['slug' => $slugNavBarDdLink, 'section' => $section]);

        return $this->render('section/teams/our_teams.html.twig', [
            'section' => $section,
            'navBarLinks' => $navBarLinks,
            'teamCategory' => $teamCategory,
        ]);
    }
}
