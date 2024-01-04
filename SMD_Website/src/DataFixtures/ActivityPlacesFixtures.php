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
        $placesData = [
            self::STADE_RENE_CHEVALIER => [
                'name' => "Stade René Chevalier",
                'address' => "72 rue du Pontereau",
                'postalCode' => "44300",
                'city' => "Nantes",
            ],
            self::PLAINE_JEUX_AUDUBON => [
                'name' => "La Plaine de Jeux Audubon",
                'address' => "72 rue du Pontereau",
                'postalCode' => "44300",
                'city' => "Nantes",
            ],
            self::GYMNASE_DOULON => [
                'name' => "Gymnase de Doulon",
                'address' => "1 rue de la Basse Chênaie",
                'postalCode' => "44300",
                'city' => "Nantes",
            ],
            self::TERRAIN_LOUETTRIE => [
                'name' => "Terrain de la Louettrie",
                'address' => "49 Petit Chemin des Chaupières",
                'postalCode' => "44300",
                'city' => "Nantes",
            ],
            self::SALLE_ROGER_CORBARD => [
                'name' => "Salle Roger Corbard",
                'address' => "72 rue du Pontereau",
                'postalCode' => "44300",
                'city' => "Nantes",
            ],
            self::SALLE_ETIENNE_LANDAIS => [
                'name' => "Salle Etienne Landais",
                'address' => "72 rue du Pontereau",
                'postalCode' => "44300",
                'city' => "Nantes",
            ],
            self::SALLE_HENRI_LOIRET => [
                'name' => "Salle Henri Loiret",
                'address' => "72 rue du Pontereau",
                'postalCode' => "44300",
                'city' => "Nantes",
            ],
            self::SALLE_DANSE => [
                'name' => "Salle de Danse",
                'address' => "72 rue du Pontereau",
                'postalCode' => "44300",
                'city' => "Nantes",
            ],
            self::GYMNASE_TOUTES_AIDES => [
                'name' => "Gymnase de Toutes-Aides",
                'address' => "9 rue des Epinettes",
                'postalCode' => "44300",
                'city' => "Nantes",
            ],
            self::GYMNASE_COLINIERE => [
                'name' => "Gymnase de la Colinière",
                'address' => "129 rue Du Landreau",
                'postalCode' => "44300",
                'city' => "Nantes",
            ],
            self::GYMNASE_RAPHAEL_LEBEL => [
                'name' => "Gymnase Raphaël Lebel",
                'address' => "16 boulevard Auguste Péneau",
                'postalCode' => "44300",
                'city' => "Nantes",
            ],
            self::GYMNASE_CIFAM => [
                'name' => "Gymnase du CIFAM",
                'address' => "Place Jacques Chesné",
                'postalCode' => "44980",
                'city' => "Sainte-Luce-sur-Loire",
            ],
        ];

        foreach ($placesData as $reference => $data) {
            $activityPlace = $this->createActivityPlace(
                $data['name'],
                $data['address'],
                $data['postalCode'],
                $data['city']
            );

            $manager->persist($activityPlace);
            $this->addReference($reference, $activityPlace);
        }

        $manager->flush();

        $repository = $manager->getRepository(ActivityPlace::class);
        $activityPlaces = $repository->findAll();

        $count = count($activityPlaces);
        echo sprintf("Nombre de lieux d'activités créés : %d\n", $count);

        foreach ($activityPlaces as $activityPlace) {
            echo sprintf("- %s\n", $activityPlace->getName());
        }
    }

    private function createActivityPlace(
        string $name,
        string $address,
        string $postalCode,
        string $city
    ): ActivityPlace {
        $activityPlace = new ActivityPlace();
        $activityPlace->setName($name);
        $activityPlace->setAdress($address);
        $activityPlace->setPostalCode($postalCode);
        $activityPlace->setCity($city);
        $activityPlace->setGoogleMapLink("");
        $activityPlace->setRecommendedRoute("");
        $activityPlace->setCreatedAtValue();

        return $activityPlace;
    }
}
