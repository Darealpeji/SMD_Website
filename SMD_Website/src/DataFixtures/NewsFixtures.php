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
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Repository\ArticleCategoryRepository;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NewsFixtures extends Fixture implements DependentFixtureInterface
{
    private const CATEGORIES = [
        "Evènement",
        "Information",
        "Concert",
    ];

    private const ARTICLE_COUNT_RANGE = [15, 20];

    private $slugify;
    private $articleCategories;

    public function __construct(Slugify $slugify, ArticleCategoryRepository $articleCategories)
    {
        $this->slugify = $slugify;
        $this->articleCategories = $articleCategories;
    }

    public function load(ObjectManager $manager): void
    {
        $articleCategoryCount = $this->loadArticleCategories($manager);
        echo sprintf("Nombre de catégories d'article créées : %d\n", $articleCategoryCount);
        $manager->flush();

        $association = $this->getReference(AssoSectionsFixtures::ASSOCIATION);
        $associationArticleCount = $this->loadArticles($manager, $association, self::ARTICLE_COUNT_RANGE);

        echo sprintf("Nombre d'articles liés à l'Association : %d\n", $associationArticleCount);

        foreach ($this->getSectionReferences() as $section) {
            $sectionEntity = $this->getReference($section);
            $sectionArticleCount = $this->loadArticles($manager, $sectionEntity, self::ARTICLE_COUNT_RANGE);

            echo sprintf("Nombre d'articles liés à la %s : %d\n", $sectionEntity->getName(), $sectionArticleCount);
        }

        $manager->flush();
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

    private function getSectionReferences(): array
    {
        return [
            AssoSectionsFixtures::BASKET,
            AssoSectionsFixtures::CHORALE,
            AssoSectionsFixtures::DANSE,
            AssoSectionsFixtures::FOOTBALL,
            AssoSectionsFixtures::GYM_SPORTIVE,
            AssoSectionsFixtures::GYM_TONIQUE,
            AssoSectionsFixtures::LOISIRS,
            AssoSectionsFixtures::PETANQUE,
            AssoSectionsFixtures::TENNIS_DE_TABLE,
        ];
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
