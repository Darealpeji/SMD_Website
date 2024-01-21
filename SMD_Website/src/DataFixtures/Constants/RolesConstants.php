<?php

namespace App\DataFixtures\Constants;

class RolesConstants
{

    public const ROLE_SUPER_ADMIN = "Role_Super_Admin";
    public const ROLE_ADMIN_ASSOCIATION = "Role_Admin_Association";
    public const ROLE_EDITOR_ASSOCIATION = "Role_Editor_Association";
    public const ROLE_ADMIN_BASKET = "Role_Admin_Basket";
    public const ROLE_EDITOR_BASKET = "Role_Editor_Basket";
    public const ROLE_COACH_BASKET = "Role_Coach_Basket";
    public const ROLE_ADMIN_CHORALE = "Role_Admin_Chorale";
    public const ROLE_EDITOR_CHORALE = "Role_Editor_Chorale";
    public const ROLE_COACH_CHORALE = "Role_Coach_Chorale";
    public const ROLE_ADMIN_DANSE = "Role_Admin_Danse";
    public const ROLE_EDITOR_DANSE = "Role_Editor_Danse";
    public const ROLE_COACH_DANSE = "Role_Coach_Danse";
    public const ROLE_ADMIN_FOOTBALL = "Role_Admin_Football";
    public const ROLE_EDITOR_FOOTBALL = "Role_Editor_Football";
    public const ROLE_COACH_FOOTBALL = "Role_Coach_Football";
    public const ROLE_ADMIN_GYM_SPORTIVE = "Role_Admin_Gym_Sportive";
    public const ROLE_EDITOR_GYM_SPORTIVE = "Role_Editor_Gym_Sportive";
    public const ROLE_COACH_GYM_SPORTIVE = "Role_Coach_Gym_Sportive";
    public const ROLE_ADMIN_GYM_TONIQUE = "Role_Admin_Gym_Tonique";
    public const ROLE_EDITOR_GYM_TONIQUE = "Role_Editor_Gym_Tonique";
    public const ROLE_COACH_GYM_TONIQUE = "Role_Coach_Gym_Tonique";
    public const ROLE_ADMIN_LOISIRS = "Role_Admin_Loisirs";
    public const ROLE_EDITOR_LOISIRS = "Role_Editor_Loisirs";
    public const ROLE_COACH_LOISIRS = "Role_Coach_Loisirs";
    public const ROLE_ADMIN_PETANQUE = "Role_Admin_Petanque";
    public const ROLE_EDITOR_PETANQUE = "Role_Editor_Petanque";
    public const ROLE_COACH_PETANQUE = "Role_Coach_Petanque";
    public const ROLE_ADMIN_TENNIS_DE_TABLE = "Role_Admin_Tennis_de_Table";
    public const ROLE_EDITOR_TENNIS_DE_TABLE = "Role_Editor_Tennis_de_Table";
    public const ROLE_COACH_TENNIS_DE_TABLE = "Role_Coach_Tennis_de_Table";
    public const ROLE_LICENSEE = "Role_Licensee";
    public const ROLE_USER = "Role_User";

