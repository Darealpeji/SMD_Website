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
    public const TENNIS_DE_TABLE = 'tennis_de_table';
    public const SECTIONS = [
        self::BASKET => [
            'name' => 'Section Basket',
            'motto' => '',
            'phone' => '0681588985',
            'mail' => 'basket@saintmedard-nantes.fr',
            'places' => [
                ActivityPlacesFixtures::GYMNASE_DOULON,
                ActivityPlacesFixtures::GYMNASE_TOUTES_AIDES,
                ActivityPlacesFixtures::GYMNASE_COLINIERE,
                ActivityPlacesFixtures::GYMNASE_RAPHAEL_LEBEL,
                ActivityPlacesFixtures::GYMNASE_CIFAM,
            ],
        ],
        self::CHORALE => [
            'name' => 'Section Chorale',
            'motto' => 'A Portée de Voix',
            'phone' => '0683286018',
            'mail' => 'chorale@saintmedard-nantes.fr',
            'places' => [
                ActivityPlacesFixtures::SALLE_ETIENNE_LANDAIS,
            ],
        ],
        self::DANSE => [
            'name' => 'Section Danse',
            'motto' => '',
            'phone' => '0643827046',
            'mail' => 'danse@saintmedard-nantes.fr',
            'places' => [
                ActivityPlacesFixtures::SALLE_DANSE,
            ],
        ],
        self::FOOTBALL => [
            'name' => 'Section Football',
            'motto' => 'Plaisir, Convivialité et Formation',
            'phone' => '0240493177',
            'mail' => 'football@saintmedard-nantes.fr',
            'places' => [
                ActivityPlacesFixtures::PLAINE_JEUX_AUDUBON,
            ],
        ],
        self::GYM_SPORTIVE => [
            'name' => 'Section Gym Sportive',
            'motto' => '',
            'phone' => '0681314457',
            'mail' => 'gym-sportive@saintmedard-nantes.fr',
            'places' => [
                ActivityPlacesFixtures::SALLE_HENRI_LOIRET,
            ],
        ],
        self::GYM_TONIQUE => [
            'name' => 'Section Gym Tonique, Pilates, Yoga',
            'motto' => '',
            'phone' => '0663813495',
            'mail' => 'gym-tonique@saintmedard-nantes.fr',
            'places' => [
                ActivityPlacesFixtures::SALLE_ETIENNE_LANDAIS,
                ActivityPlacesFixtures::GYMNASE_TOUTES_AIDES,
                ActivityPlacesFixtures::SALLE_DANSE,
            ],
        ],
        self::LOISIRS => [
            'name' => 'Section Loisirs',
            'motto' => '',
            'phone' => '0616936391',
            'mail' => 'loisirs@saintmedard-nantes.fr',
            'places' => [
                ActivityPlacesFixtures::SALLE_ETIENNE_LANDAIS,
            ],
        ],
        self::PETANQUE => [
            'name' => 'Section Pétanque',
            'motto' => '',
            'phone' => '0650478720',
            'mail' => 'petanque@saintmedard-nantes.fr',
            'places' => [
                ActivityPlacesFixtures::TERRAIN_LOUETTRIE,
            ],
        ],
        self::TENNIS_DE_TABLE => [
            'name' => 'Section Tennis de Table',
            'motto' => '',
            'phone' => '0611962890',
            'mail' => 'secretariattt@saintmedard-nantes.fr',
            'places' => [
                ActivityPlacesFixtures::SALLE_ROGER_CORBARD,
            ],
        ],
    ];

    private $associationRepository;
    private $slugify;

    public function __construct(AssociationRepository $associationRepository, Slugify $slugify)
    {
        $this->associationRepository = $associationRepository;
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        $this->loadAssociation($manager);
        $this->loadSections($manager);
    }

    private function loadAssociation(ObjectManager $manager): void
    {
        $association = new Association();

        $association->setName("ASC Saint Médard de Doulon - Nantes");
        $association->setMotto("Un lieu unique pour toute la famille");
        $association->setAdress("72 rue du pontereau");
        $association->setPostalCode("44300");
        $association->setCity("Nantes");
        $association->setPhone("0981393509");
        $association->setMail("accueil@saintmedard-nantes.fr");
        $association->setCreatedAtValue();
        $association->addActivityPlace($this->getReference(ActivityPlacesFixtures::STADE_RENE_CHEVALIER));
        $association->addActivityPlace($this->getReference(ActivityPlacesFixtures::PLAINE_JEUX_AUDUBON));
        $association->addActivityPlace($this->getReference(ActivityPlacesFixtures::TERRAIN_LOUETTRIE));
        $association->addActivityPlace($this->getReference(ActivityPlacesFixtures::GYMNASE_DOULON));

        $manager->persist($association);
        $manager->flush();

        $this->addReference(self::ASSOCIATION, $association);

        echo sprintf(
            "Association créée : %s\n",
            $association->getName()
        );
    }

    private function loadSections(ObjectManager $manager): void
    {
        foreach (self::SECTIONS as $sectionName => $sectionData) {
            $section = new Section();

            $section->setName($sectionData['name']);
            $section->setMotto($sectionData['motto']);
            $section->setAdress("72 rue du pontereau");
            $section->setPostalCode("44300");
            $section->setCity("Nantes");
            $section->setPhone($sectionData['phone']);
            $section->setMail($sectionData['mail']);
            $section->setSlug($this->slugify->slugify($section->getName()));
            $section->setScoreNCoCode("");
            $section->setAssociation($this->getReference(self::ASSOCIATION));
            $section->setCreatedAtValue();

            foreach ($sectionData['places'] as $reference) {
                $section->addActivityPlace($this->getReference($reference));
            }

            $manager->persist($section);
            $this->addReference($sectionName, $section);
        }

        $manager->flush();

        $repository = $manager->getRepository(Section::class);
        $sections = $repository->findAll();

        $count = count($sections);
        echo sprintf("Nombre de sections créées : %d\n", $count);

        foreach ($sections as $section) {
            echo sprintf("- %s\n", $section->getName());
        }
    }

    public function getDependencies()
    {
        return [
            ActivityPlacesFixtures::class,
        ];
    }
}
