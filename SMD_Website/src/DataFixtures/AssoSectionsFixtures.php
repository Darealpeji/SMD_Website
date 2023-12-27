<?php

namespace App\DataFixtures;

use App\Entity\Section;
use Cocur\Slugify\Slugify;
use App\Entity\Association;
use Doctrine\Persistence\ObjectManager;
use App\Repository\AssociationRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\ActivityPlacesFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AssoSectionsFixtures extends Fixture implements DependentFixtureInterface
{
    public const ASSOCIATION = 'association';
    public const BASKET = 'basket';
    public const CHORALE = 'chorale';
    public const DANSE = 'danse';
    public const FOOTBALL = 'football';
    public const GYM_SPORTIVE = 'gym_sportive';
    public const GYM_TONIQUE = 'gym_tonique';
    public const LOISIRS = 'loisirs';
    public const PETANQUE = 'petanque';
    public const TENNIS_DE_TABLE = 'tennis-de-table';
    private $associationRepository;
    private $slugify;

    public function __construct(AssociationRepository $associationRepository, Slugify $slugify)
    {
        $this->associationRepository = $associationRepository;
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entité "Association" #####

        $association = new Association();

        $association->setName("ASC Saint Médard de Doulon - Nantes");
        $association->setMotto("Un lieu unique pour toute la famille");
        $association->setAdress("72 rue du pontereau");
        $association->setPostalCode("44300");
        $association->setcity("Nantes");
        $association->setPhone("0981393509");
        $association->setMail("accueil@saintmedard-nantes.fr");
        $association->addActivityPlace($this->getReference(ActivityPlacesFixtures::STADE_RENE_CHEVALIER));
        $association->addActivityPlace($this->getReference(ActivityPlacesFixtures::PLAINE_JEUX_AUDUBON));
        $association->addActivityPlace($this->getReference(ActivityPlacesFixtures::TERRAIN_LOUETTRIE));
        $association->addActivityPlace($this->getReference(ActivityPlacesFixtures::GYMNASE_DOULON));
        $association->setCreatedAtValue();

        $manager->persist($association);
        $manager->flush();

        ##### Entités "Section" #####

        // "Section Basket"
        $basket = new Section();

        $basket->setName("Section Basket");
        $basket->setMotto("");
        $basket->setAdress("72 Rue du Pontereau");
        $basket->setPostalCode("44300");
        $basket->setcity("Nantes");
        $basket->setPhone("0681588985");
        $basket->setMail("basket@saintmedard-nantes.fr");
        $basket->setSlug($this->slugify->slugify($basket->getName()));
        $basket->setScoreNCoCode("");
        $basket->setAssociation($association);
        $basket->addActivityPlace($this->getReference(ActivityPlacesFixtures::GYMNASE_DOULON));
        $basket->addActivityPlace($this->getReference(ActivityPlacesFixtures::GYMNASE_TOUTES_AIDES));
        $basket->addActivityPlace($this->getReference(ActivityPlacesFixtures::GYMNASE_COLINIERE));
        $basket->addActivityPlace($this->getReference(ActivityPlacesFixtures::GYMNASE_RAPHAEL_LEBEL));
        $basket->addActivityPlace($this->getReference(ActivityPlacesFixtures::GYMNASE_CIFAM));
        $basket->setCreatedAtValue();

        $manager->persist($basket);

        // "Section Chorale"
        $chorale = new Section();

        $chorale->setName("Section Chorale");
        $chorale->setMotto("A Portée de Voix");
        $chorale->setAdress("72 Rue du Pontereau");
        $chorale->setPostalCode("44300");
        $chorale->setcity("Nantes");
        $chorale->setPhone("0683286018");
        $chorale->setMail("chorale@saintmedard-nantes.fr");
        $chorale->setSlug($this->slugify->slugify($chorale->getName()));
        $chorale->setScoreNCoCode("");
        $chorale->setAssociation($association);
        $chorale->addActivityPlace($this->getReference(ActivityPlacesFixtures::SALLE_ETIENNE_LANDAIS));
        $chorale->setCreatedAtValue();

        $manager->persist($chorale);

        // "Section Danse"
        $danse = new Section();

        $danse->setName("Section Danse");
        $danse->setMotto("");
        $danse->setAdress("72 Rue du Pontereau");
        $danse->setPostalCode("44300");
        $danse->setcity("Nantes");
        $danse->setPhone("0643827046");
        $danse->setMail("danse@saintmedard-nantes.fr");
        $danse->setSlug($this->slugify->slugify($danse->getName()));
        $danse->setScoreNCoCode("");
        $danse->setAssociation($association);
        $danse->addActivityPlace($this->getReference(ActivityPlacesFixtures::SALLE_DANSE));
        $danse->setCreatedAtValue();

        $manager->persist($danse);

        // "Section Football"
        $football = new Section();

        $football->setName("Section Football");
        $football->setMotto("Plaisir, Convivialité et Formation");
        $football->setAdress("72 Rue du Pontereau");
        $football->setPostalCode("44300");
        $football->setcity("Nantes");
        $football->setPhone("0240493177");
        $football->setMail("football@saintmedard-nantes.fr");
        $football->setSlug($this->slugify->slugify($football->getName()));
        $football->setScoreNCoCode("");
        $football->setAssociation($association);
        $football->addActivityPlace($this->getReference(ActivityPlacesFixtures::PLAINE_JEUX_AUDUBON));
        $football->setCreatedAtValue();

        $manager->persist($football);

        // "Section Gym Sportive"
        $gym_sportive = new Section();

        $gym_sportive->setName("Section Gym Sportive");
        $gym_sportive->setMotto("");
        $gym_sportive->setAdress("72 Rue du Pontereau");
        $gym_sportive->setPostalCode("44300");
        $gym_sportive->setcity("Nantes");
        $gym_sportive->setPhone("0681314457");
        $gym_sportive->setMail("gym-sportive@saintmedard-nantes.fr");
        $gym_sportive->setSlug($this->slugify->slugify($gym_sportive->getName()));
        $gym_sportive->setScoreNCoCode("");
        $gym_sportive->setAssociation($association);
        $gym_sportive->addActivityPlace($this->getReference(ActivityPlacesFixtures::SALLE_HENRI_LOIRET));
        $gym_sportive->setCreatedAtValue();

        $manager->persist($gym_sportive);

        // "Section Gym Tonique Pilates Yoga"
        $gym_tonique = new Section();

        $gym_tonique->setName("Section Gym Tonique Pilates Yoga");
        $gym_tonique->setMotto("");
        $gym_tonique->setAdress("72 Rue du Pontereau");
        $gym_tonique->setPostalCode("44300");
        $gym_tonique->setcity("Nantes");
        $gym_tonique->setPhone("0663813495");
        $gym_tonique->setMail("gym-tonique@saintmedard-nantes.fr");
        $gym_tonique->setSlug($this->slugify->slugify($gym_tonique->getName()));
        $gym_tonique->setScoreNCoCode("");
        $gym_tonique->setAssociation($association);
        $gym_tonique->addActivityPlace($this->getReference(ActivityPlacesFixtures::SALLE_ETIENNE_LANDAIS));
        $gym_tonique->addActivityPlace($this->getReference(ActivityPlacesFixtures::GYMNASE_TOUTES_AIDES));
        $gym_tonique->addActivityPlace($this->getReference(ActivityPlacesFixtures::SALLE_DANSE));
        $gym_tonique->setCreatedAtValue();

        $manager->persist($gym_tonique);

        // "Section Loisirs"
        $loisirs = new Section();

        $loisirs->setName("Section Loisirs");
        $loisirs->setMotto("");
        $loisirs->setAdress("72 Rue du Pontereau");
        $loisirs->setPostalCode("44300");
        $loisirs->setcity("Nantes");
        $loisirs->setPhone("0616936391");
        $loisirs->setMail("loisirs@saintmedard-nantes.fr");
        $loisirs->setSlug($this->slugify->slugify($loisirs->getName()));
        $loisirs->setScoreNCoCode("");
        $loisirs->setAssociation($association);
        $loisirs->addActivityPlace($this->getReference(ActivityPlacesFixtures::SALLE_ETIENNE_LANDAIS));
        $loisirs->setCreatedAtValue();

        $manager->persist($loisirs);

        // "Section Pétanque"
        $petanque = new Section();

        $petanque->setName("Section Pétanque");
        $petanque->setMotto("");
        $petanque->setAdress("72 Rue du Pontereau");
        $petanque->setPostalCode("44300");
        $petanque->setcity("Nantes");
        $petanque->setPhone("0650478720");
        $petanque->setMail("petanque@saintmedard-nantes.fr");
        $petanque->setSlug($this->slugify->slugify($petanque->getName()));
        $petanque->setScoreNCoCode("");
        $petanque->setAssociation($association);
        $petanque->addActivityPlace($this->getReference(ActivityPlacesFixtures::TERRAIN_LOUETTRIE));
        $petanque->setCreatedAtValue();

        $manager->persist($petanque);

        // "Section Tennis de Table"
        $tennis_de_table = new Section();

        $tennis_de_table->setName("Section Tennis de Table");
        $tennis_de_table->setMotto("");
        $tennis_de_table->setAdress("72 Rue du Pontereau");
        $tennis_de_table->setPostalCode("44300");
        $tennis_de_table->setcity("Nantes");
        $tennis_de_table->setPhone("0611962890");
        $tennis_de_table->setMail("secretariattt@saintmedard-nantes.fr");
        $tennis_de_table->setSlug($this->slugify->slugify($tennis_de_table->getName()));
        $tennis_de_table->setScoreNCoCode("");
        $tennis_de_table->setAssociation($association);
        $tennis_de_table->addActivityPlace($this->getReference(ActivityPlacesFixtures::SALLE_ROGER_CORBARD));
        $tennis_de_table->setCreatedAtValue();

        $manager->persist($tennis_de_table);

        $manager->flush();

        $this->addReference(self::ASSOCIATION, $association);
        $this->addReference(self::BASKET, $basket);
        $this->addReference(self::CHORALE, $chorale);
        $this->addReference(self::DANSE, $danse);
        $this->addReference(self::FOOTBALL, $football);
        $this->addReference(self::GYM_SPORTIVE, $gym_sportive);
        $this->addReference(self::GYM_TONIQUE, $gym_tonique);
        $this->addReference(self::LOISIRS, $loisirs);
        $this->addReference(self::PETANQUE, $petanque);
        $this->addReference(self::TENNIS_DE_TABLE, $tennis_de_table);
    }

    public function getDependencies()
    {
        return [
            ActivityPlacesFixtures::class,
        ];
    }
}