    public const ROLES = [
        self::ROLE_SUPER_ADMIN => [
            'name' => 'ROLE_SUPER_ADMIN',
            'label' => 'Super Administrateur/trice',
            'organizations' => [
                OrganizationsConstants::ASSOCIATION,
                OrganizationsConstants::BASKET,
                OrganizationsConstants::CHORALE,
                OrganizationsConstants::DANSE,
                OrganizationsConstants::FOOTBALL,
                OrganizationsConstants::GYM_SPORTIVE,
                OrganizationsConstants::GYM_TONIQUE,
                OrganizationsConstants::LOISIRS,
                OrganizationsConstants::PETANQUE,
                OrganizationsConstants::TENNIS_DE_TABLE
            ]
        ],
        self::ROLE_ADMIN_ASSOCIATION => [
            'name' => 'ROLE_ADMIN_ASSOCIATION',
            'label' => 'Administrateur/trice de l\'Association',
            'organizations' => [OrganizationsConstants::ASSOCIATION]
        ],
        self::ROLE_EDITOR_ASSOCIATION => [
            'name' => 'ROLE_EDITOR_ASSOCIATION',
            'label' => 'Editeur/trice de l\'Association',
            'organizations' => [OrganizationsConstants::ASSOCIATION]
        ],
        self::ROLE_ADMIN_BASKET => [
            'name' => 'ROLE_ADMIN_BASKET',
            'label' => 'Administrateur/trice de la Section Basket',
            'organizations' => [OrganizationsConstants::BASKET]
        ],
        self::ROLE_EDITOR_BASKET => [
            'name' => 'ROLE_EDITOR_BASKET',
            'label' => 'Editeur/trice de la Section Basket',
            'organizations' => [OrganizationsConstants::BASKET]
        ],
        self::ROLE_COACH_BASKET => [
            'name' => 'ROLE_COACH_BASKET',
            'label' => 'Coach de la Section Basket',
            'organizations' => [OrganizationsConstants::BASKET]
        ],
        self::ROLE_ADMIN_CHORALE => [
            'name' => 'ROLE_ADMIN_CHORALE',
            'label' => 'Administrateur/trice de la Section Chorale',
            'organizations' => [OrganizationsConstants::CHORALE]
        ],
        self::ROLE_EDITOR_CHORALE => [
            'name' => 'ROLE_EDITOR_CHORALE',
            'label' => 'Editeur/trice de la Section Chorale',
            'organizations' => [OrganizationsConstants::CHORALE]
        ],
        self::ROLE_COACH_CHORALE => [
            'name' => 'ROLE_COACH_CHORALE',
            'label' => 'Coach de la Section Chorale',
            'organizations' => [OrganizationsConstants::CHORALE]
        ],
        self::ROLE_ADMIN_DANSE => [
            'name' => 'ROLE_ADMIN_DANSE',
            'label' => 'Administrateur/trice de la Section Danse',
            'organizations' => [OrganizationsConstants::DANSE]
        ],
        self::ROLE_EDITOR_DANSE => [
            'name' => 'ROLE_EDITOR_DANSE',
            'label' => 'Editeur/trice de la Section Danse',
            'organizations' => [OrganizationsConstants::DANSE]
        ],
        self::ROLE_COACH_DANSE => [
            'name' => 'ROLE_COACH_DANSE',
            'label' => 'Coach de la Section Danse',
            'organizations' => [OrganizationsConstants::DANSE]
        ],
        self::ROLE_ADMIN_FOOTBALL => [
            'name' => 'ROLE_ADMIN_FOOTBALL',
            'label' => 'Administrateur/trice de la Section Football',
            'organizations' => [OrganizationsConstants::FOOTBALL]
        ],
        self::ROLE_EDITOR_FOOTBALL => [
            'name' => 'ROLE_EDITOR_FOOTBALL',
            'label' => 'Editeur/trice de la Section Football',
            'organizations' => [OrganizationsConstants::FOOTBALL]
        ],
        self::ROLE_COACH_FOOTBALL => [
            'name' => 'ROLE_COACH_FOOTBALL',
            'label' => 'Coach de la Section Football',
            'organizations' => [OrganizationsConstants::FOOTBALL]
        ],
        self::ROLE_ADMIN_GYM_SPORTIVE => [
            'name' => 'ROLE_ADMIN_GYM_SPORTIVE',
            'label' => 'Administrateur/trice de la Section Gym Sportive',
            'organizations' => [OrganizationsConstants::GYM_SPORTIVE]
        ],
        self::ROLE_EDITOR_GYM_SPORTIVE => [
            'name' => 'ROLE_EDITOR_GYM_SPORTIVE',
            'label' => 'Editeur/trice de la Section Gym Sportive',
            'organizations' => [OrganizationsConstants::GYM_SPORTIVE]
        ],
        self::ROLE_COACH_GYM_SPORTIVE => [
            'name' => 'ROLE_COACH_GYM_SPORTIVE',
            'label' => 'Coach de la Section Gym Sportive',
            'organizations' => [OrganizationsConstants::GYM_SPORTIVE]
        ],
        self::ROLE_ADMIN_GYM_TONIQUE => [
            'name' => 'ROLE_ADMIN_GYM_TONIQUE',
            'label' => 'Administrateur/trice de la Section Gym Tonique',
            'organizations' => [OrganizationsConstants::GYM_TONIQUE]
        ],
        self::ROLE_EDITOR_GYM_TONIQUE => [
            'name' => 'ROLE_EDITOR_GYM_TONIQUE',
            'label' => 'Editeur/trice de la Section Gym Tonique',
            'organizations' => [OrganizationsConstants::GYM_TONIQUE]
        ],
        self::ROLE_COACH_GYM_TONIQUE => [
            'name' => 'ROLE_COACH_GYM_TONIQUE',
            'label' => 'Coach de la Section Gym Tonique',
            'organizations' => [OrganizationsConstants::GYM_TONIQUE]
        ],
        self::ROLE_ADMIN_LOISIRS => [
            'name' => 'ROLE_ADMIN_LOISIRS',
            'label' => 'Administrateur/trice de la Section Loisirs',
            'organizations' => [OrganizationsConstants::LOISIRS]
        ],
        self::ROLE_EDITOR_LOISIRS => [
            'name' => 'ROLE_EDITOR_LOISIRS',
            'label' => 'Editeur/trice de la Section Loisirs',
            'organizations' => [OrganizationsConstants::LOISIRS]
        ],
        self::ROLE_COACH_LOISIRS => [
            'name' => 'ROLE_COACH_LOISIRS',
            'label' => 'Coach de la Section Loisirs',
            'organizations' => [OrganizationsConstants::LOISIRS]
        ],
        self::ROLE_ADMIN_PETANQUE => [
            'name' => 'ROLE_ADMIN_PETANQUE',
            'label' => 'Administrateur/trice de la Section Pétanque',
            'organizations' => [OrganizationsConstants::PETANQUE]
        ],
        self::ROLE_EDITOR_PETANQUE => [
            'name' => 'ROLE_EDITOR_PETANQUE',
            'label' => 'Editeur/trice de la Section Pétanque',
            'organizations' => [OrganizationsConstants::PETANQUE]
        ],
        self::ROLE_COACH_PETANQUE => [
            'name' => 'ROLE_COACH_PETANQUE',
            'label' => 'Coach de la Section Pétanque',
            'organizations' => [OrganizationsConstants::PETANQUE]
        ],
        self::ROLE_ADMIN_TENNIS_DE_TABLE => [
            'name' => 'ROLE_ADMIN_TENNIS_DE_TABLE',
            'label' => 'Administrateur/trice de la Section Tennis de Table',
            'organizations' => [OrganizationsConstants::TENNIS_DE_TABLE]
        ],
        self::ROLE_EDITOR_TENNIS_DE_TABLE => [
            'name' => 'ROLE_EDITOR_TENNIS_DE_TABLE',
            'label' => 'Editeur/trice de la Section Tennis de Table',
            'organizations' => [OrganizationsConstants::TENNIS_DE_TABLE]
        ],
        self::ROLE_COACH_TENNIS_DE_TABLE => [
            'name' => 'ROLE_COACH_TENNIS_DE_TABLE',
            'label' => 'Coach de la Section Tennis de Table',
            'organizations' => [OrganizationsConstants::TENNIS_DE_TABLE]
        ],
        self::ROLE_LICENSEE => [
            'name' => 'ROLE_LICENSEE',
            'label' => 'Licensié(e) d\'une Section',
            'organizations' => []
        ],
        self::ROLE_USER => [
            'name' => 'ROLE_USER',
            'label' => 'Utilisateur/trice',
            'organizations' => []
        ],
    ];
}
