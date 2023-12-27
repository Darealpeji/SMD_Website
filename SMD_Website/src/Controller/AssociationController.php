<?php

namespace App\Controller;

use App\Entity\Association;
use App\Repository\ArticleRepository;
use App\Repository\NavBarLinkRepository;
use App\Repository\AssociationRepository;
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

    #[Route('/actualites/{id}-{slug}', name: 'detail_news_association')]
    public function detailArticleAssociation(int $id, string $slug, AssociationRepository $associationRepository, NavBarLinkRepository $navBarLinkRepository, ArticleRepository $articleRepository): Response
    {
        $association = $associationRepository->getAssociationData();
        $navBarLinks = $navBarLinkRepository->getNavBarByAssociation($association);
        $article = $articleRepository->findOneBy(['id' => $id, 'slug' => $slug]);

        return $this->render('association/news/news_detail.html.twig', [
            'association' => $association,
            'navBarLinks' => $navBarLinks,
            'article' => $article,
        ]);
    }
}