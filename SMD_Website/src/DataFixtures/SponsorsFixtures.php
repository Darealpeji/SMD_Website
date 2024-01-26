<?php

namespace App\DataFixtures;

use App\Entity\Section;
use App\Entity\Sponsor;
use App\Entity\Association;
use App\Entity\InstitutionalPartner;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\Constants\SponsorsConstants;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SponsorsFixtures extends Fixture implements DependentFixtureInterface
{
    private \Symfony\Component\Console\Style\SymfonyStyle $io;

    public function __construct(SymfonyStyle $io)
    {
        $this->io = $io;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadInstitutionalPartners($manager);
        $this->loadSponsors($manager);

        $manager->flush();

        $this->dumpSummaryFixtures($manager);
    }

    private function loadInstitutionalPartners(ObjectManager $manager)
    {
        foreach (SponsorsConstants::INSTITUTIONAL_PARTNERS as $institutionalPartnerData) {
            $this->createInstitutionalPartner($manager, $institutionalPartnerData['name'], $institutionalPartnerData['path'], $institutionalPartnerData['description'], $institutionalPartnerData['organizations']);
        }
    }

    private function loadSponsors(ObjectManager $manager)
    {
        foreach (SponsorsConstants::SPONSORS as $sponsorData) {
            $this->createSponsor($manager, $sponsorData['name'], $sponsorData['path'], $sponsorData['description'], $sponsorData['organizations']);
        }
    }

    private function createSponsor(ObjectManager $manager, $name, $path, $description, $organizations)
    {
        $sponsor = new Sponsor();
        $sponsor
            ->setName($name)
            ->setPath($path)
            ->setDescription($description)
            ->setCreatedAtValue();

        $this->addToOrganization($sponsor, $organizations);

        $manager->persist($sponsor);

        return $sponsor;
    }

    private function createInstitutionalPartner(ObjectManager $manager, $name, $path, $description, $organizations)
    {
        $institutionalPartner = new InstitutionalPartner();
        $institutionalPartner
            ->setName($name)
            ->setPath($path)
            ->setDescription($description)
            ->setCreatedAtValue();

        $this->addToOrganization($institutionalPartner, $organizations);

        $manager->persist($institutionalPartner);

        return $institutionalPartner;
    }

    private function addToOrganization($partner, $organizations)
    {
        foreach ($organizations as $organization) {
            $organizationReference = $this->getReference($organization);

            if ($organizationReference instanceof Association) {
                $partner->setAssociation($organizationReference);
            } else {
                $partner->addSection($organizationReference);
            }
        }
    }

    private function dumpSummaryFixtures(ObjectManager $manager)
    {
        $associationRepository = $manager->getRepository(Association::class);
        $sectionRepository = $manager->getRepository(Section::class);

        $this->io->newLine();
        $this->io->title("Création des Sponsors par Organisation :");
        $this->dumpSponsorsByOrganization($this->io, $associationRepository);
        $this->dumpSponsorsByOrganization($this->io, $sectionRepository);

        $this->io->success("Sponsor(s) créé(s) - SponsorsFixtures terminé");
    }

    private function dumpSponsorsByOrganization($io, $organizationRepository)
    {
        $organizations = $organizationRepository->findAll();

        foreach ($organizations as $organization) {
            $organizationName = $organization->getName();
            $institutionalPartnerCount = $organization->getInstitutionalPartners()->count();
            $sponsorCount = $organization->getSponsors()->count();

            if ($sponsorCount > 0) {
                $io->text("- $organizationName : " . $sponsorCount . " sponsor(s) et " . $institutionalPartnerCount . " partenaire(s) institutionnel(s) affecté(s).");
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
