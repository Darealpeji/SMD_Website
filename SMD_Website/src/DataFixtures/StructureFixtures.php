<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Association;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class StructureFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        # Création de l'entité "Association"
        $association = new Association();

        $association->setName("ASC Saint Médard de Doulon - Nantes");
        $association->setMotto("Un lieu unique pour toute la famille");
        $association->setAdressName("Le siège");
        $association->setAdress("72 rue du pontereau");
        $association->setPostalCode("44300");
        $association->setcity("Nantes");
        $association->setPhone("0981393509");
        $association->setMail("accueil@saintmedard-nantes.fr");
        $association->setCreatedAtValue();

        $manager->persist($association);

        $manager->flush();
    }
}
