<?php

namespace App\DataFixtures\Constants;

class OrganizationsConstants
{
    // CONSTANTES: ASSOCIATION ET SECTIONS
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

    private const ADRESS = '72 rue du Pontereau';
    private const POSTAL_CODE = '44300';
    private const CITY = 'Nantes';

    public const ORGANIZATIONS = [
        self::ASSOCIATION => [
            'name' => 'ASC Saint Médard de Doulon - Nantes',
            'motto' => 'Un lieu unique pour toute la famille',
            'adress' => Self::ADRESS,
            'postalCode' => Self::POSTAL_CODE,
            'city' => Self::CITY,
            'phone' => '0981393509',
            'mail' => 'accueil@saintmedard-nantes.fr',
            'manageConvocation' => false,
        ],
        self::BASKET => [
            'name' => 'Section Basket',
            'motto' => '',
            'adress' => Self::ADRESS,
            'postalCode' => Self::POSTAL_CODE,
            'city' => Self::CITY,
            'phone' => '0681588985',
            'mail' => 'basket@saintmedard-nantes.fr',
            'manageConvocation' => true,
        ],
        self::CHORALE => [
            'name' => 'Section Chorale',
            'motto' => 'A Portée de Voix',
            'adress' => Self::ADRESS,
            'postalCode' => Self::POSTAL_CODE,
            'city' => Self::CITY,
            'phone' => '0683286018',
            'mail' => 'chorale@saintmedard-nantes.fr',
            'manageConvocation' => false,
        ],
        self::DANSE => [
            'name' => 'Section Danse',
            'motto' => '',
            'adress' => Self::ADRESS,
            'postalCode' => Self::POSTAL_CODE,
            'city' => Self::CITY,
            'phone' => '0643827046',
            'mail' => 'danse@saintmedard-nantes.fr',
            'manageConvocation' => false,
        ],
        self::FOOTBALL => [
            'name' => 'Section Football',
            'motto' => 'Plaisir, Convivialité et Formation',
            'adress' => Self::ADRESS,
            'postalCode' => Self::POSTAL_CODE,
            'city' => Self::CITY,
            'phone' => '0240493177',
            'mail' => 'football@saintmedard-nantes.fr',
            'manageConvocation' => true,
        ],
        self::GYM_SPORTIVE => [
            'name' => 'Section Gym Sportive',
            'motto' => '',
            'adress' => Self::ADRESS,
            'postalCode' => Self::POSTAL_CODE,
            'city' => Self::CITY,
            'phone' => '0681314457',
            'mail' => 'gym-sportive@saintmedard-nantes.fr',
            'manageConvocation' => true,
        ],
        self::GYM_TONIQUE => [
            'name' => 'Section Gym Tonique, Pilates, Yoga',
            'motto' => '',
            'adress' => Self::ADRESS,
            'postalCode' => Self::POSTAL_CODE,
            'city' => Self::CITY,
            'phone' => '0663813495',
            'mail' => 'gym-tonique@saintmedard-nantes.fr',
            'manageConvocation' => false,
        ],
        self::LOISIRS => [
            'name' => 'Section Loisirs',
            'motto' => '',
            'adress' => Self::ADRESS,
            'postalCode' => Self::POSTAL_CODE,
            'city' => Self::CITY,
            'phone' => '0616936391',
            'mail' => 'loisirs@saintmedard-nantes.fr',
            'manageConvocation' => false,
        ],
        self::PETANQUE => [
            'name' => 'Section Pétanque',
            'motto' => '',
            'adress' => Self::ADRESS,
            'postalCode' => Self::POSTAL_CODE,
            'city' => Self::CITY,
            'phone' => '0650478720',
            'mail' => 'petanque@saintmedard-nantes.fr',
            'manageConvocation' => false,
        ],
        self::TENNIS_DE_TABLE => [
            'name' => 'Section Tennis de Table',
            'motto' => '',
            'adress' => Self::ADRESS,
            'postalCode' => Self::POSTAL_CODE,
            'city' => Self::CITY,
            'phone' => '0611962890',
            'mail' => 'secretariattt@saintmedard-nantes.fr',
            'manageConvocation' => true,
        ],
    ];

    public static function getAllOrganizations()
    {
        return array_keys(self::ORGANIZATIONS);
    }

    public static function getSections()
    {
        $organizations = array_keys(self::ORGANIZATIONS);
        return array_diff($organizations, [self::ASSOCIATION]);
    }

    public static function getOrganizationData(string $organization)
    {
        return self::ORGANIZATIONS[$organization] ?? null;
    }

    public static function getActivityPlacesForAssociation()
    {
        return [
            ActivityPlacesConstants::STADE_RENE_CHEVALIER,
            ActivityPlacesConstants::PLAINE_JEUX_AUDUBON,
            ActivityPlacesConstants::TERRAIN_LOUETTRIE,
            ActivityPlacesConstants::GYMNASE_DOULON,
        ];
    }

    public static function getSectionConstantByName($sectionName)
    {
        switch ($sectionName) {
            case 'basket':
                return self::BASKET;
            case 'chorale':
                return self::CHORALE;
            case 'danse':
                return self::DANSE;
            case 'football':
                return self::FOOTBALL;
            case 'Gym Sportive':
                return self::GYM_SPORTIVE;
            case 'Section Gym Tonique, Pilates, Yoga':
                return self::GYM_TONIQUE;
            case 'Section Loisirs':
                return self::LOISIRS;
            case 'Section Pétanque':
                return self::PETANQUE;
            case 'Section Tennis de Table':
                return self::TENNIS_DE_TABLE;
            default:
                return null;
        }
    }

    public static function getActivityPlacesForSection($sectionName)
    {
        switch ($sectionName) {
            case "basket":
                return [
                    ActivityPlacesConstants::GYMNASE_DOULON,
                    ActivityPlacesConstants::GYMNASE_TOUTES_AIDES,
                    ActivityPlacesConstants::GYMNASE_COLINIERE,
                    ActivityPlacesConstants::GYMNASE_RAPHAEL_LEBEL,
                    ActivityPlacesConstants::GYMNASE_CIFAM,
                ];

            case 'chorale':
                return [
                    ActivityPlacesConstants::SALLE_ETIENNE_LANDAIS,
                ];

            case 'danse':
                return [
                    ActivityPlacesConstants::SALLE_DANSE,
                ];

            case 'football':
                return [
                    ActivityPlacesConstants::PLAINE_JEUX_AUDUBON,
                ];

            case 'gym_sportive':
                return [
                    ActivityPlacesConstants::SALLE_HENRI_LOIRET,
                ];

            case 'gym_tonique':
                return [
                    ActivityPlacesConstants::SALLE_ETIENNE_LANDAIS,
                    ActivityPlacesConstants::GYMNASE_TOUTES_AIDES,
                    ActivityPlacesConstants::SALLE_DANSE,
                ];

            case 'loisirs':
                return [
                    ActivityPlacesConstants::SALLE_ETIENNE_LANDAIS,
                ];

            case 'petanque':
                return [
                    ActivityPlacesConstants::TERRAIN_LOUETTRIE,
                ];

            case 'tennis_de_table':
                return [
                    ActivityPlacesConstants::SALLE_ROGER_CORBARD,
                ];

            default:
                return [];
        }
    }
}
