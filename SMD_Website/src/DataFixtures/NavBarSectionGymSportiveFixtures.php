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

class NavBarSectionGymSportiveFixtures extends Fixture implements DependentFixtureInterface
{
    private $navBarLinkRepository;
    private $entityManager;
    private const SECTION = AssoSectionsFixtures::GYM_SPORTIVE;

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
            ['Accueil', 'section-gym-sportive', 'home_section', 1],
            ['Présentation', 'presentation', '', 2],
            ['Nos Disciplines', 'nos-disciplines', '', 3],
            ['Infos Pratiques', 'infos-pratiques', 'useful_informations_section', 4],
            ['Accès Licenciés', 'acces-licencies', '', 5],
            ['Retour', '', 'home_association', 6],
        ];

        foreach ($navBarLinksData as $linkData) {
            $navBarLink = $this->createNavBarLink($linkData, $section);
            $manager->persist($navBarLink);
        }
    }

    public function loadNavBarDdLinks(ObjectManager $manager): void
    {
        $accueil = $this->navBarLinkRepository->findOneBy(['name' => 'Gym Sportive - Accueil']);
        $nos_disciplines = $this->navBarLinkRepository->findOneBy(['name' => 'Gym Sportive - Nos Disciplines']);
        $infos_pratiques = $this->navBarLinkRepository->findOneBy(['name' => 'Gym Sportive - Infos Pratiques']);
        $acces_licencies = $this->navBarLinkRepository->findOneBy(['name' => 'Gym Sportive - Accès Licenciés']);

        $navBarDdLinksData = [
            ['Actualités', 'actualites', 'news_section', 1, $accueil],
            ['Parents-Bébé', 'parents-bebe', '', 1, $nos_disciplines],
            ['Eveil Gymnique', 'eveil-gymnique', '', 2, $nos_disciplines],
            ['Loisirs', 'loisirs', '', 3, $nos_disciplines],
            ['Poussines', 'poussines', '', 4, $nos_disciplines],
            ['Jeunesses', 'jeunesses', '', 5, $nos_disciplines],
            ['Ainées', 'ainees', '', 6, $nos_disciplines],
            ['Inscriptions', 'inscriptions', '', 1, $infos_pratiques],
            ['Compte', 'compte', '', 1, $acces_licencies],
            ['Convocations', 'convocations', '', 2, $acces_licencies],
            ['Se Déconnecter', 'se-deconnecter', '', 3, $acces_licencies],
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
            ->setName("Gym Sportive - " . $title)
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
