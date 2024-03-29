<?php

namespace App\Controller\Admin;

use App\Entity\Post;
use App\Entity\Role;
use App\Entity\Member;
use App\Entity\Article;
use App\Entity\Section;
use App\Entity\Activity;
use App\Entity\Training;
use App\Entity\NavBarMenu;
use App\Entity\Association;
use App\Entity\TeamCategory;
use App\Entity\ActivityPlace;
use App\Entity\ArticleCategory;
use App\Entity\NavBarSubMenuLoggedInMember;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('Admin/home.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('SMD Admin')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de Bord', 'fa fa-home');

        yield MenuItem::section("Gestion des Organisations");
        yield MenuItem::linkToCrud('Association', 'fas fa-landmark', Association::class);
        yield MenuItem::linkToCrud('Sections', 'fas fa-building', Section::class);

        yield MenuItem::section('Gestion des Equipes');
        yield MenuItem::linkToCrud('Catégories & Equipes', 'fas fa-shirt', TeamCategory::class);
        yield MenuItem::linkToCrud('Entrainements', 'fas fa-stopwatch', Training::class);

        yield MenuItem::section('Gestion des Activités');
        yield MenuItem::linkToCrud('Activités', 'fas fa-users-between-lines', Activity::class);

        yield MenuItem::section("Gestion des Articles");
        yield MenuItem::linkToCrud('Actualités', 'fas fa-newspaper', Article::class);
        yield MenuItem::linkToCrud('Catégorie Actualités', 'fas fa-folder', ArticleCategory::class);

        yield MenuItem::section('Gestion des adhérents');
        yield MenuItem::linkToCrud('Adhérents', 'fas fa-person', Member::class);

        yield MenuItem::section("Paramétrage");
        yield MenuItem::linkToCrud("Lieux d'Activités", 'fas fa-map-location-dot', ActivityPlace::class);
        yield MenuItem::linkToCrud("Postes", 'fas fa-briefcase', Post::class);
        yield MenuItem::linkToCrud("Rôles", 'fas fa-briefcase', Role::class);

        yield MenuItem::section("Gestion des Barres de Navigation");
        yield MenuItem::linkToCrud("Menus Classique", 'fas fa-bars', NavBarMenu::class);
        yield MenuItem::linkToCrud("Menus Connecté", 'fas fa-bars', NavBarSubMenuLoggedInMember::class);
    }
}
