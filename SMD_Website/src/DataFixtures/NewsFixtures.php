<?php

namespace App\DataFixtures;

use Faker\Factory;
use DateTimeImmutable;
use App\Entity\Article;
use App\Entity\Section;
use Cocur\Slugify\Slugify;
use App\Entity\Association;
use App\Entity\ArticleCategory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Repository\ArticleCategoryRepository;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\DataFixtures\Constants\OrganizationsConstants;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NewsFixtures extends Fixture implements DependentFixtureInterface
{
    private const CATEGORIES = [
        "Événement",
        "Information",
        "Concert",
    ];

    private const ARTICLE_COUNT_RANGE = [15, 20];

    private \Cocur\Slugify\Slugify $slugify;

    private \App\Repository\ArticleCategoryRepository $articleCategories;

    private \Symfony\Component\Console\Style\SymfonyStyle $io;

    public function __construct(Slugify $slugify, ArticleCategoryRepository $articleCategories, SymfonyStyle $io)
    {
        $this->slugify = $slugify;
        $this->articleCategories = $articleCategories;
        $this->io = $io;
    }

    public function load(ObjectManager $manager): void
    {
        $this->loadArticleCategories($manager);
        $manager->flush();

        $association = $this->getReference(OrganizationsConstants::ASSOCIATION);
        $this->loadArticles($manager, $association, self::ARTICLE_COUNT_RANGE);

        foreach (OrganizationsConstants::getSections() as $section) {
            $sectionEntity = $this->getReference($section);
            $this->loadArticles($manager, $sectionEntity, self::ARTICLE_COUNT_RANGE);
        }

        $manager->flush();

        $this->dumpSummaryFixtures($manager);
    }

    private function loadArticleCategories(ObjectManager $manager): int
    {
        $articleCategoryCount = 0;

        foreach (self::CATEGORIES as $categoryName) {
            $category = new ArticleCategory();
            $category->setName($categoryName);
            $category->setCreatedAtValue();
            $manager->persist($category);

            $articleCategoryCount++;
        }

        return $articleCategoryCount;
    }

    private function loadArticles(ObjectManager $manager, $entity, $countRange): int
    {
        $faker = Factory::create();
        $categories = $this->articleCategories->findAll();

        $articleCount = mt_rand($countRange[0], $countRange[1]);

        for ($i = 0; $i < $articleCount; $i++) {
            $article = new Article();
            $article->setTitle('Actualité ' . sprintf('%02d', $i + 1));
            $article->setSlug($this->slugify->slugify($article->getTitle()));

            if ($entity instanceof Association) {
                $article->setAssociation($entity);
            } elseif ($entity instanceof Section) {
                $article->setSection($entity);
            }

            $article->setContent($faker->paragraphs(mt_rand(3, 10), true));
            $article->setArticleCategory($faker->randomElement($categories));
            $createdAt = $faker->dateTimeBetween('-6 months', 'now', 'Europe/Paris');
            $createdAtImmutable = DateTimeImmutable::createFromMutable($createdAt);
            $article->setCreatedAt($createdAtImmutable);

            $manager->persist($article);
        }

        return $articleCount;
    }

    private function dumpSummaryFixtures(ObjectManager $manager)
    {
        $categoryRepository = $manager->getRepository(ArticleCategory::class);
        $categories = $categoryRepository->findAll();

        $associationRepository = $manager->getRepository(Association::class);
        $association = $associationRepository->findAll();

        $sectionRepository = $manager->getRepository(Section::class);
        $sections = $sectionRepository->findAll();

        $countCategories = count($categories);

        $this->io->title("Catégorie(s) d'Article créée(s) : $countCategories");

        $this->io->title("Nombre  d'Article(s) créé(s) par Organisations : ");

        $this->dumpNewsData($this->io, $associationRepository);
        $this->dumpNewsData($this->io, $sectionRepository);

        $this->io->success("Catégorie(s) d'Article et Article(s) créé(s) - NewsFixtures terminé");
    }

    private function dumpNewsData($io, $repository)
    {
        $organizations = $repository->findAll();

        foreach ($organizations as $organization) {
            $organizationName = $organization->getName();
            $count = count($organization->getArticles());
            $io->text("- $organizationName : " . $count);
        }
    }

    public function getDependencies()
    {
        return [
            OrganizationsFixtures::class,
        ];
    }
}
