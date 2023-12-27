<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\SectionRepository;
use App\Repository\NavBarLinkRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SectionController extends AbstractController
{
    #[Route('/{slug}', name: 'home_section')]
    public function home(string $slug, SectionRepository $sectionRepository, NavBarLinkRepository $navBarLinkRepository): Response
    {
        $section = $sectionRepository->findOneBy(['slug' => $slug]);
        $navBarLinks = $navBarLinkRepository->getNavBarBySection($section);

        return $this->render('section/home.html.twig', [
            'section' => $section,
            'navBarLinks' => $navBarLinks,
        ]);
    }

    #[Route('/{slug}/actualites', name: 'news_section')]
    public function listArticleAssociation(string $slug, SectionRepository $sectionRepository, NavBarLinkRepository $navBarLinkRepository, ArticleRepository $articleRepository): Response
    {
        $section = $sectionRepository->findOneBy(['slug' => $slug]);
        $navBarLinks = $navBarLinkRepository->getNavBarBySection($section);
        $articles = $articleRepository->getArticlesBySection($section);

        return $this->render('section/news/news_list.html.twig', [
            'section' => $section,
            'navBarLinks' => $navBarLinks,
            'articles' => $articles,
        ]);

    }

    #[Route('/{slugSection}/actualites/{id}-{slugArticle}', name: 'detail_news_section')]
    public function detailArticleSection(int $id, string $slugArticle, string $slugSection, SectionRepository $sectionRepository, NavBarLinkRepository $navBarLinkRepository, ArticleRepository $articleRepository): Response
    {
        $section = $sectionRepository->findOneBy(['slug' => $slugSection]);
        $navBarLinks = $navBarLinkRepository->getNavBarBySection($section);
        $article = $articleRepository->findOneBy(['id' => $id, 'slug' => $slugArticle]);

        return $this->render('section/news/news_detail.html.twig', [
            'section' => $section,
            'navBarLinks' => $navBarLinks,
            'article' => $article,
        ]);

    }
}