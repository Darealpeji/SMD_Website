<?php

namespace App\DataFixtures;

use App\Entity\NavBarLink;
use App\Entity\NavBarDdLink;
use Doctrine\Persistence\ObjectManager;
use App\Repository\NavBarLinkRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NavBarAssociationFixtures extends Fixture implements DependentFixtureInterface
{
    private $navBarLinkRepository;
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager, NavBarLinkRepository $navBarLinkRepository)
    {
        $this->entityManager = $entityManager;
        $this->navBarLinkRepository = $navBarLinkRepository;
    }

    public function load(ObjectManager $manager)
    {
        $association = $this->getReference(AssoSectionsFixtures::ASSOCIATION);

        $this->loadNavBarLinks($manager);
        $manager->flush();
        $this->dumpCreatedEntitiesCount(NavBarLink::class, $association);

        $this->loadNavBarDdLinks($manager);
        $manager->flush();
        $this->dumpCreatedEntitiesCount(NavBarDdLink::class, $association);
    }

    public function loadNavBarLinks(ObjectManager $manager): void
    {
        $association = $this->getReference(AssoSectionsFixtures::ASSOCIATION);

        $navBarLinksData = [
            ["Accueil", '', 'home_association', 1],
            ["L'Association", "l-association", '', 2],
            ["Nos Sections", "nos-sections", '', 3],
            ["Infos Pratiques", "infos-pratiques", 'useful_informations_association', 4],
        ];

        foreach ($navBarLinksData as $linkData) {
            $navBarLink = $this->createNavBarLink($linkData, $association);
            $manager->persist($navBarLink);
        }
    }

    public function loadNavBarDdLinks(ObjectManager $manager): void
    {
        $accueil = $this->navBarLinkRepository->findOneBy(['title' => 'Accueil']);
        $l_association = $this->navBarLinkRepository->findOneBy(['title' => "L'Association"]);
        $nos_sections = $this->navBarLinkRepository->findOneBy(['title' => 'Nos Sections']);

        $navBarDdLinksData = [
            ['Actualités', 'actualites', 'news_association', 1, $accueil],
            ['Notre Histoire', 'notre-histoire', '', 1, $l_association],
            ["L'Organigramme", 'l-organigramme', '', 2, $l_association],
            ['Documents', 'documents', '', 3, $l_association],
            ['Nos Partenaires', 'nos-partenaires', '', 4, $l_association],
            ['Basket', 'section-basket', 'home_section', 1, $nos_sections],
            ['Chorale', 'section-chorale', 'home_section', 2, $nos_sections],
            ['Danse', 'section-danse', 'home_section', 3, $nos_sections],
            ['Football', 'section-football', 'home_section', 4, $nos_sections],
            ['Gym Sportive', 'section-gym-sportive', 'home_section', 5, $nos_sections],
            ['Gym Tonique, Pilates, Yoga', 'section-gym-tonique-pilates-yoga', 'home_section', 6, $nos_sections],
            ['Loisirs', 'section-loisirs', 'home_section', 7, $nos_sections],
            ['Pétanque', 'section-petanque', 'home_section', 8, $nos_sections],
            ['Tennis de Table', 'section-tennis-de-table', 'home_section', 9, $nos_sections],
        ];

        foreach ($navBarDdLinksData as $ddLinkData) {
            $navBarDdLink = $this->createNavBarDdLink($ddLinkData);
            $manager->persist($navBarDdLink);
        }
    }

    private function createNavBarLink(array $navBarLinksData, $association): NavBarLink
    {
        [$title, $slug, $routeName, $ranking] = $navBarLinksData;

        $navBarLink = new NavBarLink();
        $navBarLink
            ->setName("Association - " . $title)
            ->setTitle($title)
            ->setSlug($slug)
            ->setRouteName($routeName)
            ->setRanking($ranking)
            ->setAssociation($association)
            ->setCreatedAtValue();
        return $navBarLink;
    }

    private function createNavBarDdLink(array $navBarDdLinksData): NavBarDdLink
    {
        [$name, $slug, $routeName, $ranking, $navBarLink] = $navBarDdLinksData;

        $navBarDdLink = new NavBarDdLink();
        $navBarDdLink
            ->setName($name)
            ->setSlug($slug)
            ->setRouteName($routeName)
            ->setRanking($ranking)
            ->setNavBarLink($navBarLink)
            ->setCreatedAtValue();
        return $navBarDdLink;
    }

    private function dumpCreatedEntitiesCount(string $entityClass, $association): void
    {
        $repository = $this->entityManager->getRepository($entityClass);

        if ($entityClass === NavBarLink::class) {
            $navBarLinks = $repository->findBy(['association' => $association]);
            $count = count($navBarLinks);

            echo sprintf("Nombre de NavBarLink(s) créé(s) pour l'%s : %d\n", $association->getName(), $count);

            foreach ($navBarLinks as $navBarLink) {
                echo sprintf("- %s\n", $navBarLink->getName());
            }
        } elseif ($entityClass === NavBarDdLink::class) {
            $navBarDdLinks = $repository->createQueryBuilder('ddLink')
                ->join('ddLink.navBarLink', 'navBarLink')
                ->where('navBarLink.association = :association')
                ->setParameter('association', $association)
                ->getQuery()
                ->getResult();

            $count = count($navBarDdLinks);

            echo sprintf("Nombre de NavBarDdLink(s) créé(s) pour l'%s : %d\n", $association->getName(), $count);

            foreach ($navBarDdLinks as $navBarDdLink) {
                echo sprintf("- %s\n", $navBarDdLink->getName());
            }
        }
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
