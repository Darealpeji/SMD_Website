<?php

namespace App\DataFixtures;

use App\Entity\ActivityPlace;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ActivityPlacesFixtures extends Fixture
{
    public const STADE_RENE_CHEVALIER = 'Stade_Rene_Chevalier';
    public const PLAINE_JEUX_AUDUBON = 'Plaine_Jeux_Audubon';
    public const GYMNASE_DOULON = 'Gymnase_Doulon';
    public const TERRAIN_LOUETTRIE = 'Terrain_Louettrie';
    public const SALLE_ROGER_CORBARD = 'Salle_Roger_Corbard';
    public const SALLE_ETIENNE_LANDAIS = 'Salle_Etienne_Landais';
    public const SALLE_HENRI_LOIRET = 'Salle_Henri_Loiret';
    public const SALLE_DANSE = 'Salle_Danse';
    public const GYMNASE_TOUTES_AIDES = 'Gymnase_Toutes_Aides';
    public const GYMNASE_COLINIERE = 'Gymnase_Coliniere';
    public const GYMNASE_RAPHAEL_LEBEL = 'Gymnase_Raphael_Lebel';
    public const GYMNASE_CIFAM = 'Gymnase_CIFAM';

    public function load(ObjectManager $manager): void
    {
        ##### Entités "ActivityPlace" #####

        $activity_place_01 = new ActivityPlace();

        $activity_place_01->setName("Salle Etienne Landais");
        $activity_place_01->setAdress("72 rue du Pontereau");
        $activity_place_01->setPostalCode("44300");
        $activity_place_01->setCity("Nantes");
        $activity_place_01->setGoogleMapLink("");
        $activity_place_01->setRecommendedRoute("");
        $activity_place_01->setCreatedAtValue();

        $manager->persist($activity_place_01);

        $activity_place_02 = new ActivityPlace();

        $activity_place_02->setName("Salle de Danse");
        $activity_place_02->setAdress("72 rue du Pontereau");
        $activity_place_02->setPostalCode("44300");
        $activity_place_02->setCity("Nantes");
        $activity_place_02->setGoogleMapLink("");
        $activity_place_02->setRecommendedRoute("");
        $activity_place_02->setCreatedAtValue();

        $manager->persist($activity_place_02);

        $activity_place_03 = new ActivityPlace();

        $activity_place_03->setName("Salle Henri Loiret");
        $activity_place_03->setAdress("72 rue du Pontereau");
        $activity_place_03->setPostalCode("44300");
        $activity_place_03->setCity("Nantes");
        $activity_place_03->setGoogleMapLink("");
        $activity_place_03->setRecommendedRoute("");
        $activity_place_03->setCreatedAtValue();

        $manager->persist($activity_place_03);

        $activity_place_04 = new ActivityPlace();

        $activity_place_04->setName("Gymnase de Toutes-Aides");
        $activity_place_04->setAdress("9 rue des Epinettes");
        $activity_place_04->setPostalCode("44300");
        $activity_place_04->setCity("Nantes");
        $activity_place_04->setGoogleMapLink("");
        $activity_place_04->setRecommendedRoute("");
        $activity_place_04->setCreatedAtValue();

        $manager->persist($activity_place_04);

        $activity_place_05 = new ActivityPlace();

        $activity_place_05->setName("Terrain de la Louettrie");
        $activity_place_05->setAdress("49 Petit Chemin des Chaupières");
        $activity_place_05->setPostalCode("44300");
        $activity_place_05->setCity("Nantes");
        $activity_place_05->setGoogleMapLink("");
        $activity_place_05->setRecommendedRoute("");
        $activity_place_05->setCreatedAtValue();

        $manager->persist($activity_place_05);

        $activity_place_06 = new ActivityPlace();

        $activity_place_06->setName("Salle Roger Corbard");
        $activity_place_06->setAdress("72 rue du Pontereau");
        $activity_place_06->setPostalCode("44300");
        $activity_place_06->setCity("Nantes");
        $activity_place_06->setGoogleMapLink("");
        $activity_place_06->setRecommendedRoute("");
        $activity_place_06->setCreatedAtValue();

        $manager->persist($activity_place_06);

        $activity_place_07 = new ActivityPlace();

        $activity_place_07->setName("La Plaine de Jeux Audubon");
        $activity_place_07->setAdress("72 rue du Pontereau");
        $activity_place_07->setPostalCode("44300");
        $activity_place_07->setCity("Nantes");
        $activity_place_07->setGoogleMapLink("");
        $activity_place_07->setRecommendedRoute("");
        $activity_place_07->setCreatedAtValue();

        $manager->persist($activity_place_07);

        $activity_place_08 = new ActivityPlace();

        $activity_place_08->setName("Gymnase de Doulon");
        $activity_place_08->setAdress("1 rue de la Basse Chênaie");
        $activity_place_08->setPostalCode("44300");
        $activity_place_08->setCity("Nantes");
        $activity_place_08->setGoogleMapLink("");
        $activity_place_08->setRecommendedRoute("");
        $activity_place_08->setCreatedAtValue();

        $manager->persist($activity_place_08);

        $activity_place_09 = new ActivityPlace();

        $activity_place_09->setName("Gymnase La Colinière");
        $activity_place_09->setAdress("129 rue Du Landreau ");
        $activity_place_09->setPostalCode("44300");
        $activity_place_09->setCity("Nantes");
        $activity_place_09->setGoogleMapLink("");
        $activity_place_09->setRecommendedRoute("");
        $activity_place_09->setCreatedAtValue();

        $manager->persist($activity_place_09);

        $activity_place_10 = new ActivityPlace();

        $activity_place_10->setName("Gymnase Raphaël Lebel");
        $activity_place_10->setAdress("16 boulevard Auguste Péneau");
        $activity_place_10->setPostalCode("44300");
        $activity_place_10->setCity("Nantes");
        $activity_place_10->setGoogleMapLink("");
        $activity_place_10->setRecommendedRoute("");
        $activity_place_10->setCreatedAtValue();

        $manager->persist($activity_place_10);

        $activity_place_11 = new ActivityPlace();

        $activity_place_11->setName("Gymnase du CIFAM");
        $activity_place_11->setAdress("Place Jacques Chesné");
        $activity_place_11->setPostalCode("44980");
        $activity_place_11->setCity("Sainte-Luce-sur-Loire");
        $activity_place_11->setGoogleMapLink("");
        $activity_place_11->setRecommendedRoute("");
        $activity_place_11->setCreatedAtValue();

        $manager->persist($activity_place_11);

        $activity_place_12 = new ActivityPlace();

        $activity_place_12->setName("Stade René Chevalier");
        $activity_place_12->setAdress("72 rue du Pontereau");
        $activity_place_12->setPostalCode("44300");
        $activity_place_12->setCity("Nantes");
        $activity_place_12->setGoogleMapLink("");
        $activity_place_12->setRecommendedRoute("");
        $activity_place_12->setCreatedAtValue();

        $manager->persist($activity_place_12);

        $manager->flush();

        $this->addReference(self::STADE_RENE_CHEVALIER, $activity_place_12);
        $this->addReference(self::PLAINE_JEUX_AUDUBON, $activity_place_07);
        $this->addReference(self::GYMNASE_DOULON, $activity_place_08);
        $this->addReference(self::TERRAIN_LOUETTRIE, $activity_place_05);
        $this->addReference(self::SALLE_ROGER_CORBARD, $activity_place_06);
        $this->addReference(self::SALLE_ETIENNE_LANDAIS, $activity_place_01);
        $this->addReference(self::SALLE_HENRI_LOIRET, $activity_place_03);
        $this->addReference(self::SALLE_DANSE, $activity_place_02);
        $this->addReference(self::GYMNASE_TOUTES_AIDES, $activity_place_04);
        $this->addReference(self::GYMNASE_COLINIERE, $activity_place_09);
        $this->addReference(self::GYMNASE_RAPHAEL_LEBEL, $activity_place_10);
        $this->addReference(self::GYMNASE_CIFAM, $activity_place_11);
    }
}
