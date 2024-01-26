<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\Section;
use App\Entity\Association;
use App\Entity\PostTeamCategory;
use App\Entity\PostChartCategory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\Constants\PostsConstants;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\DataFixtures\Constants\PostCategoriesConstants;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PostsFixtures extends Fixture implements DependentFixtureInterface
{
    private \Symfony\Component\Console\Style\SymfonyStyle $io;

    public function __construct(SymfonyStyle $io)
    {
        $this->io = $io;
    }

    public function load(ObjectManager $manager)
    {
        foreach (PostCategoriesConstants::ORGANIZATION_CHART as $postChartCategoryReference => $data) {
            $chartCategory = new PostChartCategory();
            $chartCategory
                ->setName($data['name'])
                ->setLabel($data['label'])
                ->setRanking($data['ranking'])
                ->setCreatedAtValue();

            $manager->persist($chartCategory);
            $this->setReference($postChartCategoryReference, $chartCategory);
        }

        foreach (PostCategoriesConstants::POST_TEAM_CATEGORIES as $postTeamCategoryReference => $data) {
            $postTeamCategory = new PostTeamCategory();
            $postTeamCategory
                ->setName($data['name'])
                ->setlabelPlural($data['labelPlural'])
                ->setlabelSingular($data['labelSingular'])
                ->setCreatedAtValue();

            $manager->persist($postTeamCategory);
            $this->setReference($postTeamCategoryReference, $postTeamCategory);
        }

        $manager->flush();

        foreach (PostsConstants::ORGANIZATIONS_ORGANIZATION_CHART as $organizationReference => $postChartCategories) {
            $organization = $this->getReference($organizationReference);

            foreach ($postChartCategories as $postChartCategoryReference => $postsData) {
                $chartCategory = $this->getReference($postChartCategoryReference);

                $this->addCategoryToOrganization($manager, $chartCategory, $organization);

                foreach ($postsData as $postData) {
                    $label = $postData['label'];
                    $ranking = $postData['ranking'];
                    $status = $postData['status'];
                    $members = $postData['members'];

                    $post = $this->createPost($manager, $label, $ranking, $status, $members, $organization);

                    $this->addPostToCategory($manager, $chartCategory, $post);

                    $this->setReference($post->getName(), $post);
                }
            }
        }

        foreach (PostsConstants::ORGANIZATIONS_POST_TECHNIQUE_CATEGORIES as $organizationReference => $postTeamCategories) {
            $organization = $this->getReference($organizationReference);

            foreach ($postTeamCategories as $postTeamCategoryReference => $postsData) {
                $postTeamCategory = $this->getReference($postTeamCategoryReference);

                $this->addCategoryToOrganization($manager, $postTeamCategory, $organization);

                foreach ($postsData as $postData) {
                    $label = $postData['label'];
                    $ranking = $postData['ranking'];
                    $status = $postData['status'];
                    $members = $postData['members'];

                    $post = $this->createPost($manager, $label, $ranking, $status, $members, $organization);

                    $this->addPostToCategory($manager, $postTeamCategory, $post);

                    $this->setReference($post->getName(), $post);
                }
            }
        }

        $manager->flush();
        $this->dumpSummaryFixtures($manager);
    }

    private function createPost(ObjectManager $manager, $label, $ranking, $status, $members, $organization)
    {
        $post = new Post();
        $post
            ->setName(sprintf('%s - %s', $organization->getName(), $label))
            ->setLabel($label)
            ->setRanking($ranking)
            ->setStatus($status)
            ->setDescription("")
            ->setCreatedAtValue();

        foreach ($members as $member) {
            $memberReference = $this->getReference($member);
            $post->addMember($memberReference);
        }

        $manager->persist($post);

        return $post;
    }

    private function addCategoryToOrganization(ObjectManager $manager, $category, $organization)
    {
        if ($organization instanceof Association) {
            $category->setAssociation($organization);
        } else {
            $category->addSection($organization);
        }

        $manager->persist($category);
    }

    private function addPostToCategory(ObjectManager $manager, $category, $post)
    {
        if ($category instanceof PostChartCategory) {
            $post->setPostChartCategory($category);
        } elseif ($category instanceof PostTeamCategory) {
            $post->setPostTeamCategory($category);
        }

        $manager->persist($post);
    }

    private function dumpSummaryFixtures(ObjectManager $manager)
    {
        $associationRepository = $manager->getRepository(Association::class);
        $sectionRepository = $manager->getRepository(Section::class);
        $postChartCategoryRepository = $manager->getRepository(PostChartCategory::class);
        $postTeamCategoryRepository = $manager->getRepository(PostTeamCategory::class);

        $this->io->newLine();
        $this->dumpPostsData($this->io, $associationRepository, $postChartCategoryRepository, $postTeamCategoryRepository);
        $this->dumpPostsData($this->io, $sectionRepository, $postChartCategoryRepository, $postTeamCategoryRepository);

        $this->io->success("Poste(s) créé(s) - PostsFixtures terminé");
    }

    private function dumpPostsData($io, $organizationsRepository, $postChartCategoryRepository, $postTeamCategoryRepository)
    {
        $organizations = $organizationsRepository->findAll();

        foreach ($organizations as $organization) {
            $organizationName = $organization->getName();

            $io->title("$organizationName : ");

            if ($organization instanceof Association) {
                $postChartCategoriesResult = $postChartCategoryRepository->getPostCountByChartCategoriesByAssociation($organization);
            } else {
                $postChartCategoriesResult = $postChartCategoryRepository->getPostCountByChartCategoriesBySection($organization);
            }

            foreach ($postChartCategoriesResult as $result) {
                $postChartCategoryName = $result['postChartCategoryName'];
                $postCount = $result['postsCount'];
                $membersCount = $result['membersCount'];

                if (! empty($postChartCategoryName)) {
                    $io->text("- $postChartCategoryName : " . $postCount . " postes créé(s) : " . $membersCount . " membre(s) affecté(s)");
                }
            }

            if ($organization instanceof Section) {
                $postTeamCategoriesResult = $postTeamCategoryRepository->getPostCountByTeamCategoriesBySection($organization);

                foreach ($postTeamCategoriesResult as $result) {
                    $postTeamCategoryName = $result['postTeamCategoryName'];
                    $postCount = $result['postsCount'];
                    $membersCount = $result['membersCount'];

                    if (! empty($postTeamCategoryName)) {
                        $io->text("- $postTeamCategoryName : " . $postCount . " postes créé(s) : " . $membersCount . " membre(s) affecté(s)");
                    }
                }
            }
        }
    }

    public function getDependencies()
    {
        return [
            OrganizationsFixtures::class,
            MembersFixtures::class,
        ];
    }
}
