<?php

namespace App\DataFixtures;

use App\Entity\Section;
use App\Entity\Activity;
use App\Entity\Training;
use App\Entity\ActivityClass;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\DataFixtures\Constants\ActivityClassesConstants;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ActivityClassesFixtures extends Fixture implements DependentFixtureInterface
{
    private EntityManagerInterface $entityManager;

    private SymfonyStyle $io;

    public function __construct(EntityManagerInterface $entityManager, SymfonyStyle $io)
    {

        $this->entityManager = $entityManager;
        $this->io = $io;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (ActivityClassesConstants::CLASSES_SCHEDULE as $sectionName => $sectionData) {
            $section = $this->getReference($sectionName);
            $this->loadClassesForSection($manager, $section, $sectionData);
        }

        $manager->flush();

        $this->dumpSummaryFixtures($manager);
    }

    private function loadClassesForSection(ObjectManager $manager, Section $section, array $sectionData): void
    {
        foreach ($sectionData['activities'] as $activity => $activityData) {

            $activity = $this->createActivity($manager, $section, $activityData);

            foreach ($activityData['activityClasses'] as $activityClass => $activityClassData) {
                $activityClassEntity = $this->createActivityClass($manager, $activityClassData, $activity);

                if (isset($activityClassData['trainingSlot'])) {
                    foreach ($activityClassData['trainingSlot'] as $trainingSlotName) {
                        $trainingSlot = $this->findTrainingSlot($trainingSlotName);
                        $activityClassEntity->addTraining($trainingSlot);
                    }
                }

                if (isset($activityClassData['posts'])) {
                    foreach ($activityClassData['posts'] as $postData) {
                        $postReference = $section->getName() . " - " . $postData;
                        $post = $this->getReference($postReference);
                        $activityClassEntity->addPost($post);
                    }
                }

                $manager->persist($activityClassEntity);
            }
        }
    }

    private function createActivity(ObjectManager $manager, Section $section, array $data): Activity
    {
        $label = $data['label'];
        $competition = $data['competition'];

        $activity = new Activity();
        $activity->setName($section->getName() . " - $label");
        $activity->setLabel($label);
        $activity->setCompetition($competition);
        $activity->setSection($section);
        $activity->setCreatedAtValue();
        $manager->persist($activity);

        $this->addReference($activity->getName(), $activity);

        return $activity;
    }

    private function createActivityClass(ObjectManager $manager, array $activityClassData, Activity $activity): ActivityClass
    {
        $name = $activityClassData['name'];

        $activityClass = new ActivityClass();
        $activityClass->setName($name);
        $activityClass->setActivity($activity);
        $activityClass->setCreatedAtValue();

        $manager->persist($activityClass);

        return $activityClass;
    }

    private function findTrainingSlot(string $trainingName): ?Training
    {
        $trainingRepository = $this->entityManager->getRepository(Training::class);

        $trainingSlot = $trainingRepository->findOneBy([
            'name' => $trainingName,
        ]);

        if ($trainingSlot !== null) {
            return $trainingSlot;
        }

        throw new \Exception("Créneau de Cours introuvable pour : $trainingName");
    }

    private function dumpSummaryFixtures(ObjectManager $manager): void
    {
        $sectionRepository = $manager->getRepository(Section::class);
        $activityRepository = $manager->getRepository(Activity::class);
        $activityClassRepository = $manager->getRepository(ActivityClass::class);
        $sections = $sectionRepository->findAll();

        foreach ($sections as $section) {

            $activities = $activityRepository->getActivitiesBySection($section);

            if (!empty($activities)) {

                $sectionName = $section->getName();
                $this->io->title("$sectionName :");

                $activitiesCount = 0;
                $activityClassesCount = 0;

                $activitiesCount = count($activities);

                foreach ($activities as $activity) {

                    $activityName = $activity->getLabel();
                    $this->io->text("- Activité $activityName - Cours :");

                    $activityClasses = $activityClassRepository->getActivityClassesByActivity($activity);
                    $activityClassesCount += count($activityClasses);

                    foreach ($activityClasses as $activityClass) {
                        $activityClassName = $activityClass->getName();
                        if ($activityClassName !== '0') {
                            $activityClassTimeSlotsCount = count($activityClass->getTrainings());
                            $this->io->text("   - $activityClassName (" . $activityClassTimeSlotsCount . " créneau(x) de cours)");
                        } else {
                            $this->io->text("   - Pas de cours créés");
                        }
                    }
                }

                $this->io->info("$sectionName : " . $activitiesCount . " Activité(s) et " . $activityClassesCount . " Cours créé(s)");
            }
        }

        $this->io->success("Activité(s) et Cours créé(s) - ActivityClassesFixtures terminé");
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
