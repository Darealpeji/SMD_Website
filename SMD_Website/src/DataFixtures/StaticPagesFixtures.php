<?php

namespace App\DataFixtures;

use App\Entity\Section;
use App\Entity\StaticPage;
use App\Entity\Association;
use App\Entity\StaticPageContent;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\DataFixtures\Constants\StaticPagesConstants;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class StaticPagesFixtures extends Fixture implements DependentFixtureInterface
{
    private \Doctrine\ORM\EntityManagerInterface $entityManager;

    private \Symfony\Component\Console\Style\SymfonyStyle $io;

    public function __construct(EntityManagerInterface $entityManager, SymfonyStyle $io)
    {
        $this->entityManager = $entityManager;
        $this->io = $io;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (StaticPagesConstants::ORGANIZATIONS as $organizations => $staticPagesData) {
            foreach ($staticPagesData as $staticPageData => $data) {
                $staticPage = new StaticPage();
                $staticPage
                    ->setName($data['name'])
                    ->setSlug($data['slug'])
                    ->setCreatedAtValue();

                $this->addToOrganization($staticPage, $organizations);

                $manager->persist($staticPage);

                $this->addReference($staticPage->getName(), $staticPage);
                $staticPageReference = $this->getReference($data['name']);

                $staticPageContents = $data['staticPageContents'];

                foreach ($staticPageContents as $staticPageContentData) {
                    $staticPageContent = new StaticPageContent();
                    $staticPageContent
                        ->setTitle($staticPageContentData['title'])
                        ->setContent($staticPageContentData['content'])
                        ->setStaticPage($staticPageReference)
                        ->setCreatedAtValue();

                    $manager->persist($staticPageContent);
                }
            }
        }
        $manager->flush();

        $this->dumpSummaryFixtures($manager, $this->io);
    }

    private function addToOrganization($staticPage, $organization)
    {
        $organizationReference = $this->getReference($organization);

        if ($organizationReference instanceof Association) {
            $staticPage->setAssociation($organizationReference);
        } else {
            $staticPage->setSection($organizationReference);
        }
    }

    private function dumpSummaryFixtures($manager, $io)
    {
        $associationRepository = $manager->getRepository(Association::class);
        $sectionRepository = $manager->getRepository(Section::class);
        $staticPageRepository = $manager->getRepository(StaticPage::class);

        $this->io->newLine();
        $this->dumpStaticPagesData($this->io, $associationRepository, $staticPageRepository);
        $this->dumpStaticPagesData($this->io, $sectionRepository, $staticPageRepository);

        $this->io->success("Pages Statique(s) créé(s) - StaticPagesFixtures terminé");
    }

    private function dumpStaticPagesData($io, $organizationsRepository, $staticPageRepository)
    {
        $organizations = $organizationsRepository->findAll();

        foreach ($organizations as $organization) {
            $organizationName = $organization->getName();

            $io->title("$organizationName : ");

            $staticPages = $organization->getStaticPages();

            foreach ($staticPages as $staticPage) {
                $staticPageName = $staticPage->getName();
                $staticPageContentsCount = $staticPage->getStaticPageContents()->count();

                $io->text("- $staticPageName : " . $staticPageContentsCount . " contenu(s) ajouté(s).");
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
