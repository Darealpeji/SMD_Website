<?php

namespace App\DataFixtures;

use App\Entity\Team;
use App\Entity\TeamCategory;
use Cocur\Slugify\Slugify;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TeamsTennisDeTableFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entités "TeamCategory" #####

        $tennis_de_table_nationale = new TeamCategory();

        $tennis_de_table_nationale->setName("Tennis de Table - Nationale");
        $tennis_de_table_nationale->setTitle("Nationale");
        $tennis_de_table_nationale->setSlug($this->slugify->slugify($tennis_de_table_nationale->getTitle()));
        $tennis_de_table_nationale->setSection($this->getReference(AssoSectionsFixtures::TENNIS_DE_TABLE));
        $tennis_de_table_nationale->setCreatedAtValue();

        $manager->persist($tennis_de_table_nationale);

        $tennis_de_table_regionale = new TeamCategory();

        $tennis_de_table_regionale->setName("Tennis de Table - Régionale");
        $tennis_de_table_regionale->setTitle("Régionale");
        $tennis_de_table_regionale->setSlug($this->slugify->slugify($tennis_de_table_regionale->getTitle()));
        $tennis_de_table_regionale->setSection($this->getReference(AssoSectionsFixtures::TENNIS_DE_TABLE));
        $tennis_de_table_regionale->setCreatedAtValue();

        $manager->persist($tennis_de_table_regionale);

        $tennis_de_table_departementale = new TeamCategory();

        $tennis_de_table_departementale->setName("Tennis de Table - Départementale");
        $tennis_de_table_departementale->setTitle("Départementale");
        $tennis_de_table_departementale->setSlug($this->slugify->slugify($tennis_de_table_departementale->getTitle()));
        $tennis_de_table_departementale->setSection($this->getReference(AssoSectionsFixtures::TENNIS_DE_TABLE));
        $tennis_de_table_departementale->setCreatedAtValue();

        $manager->persist($tennis_de_table_departementale);

        $tennis_de_table_jeunes = new TeamCategory();

        $tennis_de_table_jeunes->setName("Tennis de Table - Jeunes");
        $tennis_de_table_jeunes->setTitle("Jeunes");
        $tennis_de_table_jeunes->setSlug($this->slugify->slugify($tennis_de_table_jeunes->getTitle()));
        $tennis_de_table_jeunes->setSection($this->getReference(AssoSectionsFixtures::TENNIS_DE_TABLE));
        $tennis_de_table_jeunes->setCreatedAtValue();

        $manager->persist($tennis_de_table_jeunes);

        $manager->flush();

        ##### Entités "Team" #####

        // Nationale 2

        $nationale_2_garcons = new Team();

        $nationale_2_garcons->setName("Nationale 2 Garçons");
        $nationale_2_garcons->setTeamCategory($tennis_de_table_nationale);
        $nationale_2_garcons->setCreatedAtValue();

        $manager->persist($nationale_2_garcons);

        $nationale_3_filles = new Team();

        $nationale_3_filles->setName("Nationale 3 Filles");
        $nationale_3_filles->setTeamCategory($tennis_de_table_nationale);
        $nationale_3_filles->setCreatedAtValue();

        $manager->persist($nationale_3_filles);

        $nationale_3_garcons = new Team();

        $nationale_3_garcons->setName("Nationale 3 Garçons");
        $nationale_3_garcons->setTeamCategory($tennis_de_table_nationale);
        $nationale_3_garcons->setCreatedAtValue();

        $manager->persist($nationale_3_garcons);

        $pre_nationale_garcons = new Team();

        $pre_nationale_garcons->setName("Pré Nationale Garçons");
        $pre_nationale_garcons->setTeamCategory($tennis_de_table_nationale);
        $pre_nationale_garcons->setCreatedAtValue();

        $manager->persist($pre_nationale_garcons);

        // Régionale

        $regionale_1_garcons = new Team();

        $regionale_1_garcons->setName("Régionale 1 Garçons");
        $regionale_1_garcons->setTeamCategory($tennis_de_table_regionale);
        $regionale_1_garcons->setCreatedAtValue();

        $manager->persist($regionale_1_garcons);

        $regionale_3_garcons = new Team();

        $regionale_3_garcons->setName("Régionale 3 Garçons");
        $regionale_3_garcons->setTeamCategory($tennis_de_table_regionale);
        $regionale_3_garcons->setCreatedAtValue();

        $manager->persist($regionale_3_garcons);

        $pre_nationale_filles = new Team();

        $pre_nationale_filles->setName("Pré Régionale Filles");
        $pre_nationale_filles->setTeamCategory($tennis_de_table_regionale);
        $pre_nationale_filles->setCreatedAtValue();

        $manager->persist($pre_nationale_filles);

        // Départementale

        $departementale_0 = new Team();

        $departementale_0->setName("Départementale 0");
        $departementale_0->setTeamCategory($tennis_de_table_departementale);
        $departementale_0->setCreatedAtValue();

        $manager->persist($departementale_0);

        $departementale_1 = new Team();

        $departementale_1->setName("Départementale 1");
        $departementale_1->setTeamCategory($tennis_de_table_departementale);
        $departementale_1->setCreatedAtValue();

        $manager->persist($departementale_1);

        $departementale_2 = new Team();

        $departementale_2->setName("Départementale 2");
        $departementale_2->setTeamCategory($tennis_de_table_departementale);
        $departementale_2->setCreatedAtValue();

        $manager->persist($departementale_2);

        $departementale_4 = new Team();

        $departementale_4->setName("Départementale 4");
        $departementale_4->setTeamCategory($tennis_de_table_departementale);
        $departementale_4->setCreatedAtValue();

        $manager->persist($departementale_4);

        // Jeunes

        $jeunes_1 = new Team();

        $jeunes_1->setName("Jeunes 1");
        $jeunes_1->setTeamCategory($tennis_de_table_jeunes);
        $jeunes_1->setCreatedAtValue();

        $manager->persist($jeunes_1);

        $jeunes_2 = new Team();

        $jeunes_2->setName("Jeunes 2");
        $jeunes_2->setTeamCategory($tennis_de_table_jeunes);
        $jeunes_2->setCreatedAtValue();

        $manager->persist($jeunes_2);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
