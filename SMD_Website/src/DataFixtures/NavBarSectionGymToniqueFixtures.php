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

class NavBarSectionGymToniqueFixtures extends Fixture implements DependentFixtureInterface
{
    private $navBarLinkRepository;
    private $entityManager;
    private const SECTION = AssoSectionsFixtures::GYM_TONIQUE;

    public function __construct(EntityManagerInterface $entityManager, NavBarLinkRepository $navBarLinkRepository)
    {
        $this->entityManager = $entityManager;
        $this->navBarLinkRepository = $navBarLinkRepository;
    }

    public function load(ObjectManager $manager)
    {
        $section = $this->getReference(self::SECTION);

        $this->loadNavBarLinks($manager);
        $manager->flush();
        $this->dumpCreatedEntitiesCount(NavBarLink::class, $section);

        $this->loadNavBarDdLinks($manager);
        $manager->flush();
        $this->dumpCreatedEntitiesCount(NavBarDdLink::class, $section);
    }

    public function loadNavBarLinks(ObjectManager $manager): void
    {
        $section = $this->getReference(self::SECTION);

        $navBarLinksData = [
            ['Accueil', 'section-gym-tonique-pilates-yoga', 'home_section', 1],
            ['Présentation', 'presentation', '', 2],
            ['Nos Disciplines', 'nos-disciplines', '', 3],
            ['Infos Pratiques', 'infos-pratiques', 'useful_informations_section', 4],
            ['Accès Membres', 'acces-membres', '', 5],
            ['Retour', '', 'home_association', 6],
        ];

        foreach ($navBarLinksData as $linkData) {
            $navBarLink = $this->createNavBarLink($linkData, $section);
            $manager->persist($navBarLink);
        }
    }

    public function loadNavBarDdLinks(ObjectManager $manager): void
    {
        $accueil = $this->navBarLinkRepository->findOneBy(['name' => 'Gym Tonique, Pilates, Yoga - Accueil']);
        $infos_pratiques = $this->navBarLinkRepository->findOneBy(['name' => 'Gym Tonique, Pilates, Yoga - Infos Pratiques']);
        $acces_membres = $this->navBarLinkRepository->findOneBy(['name' => 'Gym Tonique, Pilates, Yoga - Accès Membres']);

        $navBarDdLinksData = [
            ['Actualités', 'actualites', 'news_section', 1, $accueil],
            ['Inscriptions', 'inscriptions', '', 1, $infos_pratiques],
            ['Compte', 'compte', '', 1, $acces_membres],
            ['Se Déconnecter', 'se-deconnecter', '', 2, $acces_membres],
        ];

        foreach ($navBarDdLinksData as $ddLinkData) {
            $navBarDdLink = $this->createNavBarDdLink($ddLinkData);
            $manager->persist($navBarDdLink);
        }
    }

    private function createNavBarLink(array $navBarLinksData, $section): NavBarLink
    {
        [$title, $slug, $routeName, $ranking] = $navBarLinksData;

        $navBarLink = new NavBarLink();
        $navBarLink
            ->setName("Gym Tonique, Pilates, Yoga - " . $title)
            ->setTitle($title)
            ->setSlug($slug)
            ->setRouteName($routeName)
            ->setRanking($ranking)
            ->setSection($section)
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

    private function dumpCreatedEntitiesCount(string $entityClass, $section): void
    {
        $repository = $this->entityManager->getRepository($entityClass);

        if ($entityClass === NavBarLink::class) {
            $navBarLinks = $repository->findBy(['section' => $section]);
            $count = count($navBarLinks);

            echo sprintf("Nombre de NavBarLink(s) créé(s) pour la %s : %d\n", $section->getName(), $count);

            foreach ($navBarLinks as $navBarLink) {
                echo sprintf("- %s\n", $navBarLink->getName());
            }
        } elseif ($entityClass === NavBarDdLink::class) {
            $navBarDdLinks = $repository->createQueryBuilder('ddLink')
                ->join('ddLink.navBarLink', 'navBarLink')
                ->where('navBarLink.section = :section')
                ->setParameter('section', $section)
                ->getQuery()
                ->getResult();

            $count = count($navBarDdLinks);

            echo sprintf("Nombre de NavBarDdLink(s) créé(s) pour la %s : %d\n", $section->getName(), $count);

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
