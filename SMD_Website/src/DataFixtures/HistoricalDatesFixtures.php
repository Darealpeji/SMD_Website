<?php

namespace App\DataFixtures;

use App\Entity\Association;
use App\Entity\HistoricalDate;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\DataFixtures\Constants\HistoricalDatesConstants;
use App\Entity\Section;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class HistoricalDatesFixtures extends Fixture implements DependentFixtureInterface
{
    private $io;

    public function __construct(SymfonyStyle $io)
    {
        $this->io = $io;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (HistoricalDatesConstants::HISTORICAL_DATES as $organizationnName => $organizationData) {
            $organization = $this->getReference($organizationnName);

            foreach ($organizationData as $data) {
                $year = $data['year'];
                $description = $data['description'];

                $historicalDate = new HistoricalDate();
                $historicalDate
                    ->setYear($year)
                    ->setDescription($description)
                    ->setCreatedAtValue();

                $this->addHistoricalDateToOrganization($historicalDate, $organization);
                $manager->persist($historicalDate);
            }
        }

        $manager->flush();

        $this->dumpSummaryFixtures($manager);
    }

    private function addHistoricalDateToOrganization($historicalDate, $organization)
    {
        if ($organization instanceof Association) {
            $historicalDate->setAssociation($organization);
        } else {
            $historicalDate->setSection($organization);
        }
    }

    private function dumpSummaryFixtures(ObjectManager $manager)
    {
        $associationRepository = $manager->getRepository(Association::class);
        $sectionRepository = $manager->getRepository(Section::class);

        $this->io->newLine();
        $this->io->title('Création des Dates Historiques par Organisation.');
        $this->dumpHistoricalDatesData($this->io, $associationRepository);
        $this->dumpHistoricalDatesData($this->io, $sectionRepository);

        $this->io->success("Date(s) Historique(s) créé(s) - HistoricalDatesFixtures terminé");
    }

    private function dumpHistoricalDatesData($io, $organizationsRepository)
    {
        $organizations = $organizationsRepository->findAll();

        foreach ($organizations as $organization) {

            $count = $organization->getHistoricalDates()->count();

            if ($count > 0) {
                $organizationName = $organization->getName();

                $io->text("- $organizationName : " . $count . " date(s) historique(s) créé(s).");
            }
        }
    }

    public function getDependencies()
    {
        return [
            OrganizationsFixtures::class,
        ];
    }
}
