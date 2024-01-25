<?php

namespace App\DataFixtures;

use App\Entity\ActivityPlace;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\DataFixtures\Constants\ActivityPlacesConstants;

class ActivityPlacesFixtures extends Fixture
{
    private $io;

    public function __construct(SymfonyStyle $io)
    {
        $this->io = $io;
    }
    public function load(ObjectManager $manager): void
    {
        foreach (ActivityPlacesConstants::ACTIVITY_PLACES as $reference => $activityPlaceData) {
            $activityPlace = $this->createActivityPlace(
                $activityPlaceData['name'],
                $activityPlaceData['address'],
                $activityPlaceData['postalCode'],
                $activityPlaceData['city']
            );

            $manager->persist($activityPlace);
            $this->addReference($reference, $activityPlace);
        }

        $manager->flush();
        $this->dumpSummaryFixtures($manager);
    }

    private function createActivityPlace(
        string $name,
        string $address,
        string $postalCode,
        string $city
    ): ActivityPlace {
        $activityPlace = new ActivityPlace();
        $activityPlace
            ->setName($name)
            ->setAdress($address)
            ->setPostalCode($postalCode)
            ->setCity($city)
            ->setGoogleMapLink("")
            ->setRecommendedRoute("")
            ->setCreatedAtValue();

        return $activityPlace;
    }

    private function dumpSummaryFixtures(ObjectManager $manager)
    {
        $repository = $manager->getRepository(ActivityPlace::class);
        $activityPlaces = $repository->findAll();

        $count = count($activityPlaces);
        $this->io->title("Lieu(x) d'activité créé(s) : $count");

        foreach ($activityPlaces as $activityPlace) {
            $activityPlaceName = $activityPlace->getName();
            $this->io->text("  - $activityPlaceName");
        }

        $this->io->success("Lieu(x) d'Activité créé(s) - ActivityPlacesFixtures terminé");
    }
}
