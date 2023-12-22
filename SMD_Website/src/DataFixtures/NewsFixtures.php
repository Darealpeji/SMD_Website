<?php

namespace App\DataFixtures;

use Faker\Factory;
use DateTimeImmutable;
use App\Entity\Article;
use Cocur\Slugify\Slugify;
use App\Entity\ArticleCategory;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Repository\ArticleCategoryRepository;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NewsFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    private $articleCategories;

    public function __construct(Slugify $slugify, ArticleCategoryRepository $articleCategories)
    {
        $this->slugify = $slugify;
        $this->articleCategories = $articleCategories;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entités "ArticleCategory" #####

        $evenement_category = new ArticleCategory();

        $evenement_category->setName("Evènement");
        $evenement_category->setCreatedAtValue();

        $manager->persist($evenement_category);

        $information_category = new ArticleCategory();

        $information_category->setName("Information");
        $information_category->setCreatedAtValue();

        $manager->persist($information_category);

        $concert_category = new ArticleCategory();

        $concert_category->setName("Concert");
        $concert_category->setCreatedAtValue();

        $manager->persist($concert_category);

        $manager->flush();

        ##### Entités "Article" #####

        $faker = Factory::create();

        $sections = $this->getReference(AssoSectionsFixtures::ASSOCIATION)->getSections();
        $categories = $this->articleCategories->findAll();

        // Actualités de l'Association

        for ($i = 0; $i < mt_rand(15, 20); $i++) {
            $article_association = new Article();

            $article_association->setTitle('Actualité ' . sprintf('%02d', $i + 1));
            $article_association->setSlug($this->slugify->slugify($article_association->getTitle()));
            $article_association->setAssociation($this->getReference(AssoSectionsFixtures::ASSOCIATION));
            $article_association->setContent($faker->paragraphs(mt_rand(3, 10), true));
            $article_association->setArticleCategory($faker->randomElement($categories));
            $createdAt = $faker->dateTimeBetween('-6 months', 'now', 'Europe/Paris');
            $createdAtImmutable = DateTimeImmutable::createFromMutable($createdAt);
            $article_association->setCreatedAt($createdAtImmutable);

            $manager->persist($article_association);
        }

        // Actualités des Sections
        
        foreach ($sections as $section) {
            
            for ($i = 0; $i < mt_rand(15, 20); $i++) {
                $article_section = new Article();

                $article_section->setTitle('Actualité ' . sprintf('%02d', $i + 1));
                $article_section->setSlug($this->slugify->slugify($article_section->getTitle()));
                $article_section->setSection($section);
                $article_section->setContent($faker->paragraphs(mt_rand(3, 10), true));
                $article_section->setArticleCategory($faker->randomElement($categories));
                $createdAt = $faker->dateTimeBetween('-6 months', 'now', 'Europe/Paris');
                $createdAtImmutable = DateTimeImmutable::createFromMutable($createdAt);
                $article_section->setCreatedAt($createdAtImmutable);

                $manager->persist($article_section);
            }
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
