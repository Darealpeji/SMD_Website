<?php

namespace App\DataFixtures;

use App\Entity\Section;
use App\Entity\NavBarMenu;
use App\Entity\Association;
use App\Entity\NavBarSubMenu;
use App\Repository\SectionRepository;
use Doctrine\Persistence\ObjectManager;
use App\Repository\NavBarMenuRepository;
use App\Repository\AssociationRepository;
use App\Entity\NavBarSubMenuLoggedInMember;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\Constants\NavBarConstants;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\DataFixtures\Constants\OrganizationsConstants;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NavBarsFixtures extends Fixture implements DependentFixtureInterface
{
    private $navBarMenuRepository;
    private $io;

    public function __construct(NavBarMenuRepository $navBarMenuRepository, SymfonyStyle $io)
    {
        $this->navBarMenuRepository = $navBarMenuRepository;
        $this->io = $io;
    }

    public function load(ObjectManager $manager)
    {

        $this->loadNavBarData($manager);
        $this->loadNavBarLoggedInData($manager);
        $this->dumpSummaryFixtures($manager);
    }

    private function loadNavBarData(ObjectManager $manager)
    {
        $navBarData = NavBarConstants::NAVBAR;

        foreach ($navBarData as $organization => $organizationData) {

            foreach ($organizationData['navBarMenusData'] as $navBarMenuData) {
                $navBarMenu = $this->createNavBarMenu($manager, $organization, $navBarMenuData);

                foreach ($navBarMenuData['navBarSubMenus'] as $navBarSubMenuData) {
                    $navBarSubMenu = $this->createNavBarSubMenu($manager, $navBarMenu, $navBarSubMenuData);
                }
            }
        }

        $manager->flush();
    }

    private function loadNavBarLoggedInData(ObjectManager $manager)
    {
        $navBarLoggedInData = NavBarConstants::NAVBAR_LOGGED_IN;

        foreach ($navBarLoggedInData['navBarSubMenusData'] as $navBarSubMenuData) {
            $this->createNavBarSubMenuLoggedInMember($manager, $navBarSubMenuData);
        }

        $manager->flush();
    }

    private function createNavBarMenu(ObjectManager $manager, $organization, $navBarMenuData)
    {
        $organizationReference = $this->getReference($organization);

        $navBarMenu = new NavBarMenu();
        $navBarMenu->setName(sprintf('%s - %s', $organizationReference->getName(), $navBarMenuData['label']));
        $navBarMenu->setLabel($navBarMenuData['label']);
        $navBarMenu->setSlug($navBarMenuData['slug']);
        $navBarMenu->setRouteName($navBarMenuData['routeName']);
        $navBarMenu->setRanking($navBarMenuData['ranking']);

        if ($organization === OrganizationsConstants::ASSOCIATION) {
            $navBarMenu->setAssociation($organizationReference);
        } else {
            $navBarMenu->setSection($organizationReference);
        }
        $navBarMenu->setCreatedAtValue();

        $manager->persist($navBarMenu);

        return $navBarMenu;
    }

    private function createNavBarSubMenu(ObjectManager $manager, $navBarMenu, $navBarSubMenuData)
    {
        $navBarSubMenu = new NavBarSubMenu();
        $navBarSubMenu->setName($navBarSubMenuData['label']);
        $navBarSubMenu->setSlug($navBarSubMenuData['slug']);
        $navBarSubMenu->setRouteName($navBarSubMenuData['routeName']);
        $navBarSubMenu->setRanking($navBarSubMenuData['ranking']);
        $navBarSubMenu->setNavBarMenu($navBarMenu);
        $navBarSubMenu->setCreatedAtValue();

        $manager->persist($navBarSubMenu);

        return $navBarSubMenu;
    }

    private function createNavBarSubMenuLoggedInMember(ObjectManager $manager, $navBarSubMenuData)
    {
        $navBarSubMenu = new NavBarSubMenuLoggedInMember();
        $navBarSubMenu->setName(sprintf('Membre Connecté - %s', $navBarSubMenuData['label']));
        $navBarSubMenu->setLabel($navBarSubMenuData['label']);
        $navBarSubMenu->setSlug($navBarSubMenuData['slug']);
        $navBarSubMenu->setRouteName($navBarSubMenuData['routeName']);
        $navBarSubMenu->setRanking($navBarSubMenuData['ranking']);
        $navBarSubMenu->setCreatedAtValue();

        $manager->persist($navBarSubMenu);
    }

    private function dumpSummaryFixtures(ObjectManager $manager)
    {
        $associationRepository = $manager->getRepository(Association::class);
        $sectionRepository = $manager->getRepository(Section::class);
        $navBarSubMenuRepository = $manager->getRepository(NavBarSubMenu::class);

        $this->io->newLine();
        $this->dumpNavBarData($this->io, $associationRepository, $navBarSubMenuRepository);
        $this->dumpNavBarData($this->io, $sectionRepository, $navBarSubMenuRepository);

        $subMenuLoggedInRepository = $manager->getRepository(NavBarSubMenuLoggedInMember::class);
        $subMenusLoggedIn = $subMenuLoggedInRepository->findAll();

        $subMenusCount = 0;

        $this->io->title("NavBar pour les Utilisateurs Connectés");

        foreach ($subMenusLoggedIn as $navBarSubMenu) {
            $navBarSubMenuName = $navBarSubMenu->getLabel();
            $this->io->text("   - $navBarSubMenuName");
            $subMenusCount++;
        }

        if ($subMenusCount > 0) {
            $this->io->info("$subMenusCount sous-menu(s) créé(s).");
        } else {
            $this->io->info("Aucun sous-menu créé.");
        }

        $this->io->success("NavBar(s) créée(s) - NavBarsFixtures terminé");
    }

    private function dumpNavBarData($io, $organizationsRepository, $navBarSubMenuRepository)
    {
        $organizations = $organizationsRepository->findAll();

        foreach ($organizations as $organization) {
            $organizationName = $organization->getName();
            $organizationNavBarMenus = $organization->getNavBarMenus();

            $io->title("NavBar pour : $organizationName");

            $menusCount = 0;
            $subMenusCount = 0;

            foreach ($organizationNavBarMenus as $menu) {
                $menuName = $menu->getLabel();
                $io->text("- $menuName");
                $menusCount++;

                $navBarSubmenus = $navBarSubMenuRepository->getSubMenusByNavBarMenu($menu);
                $subMenusCount += count($navBarSubmenus);

                foreach ($navBarSubmenus as $subMenu) {
                    $subMenuName = $subMenu->getName();
                    $io->text("  - $subMenuName");
                }
            }

            $io->info("$menusCount menu(s) et $subMenusCount sous-menu(s) créé(s).");
        }
    }

    public function getDependencies()
    {
        return [
            OrganizationsFixtures::class,
        ];
    }
}
