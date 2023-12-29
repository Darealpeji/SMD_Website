<?php

namespace App\DataFixtures;

use App\Entity\Team;
use App\Entity\TeamCategory;
use Cocur\Slugify\Slugify;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TeamsBasketFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entités "TeamCategory" #####

        $basket_seniors = new TeamCategory();

        $basket_seniors->setName("Basket - Séniors");
        $basket_seniors->setTitle("Séniors");
        $basket_seniors->setSlug($this->slugify->slugify($basket_seniors->getTitle()));
        $basket_seniors->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $basket_seniors->setCreatedAtValue();

        $manager->persist($basket_seniors);

        $basket_u20 = new TeamCategory();

        $basket_u20->setName("Basket - U20");
        $basket_u20->setTitle("U20");
        $basket_u20->setSlug($this->slugify->slugify($basket_u20->getTitle()));
        $basket_u20->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $basket_u20->setCreatedAtValue();

        $manager->persist($basket_u20);

        $basket_u18 = new TeamCategory();

        $basket_u18->setName("Basket - U18");
        $basket_u18->setTitle("U18");
        $basket_u18->setSlug($this->slugify->slugify($basket_u18->getTitle()));
        $basket_u18->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $basket_u18->setCreatedAtValue();

        $manager->persist($basket_u18);

        $basket_u17 = new TeamCategory();

        $basket_u17->setName("Basket - U17");
        $basket_u17->setTitle("U17");
        $basket_u17->setSlug($this->slugify->slugify($basket_u17->getTitle()));
        $basket_u17->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $basket_u17->setCreatedAtValue();

        $manager->persist($basket_u17);

        $basket_u15 = new TeamCategory();

        $basket_u15->setName("Basket - U15");
        $basket_u15->setTitle("U15");
        $basket_u15->setSlug($this->slugify->slugify($basket_u15->getTitle()));
        $basket_u15->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $basket_u15->setCreatedAtValue();

        $manager->persist($basket_u15);

        $basket_u13 = new TeamCategory();

        $basket_u13->setName("Basket - U13");
        $basket_u13->setTitle("U13");
        $basket_u13->setSlug($this->slugify->slugify($basket_u13->getTitle()));
        $basket_u13->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $basket_u13->setCreatedAtValue();

        $manager->persist($basket_u13);

        $basket_u11 = new TeamCategory();

        $basket_u11->setName("Basket - U11");
        $basket_u11->setTitle("U11");
        $basket_u11->setSlug($this->slugify->slugify($basket_u11->getTitle()));
        $basket_u11->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $basket_u11->setCreatedAtValue();

        $manager->persist($basket_u11);

        $basket_u9 = new TeamCategory();

        $basket_u9->setName("Basket - U9");
        $basket_u9->setTitle("U9");
        $basket_u9->setSlug($this->slugify->slugify($basket_u9->getTitle()));
        $basket_u9->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $basket_u9->setCreatedAtValue();

        $manager->persist($basket_u9);

        $basket_u7 = new TeamCategory();

        $basket_u7->setName("Basket - U7");
        $basket_u7->setTitle("U7");
        $basket_u7->setSlug($this->slugify->slugify($basket_u7->getTitle()));
        $basket_u7->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $basket_u7->setCreatedAtValue();

        $manager->persist($basket_u7);

        $manager->flush();

        ##### Entités "Team" #####

        // Séniors

        $seniors_filles_1 = new Team();

        $seniors_filles_1->setName("Séniors Filles 1");
        $seniors_filles_1->setTeamCategory($basket_seniors);
        $seniors_filles_1->setCreatedAtValue();

        $manager->persist($seniors_filles_1);

        $seniors_filles_2 = new Team();

        $seniors_filles_2->setName("Séniors Filles 2");
        $seniors_filles_2->setTeamCategory($basket_seniors);
        $seniors_filles_2->setCreatedAtValue();

        $manager->persist($seniors_filles_2);

        $seniors_garcon_1 = new Team();

        $seniors_garcon_1->setName("Séniors Garçons 1");
        $seniors_garcon_1->setTeamCategory($basket_seniors);
        $seniors_garcon_1->setCreatedAtValue();

        $manager->persist($seniors_garcon_1);

        $seniors_garcon_2 = new Team();

        $seniors_garcon_2->setName("Séniors Garçons 2");
        $seniors_garcon_2->setTeamCategory($basket_seniors);
        $seniors_garcon_2->setCreatedAtValue();

        $manager->persist($seniors_garcon_2);

        $seniors_garcon_3 = new Team();

        $seniors_garcon_3->setName("Séniors Garçons 3");
        $seniors_garcon_3->setTeamCategory($basket_seniors);
        $seniors_garcon_3->setCreatedAtValue();

        $manager->persist($seniors_garcon_3);

        // U20

        $u20_garcon_1 = new Team();

        $u20_garcon_1->setName("U20 Garçons 1");
        $u20_garcon_1->setTeamCategory($basket_u20);
        $u20_garcon_1->setCreatedAtValue();

        $manager->persist($u20_garcon_1);

        // U18

        $u18_filles_1 = new Team();

        $u18_filles_1->setName("U18 Filles 1");
        $u18_filles_1->setTeamCategory($basket_u18);
        $u18_filles_1->setCreatedAtValue();

        $manager->persist($u18_filles_1);

        // U17

        $u17_garcon_1 = new Team();

        $u17_garcon_1->setName("U17 Garçons 1");
        $u17_garcon_1->setTeamCategory($basket_u17);
        $u17_garcon_1->setCreatedAtValue();

        $manager->persist($u17_garcon_1);

        $u17_garcon_2 = new Team();

        $u17_garcon_2->setName("U17 Garçons 2");
        $u17_garcon_2->setTeamCategory($basket_u17);
        $u17_garcon_2->setCreatedAtValue();

        $manager->persist($u17_garcon_2);

        // U15

        $u15_filles_1 = new Team();

        $u15_filles_1->setName("U15 Filles 1");
        $u15_filles_1->setTeamCategory($basket_u15);
        $u15_filles_1->setCreatedAtValue();

        $manager->persist($u15_filles_1);

        $u15_garcon_1 = new Team();

        $u15_garcon_1->setName("U15 Garçons 1");
        $u15_garcon_1->setTeamCategory($basket_u15);
        $u15_garcon_1->setCreatedAtValue();

        $manager->persist($u15_garcon_1);

        // U13

        $u13_filles_1 = new Team();

        $u13_filles_1->setName("U13 Filles 1");
        $u13_filles_1->setTeamCategory($basket_u13);
        $u13_filles_1->setCreatedAtValue();

        $manager->persist($u13_filles_1);

        $u13_filles_2 = new Team();

        $u13_filles_2->setName("U13 Filles 2");
        $u13_filles_2->setTeamCategory($basket_u13);
        $u13_filles_2->setCreatedAtValue();

        $manager->persist($u13_filles_2);

        $u13_garcon_1 = new Team();

        $u13_garcon_1->setName("U13 Garçons 1");
        $u13_garcon_1->setTeamCategory($basket_u13);
        $u13_garcon_1->setCreatedAtValue();

        $manager->persist($u13_garcon_1);

        $u13_garcon_2 = new Team();

        $u13_garcon_2->setName("U13 Garçons 2");
        $u13_garcon_2->setTeamCategory($basket_u13);
        $u13_garcon_2->setCreatedAtValue();

        $manager->persist($u13_garcon_2);

        $u13_garcon_3 = new Team();

        $u13_garcon_3->setName("U13 Garçons 3");
        $u13_garcon_3->setTeamCategory($basket_u13);
        $u13_garcon_3->setCreatedAtValue();

        $manager->persist($u13_garcon_3);

        // U11

        $u11_filles_1 = new Team();

        $u11_filles_1->setName("U11 Filles 1");
        $u11_filles_1->setTeamCategory($basket_u11);
        $u11_filles_1->setCreatedAtValue();

        $manager->persist($u11_filles_1);

        $u11_filles_2 = new Team();

        $u11_filles_2->setName("U11 Filles 2");
        $u11_filles_2->setTeamCategory($basket_u11);
        $u11_filles_2->setCreatedAtValue();

        $manager->persist($u11_filles_2);

        $u11_garcon_1 = new Team();

        $u11_garcon_1->setName("U11 Garçons 1");
        $u11_garcon_1->setTeamCategory($basket_u11);
        $u11_garcon_1->setCreatedAtValue();

        $manager->persist($u11_garcon_1);

        $u11_garcon_2 = new Team();

        $u11_garcon_2->setName("U11 Garçons 2");
        $u11_garcon_2->setTeamCategory($basket_u11);
        $u11_garcon_2->setCreatedAtValue();

        $manager->persist($u11_garcon_2);

        // U9

        $u9_filles = new Team();

        $u9_filles->setName("U9 Filles");
        $u9_filles->setTeamCategory($basket_u9);
        $u9_filles->setCreatedAtValue();

        $manager->persist($u9_filles);

        $u9_garcon = new Team();

        $u9_garcon->setName("U9 Garçons");
        $u9_garcon->setTeamCategory($basket_u9);
        $u9_garcon->setCreatedAtValue();

        $manager->persist($u9_garcon);

        // U7

        $u7_mixte_1 = new Team();

        $u7_mixte_1->setName("U7 Mixte");
        $u7_mixte_1->setTeamCategory($basket_u7);
        $u7_mixte_1->setCreatedAtValue();

        $manager->persist($u7_mixte_1);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
