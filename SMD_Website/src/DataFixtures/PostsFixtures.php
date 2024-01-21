<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\Member;
use App\Entity\Section;
use App\Entity\Association;
use App\DataFixtures\MembersFixtures;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\Constants\PostsConstants;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PostsFixtures extends Fixture implements DependentFixtureInterface
{
    private $io;

    public function __construct(SymfonyStyle $io)
    {
        $this->io = $io;
    }
    public function load(ObjectManager $manager)
    {
        foreach (PostsConstants::ORGANIZATIONS_POSTS as $organizationReference => $data) {
            $organization = $this->getReference($organizationReference);

            foreach ($data['hierarchicalGroup'] as $hierarchicalGroup => $postsData) {

                foreach ($postsData as $postData) {
                    $label = $postData['label'];
                    $ranking = $postData['ranking'];
                    $status = $postData['status'];
                    $members = $postData['members'];

                    $post = $this->createPost($manager, $label, $ranking, $hierarchicalGroup, $status, $members, $organization);

                    $this->setReference($post->getName(), $post);
                }
            }
        }

        $manager->flush();
        $this->dumpSummaryFixtures($manager);
    }

    private function createPost(ObjectManager $manager, $label, $ranking, $hierarchicalGroup, $status, $members, $organization)
    {
        $post = new Post();
        $post
            ->setName(sprintf('%s - %s', $organization->getName(), $label))
            ->setLabel($label)
            ->setRanking($ranking)
            ->setHierarchicalGroup($hierarchicalGroup)
            ->setStatus($status)
            ->setDescription("")
            ->setCreatedAtValue();

        $this->addPostToOrganization($post, $organization);

        foreach ($members as $member) {
            $memberReference = $this->getReference($member);
            $post->addMember($memberReference);
        }

        $manager->persist($post);

        return $post;
    }

    private function addPostToOrganization($post, $organization)
    {
        if ($organization instanceof Association) {
            $post->setAssociation($organization);
        } else {
            $post->setSection($organization);
        }
    }

    private function dumpSummaryFixtures(ObjectManager $manager)
    {
        $associationRepository = $manager->getRepository(Association::class);
        $sectionRepository = $manager->getRepository(Section::class);
        $postRepository = $manager->getRepository(Post::class);

        $this->io->newLine();
        $this->dumpPostsData($this->io, $associationRepository, $postRepository);
        $this->dumpPostsData($this->io, $sectionRepository, $postRepository);

        $this->io->success("Poste(s) créé(s) - PostsFixtures terminé");
    }

    private function dumpPostsData($io, $organizationsRepository, $postRepository)
    {
        $organizations = $organizationsRepository->findAll();

        foreach ($organizations as $organization) {
            $organizationName = $organization->getName();

            $io->title("$organizationName : ");

            if ($organization instanceof Association) {
                $postResult = $postRepository->getPostCountByHierarchicalGroupByAssociation($organization);
            } else {
                $postResult = $postRepository->getPostCountByHierarchicalGroupBySection($organization);
            }

            foreach ($postResult as $result) {
                $hierarchyName = $result['hierarchy'];
                $postCount = $result['postsCount'];
                $membersCount = $result['membersCount'];

                $io->text("- $hierarchyName : " . $postCount . " postes créé(s) : " . $membersCount . " membre(s) affecté(s)");
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
