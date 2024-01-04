<?php

namespace App\DataFixtures;

use App\Entity\Team;
use App\Entity\TeamCategory;
use Cocur\Slugify\Slugify;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TeamsFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    private const SECTIONS = [
        'football' => [
            'name' => 'Section Football',
            'categories' => [
                'Séniors' => ['teams' => ['Séniors A', 'Séniors B', 'Séniors C'],],
                'U19' => ['teams' => ['U19']],
                'U17' => ['teams' => ['U17']],
                'U15' => ['teams' => ['U15']],
                'U13' => ['teams' => ['U13']],
                'U11' => ['teams' => ['U11']],
                'U9' => ['teams' => ['U9']],
                'U7' => ['teams' => ['U7']],
                'Groupement Féminin' => ['teams' => ['Groupement Féminin']],
                'Vétérans' => ['teams' => ['Vétérans']],
                'Loisirs' => ['teams' => ['Loisirs']],
                'Arbitres' => ['teams' => ['Arbitres']],
            ],
        ],
        'basket' => [
            'name' => 'Section Basket',
            'categories' => [
                'Séniors' => ['teams' => ['Séniors Filles 1', 'Séniors Filles 2', 'Séniors Garçons 1', 'Séniors Garçons 2', 'Séniors Garçons 3']],
                'U20' => ['teams' => ['U20 Garçons 1']],
                'U18' => ['teams' => ['U18 Filles 1']],
                'U17' => ['teams' => ['U17 Garçons 1', 'U17 Garçons 2']],
                'U15' => ['teams' => ['U15 Filles 1', 'U15 Garçons 1']],
                'U13' => ['teams' => ['U13 Filles 1', 'U13 Filles 2', 'U13 Garçons 1', 'U13 Garçons 2', 'U13 Garçons 3']],
                'U11' => ['teams' => ['U11 Filles 1', 'U11 Filles 2', 'U11 Garçons 1', 'U11 Garçons 2']],
                'U9' => ['teams' => ['U9 Filles', 'U9 Garçons']],
                'U7' => ['teams' => ['U7 Mixte']],
            ],
        ],

        'tennis_de_table' => [
            'name' => 'Section Tennis de Table',
            'categories' => [
                'Nationale' => ['teams' => ['Nationale 2 Garçons', 'Nationale 3 Filles', 'Nationale 3 Garçons', 'Pré Nationale Garçons']],
                'Régionale' => ['teams' => ['Régionale 1 Garçons', 'Régionale 3 Garçons', 'Pré Régionale Filles']],
                'Départementale' => ['teams' => ['Départementale 0', 'Départementale 1', 'Départementale 2', 'Départementale 4']],
                'Jeunes' => ['teams' => ['Jeunes 1', 'Jeunes 2']],
            ],
        ],
    ];

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::SECTIONS as $sectionName => $sectionData) {
            $section = $this->getReference($sectionName);
            $this->loadTeamsForSection($manager, $section, $sectionData);
        }

        $manager->flush();
    }

    private function loadTeamsForSection(ObjectManager $manager, $section, array $sectionData): void
    {
        $categoriesCount = 0;
        $teamsCount = 0;

        echo sprintf("%s :\n", ucwords(str_replace('_', ' ', strtolower($section->getName()))));

        foreach ($sectionData['categories'] as $categoryName => $categoryData) {
            $teamCategory = $this->createTeamCategory($manager, $section, $categoryName);

            $this->addReference($this->getCategoryReferenceName($section->getName(), $categoryName), $teamCategory);

            $categoriesCount++;

            echo sprintf("- Catégorie créée : %s - Equipes créées :\n", $categoryName);

            foreach ($categoryData['teams'] as $teamName) {
                $this->createTeam($manager, $teamName, $teamCategory);
                $teamsCount++;
                echo sprintf("  - %s\n", $teamName);
            }
        }

        echo sprintf("%s : %d catégories créée(s) et %d équipes créée(s)\n", $section->getName(), $categoriesCount, $teamsCount);
    }

    private function createTeamCategory(ObjectManager $manager, $section, string $categoryName): TeamCategory
    {
        $teamCategory = new TeamCategory();
        $teamCategory->setName($section->getName() . " - $categoryName");
        $teamCategory->setTitle($categoryName);
        $teamCategory->setSlug($this->slugify->slugify($teamCategory->getTitle()));
        $teamCategory->setSection($section);
        $teamCategory->setCreatedAtValue();
        $manager->persist($teamCategory);

        return $teamCategory;
    }

    private function createTeam(ObjectManager $manager, string $teamName, TeamCategory $teamCategory): Team
    {
        $team = new Team();
        $team->setName($teamName);
        $team->setTeamCategory($teamCategory);
        $team->setCreatedAtValue();
        $manager->persist($team);

        return $team;
    }

    private function getCategoryReferenceName(string $sectionName, string $categoryName): string
    {
        return str_replace('_', ' ', $sectionName) . " - $categoryName";
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
