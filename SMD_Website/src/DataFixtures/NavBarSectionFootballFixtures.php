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

class NavBarSectionFootballFixtures extends Fixture implements DependentFixtureInterface
{
    private $navBarLinkRepository;
    private $entityManager;
    private const SECTION = AssoSectionsFixtures::FOOTBALL;

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
            ['Accueil', 'section-football', 'home_section', 1],
            ['Le Club', 'le-club', '', 2],
            ['Nos Equipes', 'nos-equipes', '', 3],
            ['Boutique', 'boutique', '', 4],
            ['Infos Pratiques', 'infos-pratiques', 'useful_informations_section', 5],
            ['Accès Licenciés', 'acces-licencies', '', 6],
            ['Retour', '', 'home_association', 7],
        ];

        foreach ($navBarLinksData as $linkData) {
            $navBarLink = $this->createNavBarLink($linkData, $section);
            $manager->persist($navBarLink);
        }
    }

    public function loadNavBarDdLinks(ObjectManager $manager): void
    {
        $accueil = $this->navBarLinkRepository->findOneBy(['name' => 'Football - Accueil']);
        $le_club = $this->navBarLinkRepository->findOneBy(['name' => 'Football - Le Club']);
        $nos_equipes = $this->navBarLinkRepository->findOneBy(['name' => 'Football - Nos Equipes']);
        $infos_pratiques = $this->navBarLinkRepository->findOneBy(['name' => 'Football - Infos Pratiques']);
        $acces_licencies = $this->navBarLinkRepository->findOneBy(['name' => 'Football - Accès Licenciés']);

        $navBarDdLinksData = [
            ['Actualités', 'actualites', 'news_section', 1, $accueil],
            ['TV SMD', 'tv-smd', '', 2, $accueil],
            ['Notre Histoire', 'notre-histoire', '', 1, $le_club],
            ["L'Organigramme", 'l-organigramme', '', 2, $le_club],
            ['P.E.F.', 'p-e-f', '', 3, $le_club],
            ["Règlement et Charte", 'reglement-et-charte', '', 4, $le_club],
            ['Nos Partenaires', 'nos-partenaires', '', 5, $le_club],
            ['Séniors', 'seniors', 'our_teams_section', 1, $nos_equipes],
            ['U19', 'u19', 'our_teams_section', 2, $nos_equipes],
            ['U17', 'u17', 'our_teams_section', 3, $nos_equipes],
            ['U15', 'u15', 'our_teams_section', 4, $nos_equipes],
            ['U13', 'u13', 'our_teams_section', 5, $nos_equipes],
            ['U11', 'u11', 'our_teams_section', 6, $nos_equipes],
            ['U9', 'u9', 'our_teams_section', 7, $nos_equipes],
            ['U7', 'u7', 'our_teams_section', 8, $nos_equipes],
            ['Groupement Féminin', 'groupement-feminin', '', 9, $nos_equipes],
            ['Vétérans', 'veterans', 'our_teams_section', 10, $nos_equipes],
            ['Loisirs', 'loisirs', 'our_teams_section', 11, $nos_equipes],
            ["Arbitres", 'l-ecole-d-arbitrage', '', 12, $nos_equipes],
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
            ->setName("Football - " . $title)
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
