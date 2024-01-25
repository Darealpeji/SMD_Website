<?php

namespace App\DataFixtures;

use App\Entity\Section;
use Cocur\Slugify\Slugify;
use App\Entity\Association;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\ActivityPlacesFixtures;
use App\DataFixtures\Constants\OrganizationsConstants;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class OrganizationsFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;
    private $io;

    public function __construct(Slugify $slugify, SymfonyStyle $io)
    {
        $this->slugify = $slugify;
        $this->io = $io;
    }

    public function load(ObjectManager $manager): void
    {
        $this->loadAssociation($manager);
        $this->loadSections($manager);
        $this->dumpSummaryFixtures($manager);
    }

    private function loadAssociation(ObjectManager $manager): void
    {
        $organizationData = OrganizationsConstants::getOrganizationData(OrganizationsConstants::ASSOCIATION);
        $association = $this->createAssociation($organizationData);

        $activityPlacesForAssociation = OrganizationsConstants::getActivityPlacesForAssociation();

        foreach ($activityPlacesForAssociation as $activityPlaceReference) {
            $association->addActivityPlace($this->getReference($activityPlaceReference));
        }

        $manager->persist($association);
        $manager->flush();

        $this->setReference(OrganizationsConstants::ASSOCIATION, $association);
    }

    private function loadSections(ObjectManager $manager): void
    {
        foreach (OrganizationsConstants::getSections() as $sectionName) {
            $sectionData = OrganizationsConstants::getOrganizationData($sectionName);
            $section = $this->createSection($sectionData);

            $activityPlacesForSection = OrganizationsConstants::getActivityPlacesForSection($sectionName);

            foreach ($activityPlacesForSection as $activityPlaceReference) {
                $section->addActivityPlace($this->getReference($activityPlaceReference));
            }

            $manager->persist($section);
            $this->setReference($sectionName, $section);
        }

        $manager->flush();
    }

    private function createAssociation(array $data): Association
    {
        $association = new Association();
        $association
            ->setName($data['name'])
            ->setMotto($data['motto'])
            ->setAdress($data['adress'])
            ->setPostalCode($data['postalCode'])
            ->setCity($data['city'])
            ->setPhone($data['phone'])
            ->setMail($data['mail'])
            ->setPresentation($data['presentation'])
            ->setHistorical($data['historical'])
            ->setCreatedAtValue();

        return $association;
    }

    private function createSection(array $data): Section
    {
        $section = new Section();
        $section
            ->setName($data['name'])
            ->setMotto($data['motto'])
            ->setAdress($data['adress'])
            ->setPostalCode($data['postalCode'])
            ->setCity($data['city'])
            ->setPhone($data['phone'])
            ->setMail($data['mail'])
            ->setSlug($this->slugify->slugify($section->getName()))
            ->setScoreNCoCode("")
            ->setManageConvocation($data['manageConvocation'])
            ->setPresentation($data['presentation'])
            ->setHistorical($data['historical'])
            ->setAssociation($this->getReference(OrganizationsConstants::ASSOCIATION))
            ->setCreatedAtValue();

        return $section;
    }

    private function dumpSummaryFixtures(ObjectManager $manager)
    {
        $associationRepository = $manager->getRepository(Association::class);
        $association = $associationRepository->findAll();

        $sectionRepository = $manager->getRepository(Section::class);
        $sections = $sectionRepository->findAll();

        foreach ($association as $association) {
            $associationName = $association->getName();
            $this->io->title("Association créée : $associationName");
        }

        $count = count($sections);
        $this->io->title("Section(s) créée(s) : $count");

        foreach ($sections as $section) {
            $sectionName = $section->getName();
            $this->io->text("  - $sectionName");
        }

        $this->io->success("Organisation(s) créé(s) - OrganisationsFixtures terminé");
    }

    public function getDependencies()
    {
        return [
            ActivityPlacesFixtures::class,
        ];
    }
}
