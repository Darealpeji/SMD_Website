<?php

namespace App\DataFixtures;

use App\Entity\Team;
use App\Entity\Section;
use App\Entity\Training;
use Cocur\Slugify\Slugify;
use App\Entity\TeamCategory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\Constants\TeamsConstants;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TeamsFixtures extends Fixture implements DependentFixtureInterface
{
    private \Cocur\Slugify\Slugify $slugify;

    private \Doctrine\ORM\EntityManagerInterface $entityManager;

    private \Symfony\Component\Console\Style\SymfonyStyle $io;

    public function __construct(Slugify $slugify, EntityManagerInterface $entityManager, SymfonyStyle $io)
    {
        $this->slugify = $slugify;
        $this->entityManager = $entityManager;
        $this->io = $io;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (TeamsConstants::ORGANIZATIONS as $sectionName => $sectionData) {
            $section = $this->getReference($sectionName);
            $this->loadTeamsForSection($manager, $section, $sectionData);
        }

        $manager->flush();

        $this->dumpSummaryFixtures($manager);
    }

    private function loadTeamsForSection(ObjectManager $manager, $section, array $sectionData): void
    {
        foreach ($sectionData['categories'] as $category => $categoryData) {
            $teamCategory = $this->createTeamCategory($manager, $section, $categoryData);

            foreach ($categoryData['teams'] as $team => $teamData) {
                $teamEntity = $this->createTeam($manager, $teamData, $teamCategory);

                if (isset($teamData['trainingSlot'])) {
                    foreach ($teamData['trainingSlot'] as $trainingSlotName) {
                        $trainingSlot = $this->findTrainingSlot($trainingSlotName);
                        $teamEntity->addTraining($trainingSlot);
                    }
                }

                if (isset($teamData['posts'])) {
                    foreach ($teamData['posts'] as $postData) {
                        $postReference = $section->getName() . " - " . $postData;
                        $post = $this->getReference($postReference);
                        $teamEntity->addPost($post);
                    }
                }

                $manager->persist($teamEntity);
            }
        }
    }

    private function createTeamCategory(ObjectManager $manager, $section, array $data): TeamCategory
    {
        $label = $data['label'];
        $competition = $data['competition'];

        $teamCategory = new TeamCategory();
        $teamCategory->setName($section->getName() . " - $label");
        $teamCategory->setLabel($label);
        $teamCategory->setSlug($this->slugify->slugify($label));
        $teamCategory->setCompetition($competition);
        $teamCategory->setSection($section);
        $teamCategory->setCreatedAtValue();
        $manager->persist($teamCategory);

        $this->setReference($teamCategory->getName(), $teamCategory);

        return $teamCategory;
    }

    private function createTeam(ObjectManager $manager, array $teamData, TeamCategory $teamCategory): Team
    {
        $name = $teamData['name'];

        $team = new Team();
        $team->setName($name);
        $team->setTeamCategory($teamCategory);
        $team->setCreatedAtValue();

        $manager->persist($team);

        return $team;
    }

    private function findTrainingSlot($trainingName)
    {
        $trainingRepository = $this->entityManager->getRepository(Training::class);

        $trainingSlot = $trainingRepository->findOneBy([
            'name' => $trainingName,
        ]);

        if ($trainingSlot !== null) {
            return $trainingSlot;
        }

        throw new \Exception("Créneau d'Entrainement introuvable pour : $trainingName");
    }

    private function dumpSummaryFixtures(ObjectManager $manager)
    {
        $sectionRepository = $manager->getRepository(Section::class);
        $teamCategorieRepository = $manager->getRepository(TeamCategory::class);
        $teamRepository = $manager->getRepository(Team::class);
        $sections = $sectionRepository->findAll();

        foreach ($sections as $section) {
            $teamCategories = $teamCategorieRepository->getTeamCategoriesBySection($section);

            if (! empty($teamCategories)) {
                $sectionName = $section->getName();
                $this->io->title("$sectionName :");

                $teamCategoriesCount = 0;
                $teamsCount = 0;

                $teamCategoriesCount = count($teamCategories);

                foreach ($teamCategories as $teamCategory) {
                    $teamCategoryName = $teamCategory->getLabel();
                    $this->io->text("- Catégorie $teamCategoryName - Equipes :");

                    $teams = $teamRepository->getTeamsByTeamCategory($teamCategory);
                    $teamsCount += count($teams);

                    foreach ($teams as $team) {
                        $teamName = $team->getName();
                        if ($teamName !== '0') {
                            $teamTimeSlotsCount = count($team->getTrainings());
                            $this->io->text("   - $teamName (" . $teamTimeSlotsCount . " créneau(x) d'entrainement)");
                        } else {
                            $this->io->text("   - Pas d'équipe créée");
                        }
                    }
                }

                $this->io->info("$sectionName : " . $teamCategoriesCount . " Catégorie(s) et " . $teamsCount . " Equipe(s) créée(s)");
            }
        }

        $this->io->success("Catégorie(s) et Equipe(s) créée(s) - TeamsFixtures terminé");
    }

    public function getDependencies()
    {
        return [
            OrganizationsFixtures::class,
            TimeSlotsFixtures::class,
            PostsFixtures::class,
        ];
    }
}
