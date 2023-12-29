<?php

namespace App\DataFixtures;

use App\Entity\Team;
use App\Entity\TeamCategory;
use Cocur\Slugify\Slugify;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TeamsFootballFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entités "TeamCategory" #####

        $football_seniors = new TeamCategory();

        $football_seniors->setName("Football - Séniors");
        $football_seniors->setTitle("Séniors");
        $football_seniors->setSlug($this->slugify->slugify($football_seniors->getTitle()));
        $football_seniors->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $football_seniors->setCreatedAtValue();

        $manager->persist($football_seniors);

        $football_u19 = new TeamCategory();

        $football_u19->setName("Football - U19");
        $football_u19->setTitle("U19");
        $football_u19->setSlug($this->slugify->slugify($football_u19->getTitle()));
        $football_u19->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $football_u19->setCreatedAtValue();

        $manager->persist($football_u19);

        $football_u17 = new TeamCategory();

        $football_u17->setName("Football - U17");
        $football_u17->setTitle("U17");
        $football_u17->setSlug($this->slugify->slugify($football_u17->getTitle()));
        $football_u17->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $football_u17->setCreatedAtValue();

        $manager->persist($football_u17);

        $football_u15 = new TeamCategory();

        $football_u15->setName("Football - U15");
        $football_u15->setTitle("U15");
        $football_u15->setSlug($this->slugify->slugify($football_u15->getTitle()));
        $football_u15->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $football_u15->setCreatedAtValue();

        $manager->persist($football_u15);

        $football_u13 = new TeamCategory();

        $football_u13->setName("Football - U13");
        $football_u13->setTitle("U13");
        $football_u13->setSlug($this->slugify->slugify($football_u13->getTitle()));
        $football_u13->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $football_u13->setCreatedAtValue();

        $manager->persist($football_u13);

        $football_u11 = new TeamCategory();

        $football_u11->setName("Football - U11");
        $football_u11->setTitle("U11");
        $football_u11->setSlug($this->slugify->slugify($football_u11->getTitle()));
        $football_u11->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $football_u11->setCreatedAtValue();

        $manager->persist($football_u11);

        $football_u9 = new TeamCategory();

        $football_u9->setName("Football - U9");
        $football_u9->setTitle("U9");
        $football_u9->setSlug($this->slugify->slugify($football_u9->getTitle()));
        $football_u9->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $football_u9->setCreatedAtValue();

        $manager->persist($football_u9);

        $football_u7 = new TeamCategory();

        $football_u7->setName("Football - U7");
        $football_u7->setTitle("U7");
        $football_u7->setSlug($this->slugify->slugify($football_u7->getTitle()));
        $football_u7->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $football_u7->setCreatedAtValue();

        $manager->persist($football_u7);

        $football_groupement_feminin = new TeamCategory();

        $football_groupement_feminin->setName("Football - Groupement Féminin");
        $football_groupement_feminin->setTitle("Groupement Féminin");
        $football_groupement_feminin->setSlug($this->slugify->slugify($football_groupement_feminin->getTitle()));
        $football_groupement_feminin->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $football_groupement_feminin->setCreatedAtValue();

        $manager->persist($football_groupement_feminin);

        $football_veterans = new TeamCategory();

        $football_veterans->setName("Football - Vétérans");
        $football_veterans->setTitle("Vétérans");
        $football_veterans->setSlug($this->slugify->slugify($football_veterans->getTitle()));
        $football_veterans->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $football_veterans->setCreatedAtValue();

        $manager->persist($football_veterans);

        $football_loisirs = new TeamCategory();

        $football_loisirs->setName("Football - Loisirs");
        $football_loisirs->setTitle("Loisirs");
        $football_loisirs->setSlug($this->slugify->slugify($football_loisirs->getTitle()));
        $football_loisirs->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $football_loisirs->setCreatedAtValue();

        $manager->persist($football_loisirs);

        $football_arbitres = new TeamCategory();

        $football_arbitres->setName("Football - Arbitres");
        $football_arbitres->setTitle("Arbitres");
        $football_arbitres->setSlug($this->slugify->slugify($football_arbitres->getTitle()));
        $football_arbitres->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $football_arbitres->setCreatedAtValue();

        $manager->persist($football_arbitres);

        $manager->flush();

        ##### Entités "Team" #####

        // Séniors

        $seniors_a = new Team();

        $seniors_a->setName("Séniors A");
        $seniors_a->setTeamCategory($football_seniors);
        $seniors_a->setCreatedAtValue();

        $manager->persist($seniors_a);

        $seniors_b = new Team();

        $seniors_b->setName("Séniors B");
        $seniors_b->setTeamCategory($football_seniors);
        $seniors_b->setCreatedAtValue();

        $manager->persist($seniors_b);

        $seniors_c = new Team();

        $seniors_c->setName("Séniors B");
        $seniors_c->setTeamCategory($football_seniors);
        $seniors_c->setCreatedAtValue();

        $manager->persist($seniors_c);

        // U19

        $u19 = new Team();

        $u19->setName("U19");
        $u19->setTeamCategory($football_u19);
        $u19->setCreatedAtValue();

        $manager->persist($u19);

        // U17

        $u17 = new Team();

        $u17->setName("U17");
        $u17->setTeamCategory($football_u17);
        $u17->setCreatedAtValue();

        $manager->persist($u17);

        // U15

        $u15 = new Team();

        $u15->setName("U15");
        $u15->setTeamCategory($football_u15);
        $u15->setCreatedAtValue();

        $manager->persist($u15);

        $u14 = new Team();

        $u14->setName("U14");
        $u14->setTeamCategory($football_u15);
        $u14->setCreatedAtValue();

        $manager->persist($u14);

        // U13

        $u13 = new Team();

        $u13->setName("U13");
        $u13->setTeamCategory($football_u13);
        $u13->setCreatedAtValue();

        $manager->persist($u13);

        // U11

        $u11 = new Team();

        $u11->setName("U11");
        $u11->setTeamCategory($football_u11);
        $u11->setCreatedAtValue();

        $manager->persist($u11);

        // U9

        $u9 = new Team();

        $u9->setName("U9");
        $u9->setTeamCategory($football_u9);
        $u9->setCreatedAtValue();

        $manager->persist($u9);

        // U7

        $u7 = new Team();

        $u7->setName("U7");
        $u7->setTeamCategory($football_u7);
        $u7->setCreatedAtValue();

        $manager->persist($u7);

        // Vétérans

        $veterans = new Team();

        $veterans->setName("Vétérans");
        $veterans->setTeamCategory($football_veterans);
        $veterans->setCreatedAtValue();

        $manager->persist($veterans);

        // Loisirs

        $loisirs = new Team();

        $loisirs->setName("Loisirs");
        $loisirs->setTeamCategory($football_loisirs);
        $loisirs->setCreatedAtValue();

        $manager->persist($loisirs);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
