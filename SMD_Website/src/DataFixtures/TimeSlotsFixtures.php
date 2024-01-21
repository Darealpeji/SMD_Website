<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Training;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\ActivityPlacesFixtures;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\DataFixtures\Constants\TimeSlotsConstants;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TimeSlotsFixtures extends Fixture implements DependentFixtureInterface
{
    private $io;

    public function __construct(SymfonyStyle $io)
    {
        $this->io = $io;
    }

    public function load(ObjectManager $manager): void
    {
        $timeSlots = TimeSlotsConstants::TRAINING_TIME_SLOTS;

        foreach ($timeSlots as $timeSlotReference => $placesData) {
            foreach ($placesData as $activityPlaceReference => $daysData) {
                $activityPlace = $this->getReference($activityPlaceReference);

                $activityPlaceName = $activityPlace->getName();
                $this->io->title("Nombre de créneaux pour : " . $activityPlaceName);

                foreach ($daysData['day'] as $day => $schedule) {
                    $count = count($schedule['startTimeSlot']);
                    $this->io->text("- le " . $day . ": " . $count);

                    foreach ($schedule['startTimeSlot'] as $key => $startTime) {
                        $fixedDate = '2024-01-01';
                        $startDateTime = DateTime::createFromFormat('Y-m-d H:i', $fixedDate . ' ' . $startTime);
                        $endDateTime = DateTime::createFromFormat('Y-m-d H:i', $fixedDate . ' ' . $schedule['endTimeSlot'][$key]);

                        if ($startDateTime && $endDateTime) {
                            $training = new Training();
                            $training->setName(sprintf(
                                '%s - Le %s de %s à %s',
                                $activityPlace->getName(),
                                $day,
                                $startDateTime->format('H:i'),
                                $endDateTime->format('H:i')
                            ));

                            $training
                                ->setDay($day)
                                ->setStartTimeSlot($startDateTime)
                                ->setEndTimeSlot($endDateTime)
                                ->setActivityPlace($activityPlace)
                                ->setCreatedAtValue();

                            $manager->persist($training);
                        }
                    }
                }
            }
        }

        $manager->flush();
        $this->io->success("Créneau(x) d'Entrainements et de Cours créé(s) - TimeSlotsFixtures terminé");
    }

    public function getDependencies()
    {
        return [
            ActivityPlacesFixtures::class,
            OrganizationsFixtures::class,
            NavBarsFixtures::class,
        ];
    }
}
