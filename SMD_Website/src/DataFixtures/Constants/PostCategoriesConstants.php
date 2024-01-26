<?php

namespace App\DataFixtures\Constants;

use App\DataFixtures\Constants\MembersConstants;

class PostCategoriesConstants
{
    // CONSTANTES: CATEGORIES DE L'ORGANIGRAMME
    public const PRESIDENCE_FOOTBALL = 'presidence_football';
    public const BUREAU_ASSOCIATION = 'bureau_association';
    public const BUREAU_BASKET = 'bureau_basket';
    public const BUREAU_CHORALE = 'bureau_chorale';
    public const BUREAU_DANSE = 'bureau_danse';
    public const BUREAU_FOOTBALL = 'bureau_football';
    public const BUREAU_GYM_SPORTIVE = 'bureau_gym_sportive';
    public const BUREAU_GYM_TONIQUE = 'bureau_gym_tonique';
    public const BUREAU_LOISIRS = 'bureau_loisirs';
    public const BUREAU_PETANQUE = 'bureau_petanque';
    public const BUREAU_TENNIS_DE_TABLE = 'bureau_tennis_de_table';
    public const COMITE_DIRECTION_FOOTBALL = 'comite_direction_football';
    public const CONSEIL_ADMINISTRATION_ASSOCIATION = 'conseil_administration_association';
    public const POLE_SECRETARIAT_ASSOCIATION = 'pole_secretariat_association';
    public const SALARIE = 'salarie';
    public const COMMISSION_FINANCES_ASSOCIATION = 'commission_finances_association';
    public const COMMISSION_EMPLOI_ASSOCIATION = 'commission_emploi_association';
    public const COMMISSION_PATRIMOINE_ASSOCIATION = 'commission_patrimoine_association';
    public const COMMISSION_VIE_ASSOCIATIVE_ASSOCIATION = 'commission_vie_associative_association';
    public const COMMISSION_COMMUNICATION_ASSOCIATION = 'commission_communication_association';
    public const COMMISSION_DOULON_GOHARDS_ASSOCIATION = 'commission_doulon_gohards_association';
    public const COMMISSION_ADMINISTRATION_INSTITUTIONS_FOOTBALL = 'commission_administration_institutions_football';
    public const COMMISSION_FINANCES_JURIDIQUE_FOOTBALL = 'commission_finances_juridique_football';
    public const COMMISSION_LOGISTIQUE_FOOTBALL = 'commission_logistique_football';
    public const COMMISSION_COMMUNICATION_EVENEMENTIELS_FOOTBALL = 'commission_communication_evenementiels_football';
    public const COMMISSION_MANAGEMENT_RH_FOOTBALL = 'commission_management_rh_football';
    public const COMMISSION_ETHIQUE_FOOTBALL = 'commission_ethique_football';
    public const COMMISSION_SPORTIF_FOOTBALL = 'commission_sportif_football';
    public const COMMISSION_ARBITRAGE_FOOTBALL = 'commission_arbitrage_football';
    public const MAINTENANCE_ASSOCIATION = 'maintenance_association';
    public const STAFF_TECHNIQUE_BASKET = 'staff_technique_basket';
    public const STAFF_TECHNIQUE_FOOTBALL = 'staff_technique_football';
    public const STAFF_TECHNIQUE_TENNIS_DE_TABLE = 'staff_technique_tennis_de_table';

    // CONSTANTES: CATEGORIES DE POSTE PAR EQUIPE OU ACTIVITE
    public const DIRIGEANT_FOOTBALL = 'dirigeant_football';
    public const COACH_BASKET = 'coach_basket';
    public const ENTRAINEUR_TENNIS_DE_TABLE = 'entraineur_tennis_de_table';
    public const ENTRAINEUR_GYM_SPORTIVE = 'entraineur_gym_sportive';
    public const PROFESSEUR_DANSE = 'professeur_danse';
    public const PROFESSEUR_GYM_SPORTIVE = 'professeur_gym_sportive';
    public const PROFESSEUR_GYM_TONIQUE = 'professeur_gym_tonique';

    public const ORGANIZATION_CHART = [
        self::PRESIDENCE_FOOTBALL => [
            'name' => 'Section Football - Présidence',
            'label' => 'Présidence',
            'ranking' => '1'
        ],
        self::BUREAU_ASSOCIATION => [
            'name' => 'ASC Saint Médard de Doulon - Nantes - Bureau',
            'label' => 'Bureau',
            'ranking' => '2'
        ],
        self::BUREAU_BASKET => [
            'name' => 'Section Basket - Bureau',
            'label' => 'Bureau',
            'ranking' => '2'
        ],
        self::BUREAU_CHORALE => [
            'name' => 'Section Chorale - Bureau',
            'label' => 'Bureau',
            'ranking' => '2'
        ],
        self::BUREAU_DANSE => [
            'name' => 'Section Danse - Bureau',
            'label' => 'Bureau',
            'ranking' => '2'
        ],
        self::BUREAU_FOOTBALL => [
            'name' => 'Section Football - Bureau',
            'label' => 'Bureau',
            'ranking' => '2'
        ],
        self::BUREAU_GYM_SPORTIVE => [
            'name' => 'Section Gym Sportive - Bureau',
            'label' => 'Bureau',
            'ranking' => '2'
        ],
        self::BUREAU_GYM_TONIQUE => [
            'name' => 'Section Gym Tonique, Pilates, Yoga - Bureau',
            'label' => 'Bureau',
            'ranking' => '2'
        ],
        self::BUREAU_LOISIRS => [
            'name' => 'Section Loisirs - Bureau',
            'label' => 'Bureau',
            'ranking' => '2'
        ],
        self::BUREAU_PETANQUE => [
            'name' => 'Section Pétanque - Bureau',
            'label' => 'Bureau',
            'ranking' => '2'
        ],
        self::BUREAU_TENNIS_DE_TABLE => [
            'name' => 'Section Tennis de Table - Bureau',
            'label' => 'Bureau',
            'ranking' => '2'
        ],
        self::CONSEIL_ADMINISTRATION_ASSOCIATION => [
            'name' => 'ASC Saint Médard de Doulon - Nantes - Conseil d\Administration',
            'label' => 'Conseil d\Administration',
            'ranking' => '3'
        ],
        self::COMITE_DIRECTION_FOOTBALL => [
            'name' => 'Section Football - Comité de Direction',
            'label' => 'Comité de Direction',
            'ranking' => '4'
        ],
        self::POLE_SECRETARIAT_ASSOCIATION => [
            'name' => 'ASC Saint Médard de Doulon - Nantes - Pôle Secrétariat',
            'label' => 'Pôle Secrétariat',
            'ranking' => '6'
        ],
        self::SALARIE => [
            'name' => 'Salarié(s)',
            'label' => 'Salarié(s)',
            'ranking' => '7'
        ],
        self::COMMISSION_FINANCES_ASSOCIATION => [
            'name' => 'ASC Saint Médard de Doulon - Nantes - Commission Finances',
            'label' => 'Commission Finances',
            'ranking' => '8'
        ],
        self::COMMISSION_EMPLOI_ASSOCIATION => [
            'name' => 'ASC Saint Médard de Doulon - Nantes - Commission Emploi',
            'label' => 'Commission Emploi',
            'ranking' => '9'
        ],
        self::COMMISSION_PATRIMOINE_ASSOCIATION => [
            'name' => 'ASC Saint Médard de Doulon - Nantes - Commission Patrimoine',
            'label' => 'Commission Patrimoine',
            'ranking' => '10'
        ],
        self::COMMISSION_VIE_ASSOCIATIVE_ASSOCIATION => [
            'name' => 'ASC Saint Médard de Doulon - Nantes - Commission Vie Associative',
            'label' => 'Commission Vie Associative',
            'ranking' => '11'
        ],
        self::COMMISSION_COMMUNICATION_ASSOCIATION => [
            'name' => 'ASC Saint Médard de Doulon - Nantes - Commission Communication',
            'label' => 'Commission Communication',
            'ranking' => '12'
        ],
        self::COMMISSION_DOULON_GOHARDS_ASSOCIATION => [
            'name' => 'ASC Saint Médard de Doulon - Nantes - Commission Doulon-Gohards',
            'label' => 'Commission Doulon-Gohards',
            'ranking' => '13'
        ],
        self::COMMISSION_ADMINISTRATION_INSTITUTIONS_FOOTBALL => [
            'name' => 'Section Football - Commission Administration & Institutions',
            'label' => 'Commission Administration & Institutions',
            'ranking' => '14'
        ],
        self::COMMISSION_FINANCES_JURIDIQUE_FOOTBALL => [
            'name' => 'Section Football - Commission Finances & Juridique',
            'label' => 'Commission Finances & Juridique',
            'ranking' => '15'
        ],
        self::COMMISSION_LOGISTIQUE_FOOTBALL => [
            'name' => 'Section Football - Commission Logistique',
            'label' => 'Commission Logistique',
            'ranking' => '16'
        ],
        self::COMMISSION_COMMUNICATION_EVENEMENTIELS_FOOTBALL => [
            'name' => 'Section Football - Commission Communication & Evènementiels',
            'label' => 'Commission Communication & Evènementiels',
            'ranking' => '17'
        ],
        self::COMMISSION_MANAGEMENT_RH_FOOTBALL => [
            'name' => 'Section Football - Commission Management & RH',
            'label' => 'Commission Management & RH',
            'ranking' => '18'
        ],
        self::COMMISSION_ETHIQUE_FOOTBALL => [
            'name' => 'Section Football - Commission Ethique, Environnement, Social, Educatif',
            'label' => 'Commission Ethique, Environnement, Social, Educatif',
            'ranking' => '19'
        ],
        self::COMMISSION_SPORTIF_FOOTBALL => [
            'name' => 'Section Football - Commission Sportif',
            'label' => 'Commission Sportif',
            'ranking' => '20'
        ],
        self::COMMISSION_ARBITRAGE_FOOTBALL => [
            'name' => 'Section Football - Commission Arbitrage',
            'label' => 'Commission Arbitrage',
            'ranking' => '21'
        ],
        self::MAINTENANCE_ASSOCIATION => [
            'name' => 'ASC Saint Médard de Doulon - Nantes - - Maintenance',
            'label' => 'Maintenance',
            'ranking' => '22'
        ],
        self::STAFF_TECHNIQUE_BASKET => [
            'name' => 'Section Basket - Staff Technique',
            'label' => 'Staff Technique',
            'ranking' => '23'
        ],
        self::STAFF_TECHNIQUE_FOOTBALL => [
            'name' => 'Section Football - Staff Technique',
            'label' => 'Staff Technique',
            'ranking' => '23'
        ],
        self::STAFF_TECHNIQUE_TENNIS_DE_TABLE => [
            'name' => 'Section Tennis de table - Staff Technique',
            'label' => 'Staff Technique',
            'ranking' => '23'
        ],
    ];

    public const POST_TEAM_CATEGORIES = [
        self::DIRIGEANT_FOOTBALL => [
            'name' => 'Section Football - Dirigeants/es',
            'labelPlural' => 'Dirigeants/es',
            'labelSingular' => 'Dirigeant/e'
        ],
        self::COACH_BASKET => [
            'name' => 'Section Basket - Coachs',
            'labelPlural' => 'Coachs',
            'labelSingular' => 'Coach'
        ],
        self::ENTRAINEUR_TENNIS_DE_TABLE => [
            'name' => 'Section Tennis de Table - Entraîneurs/ses',
            'labelPlural' => 'Entraîneurs/ses',
            'labelSingular' => 'Entraineur/se'
        ],
        self::ENTRAINEUR_GYM_SPORTIVE => [
            'name' => 'Section Gym Sportive - Entraîneurs/ses',
            'labelPlural' => 'Entraîneurs/ses',
            'labelSingular' => 'Entraineur/se'
        ],
        self::PROFESSEUR_DANSE => [
            'name' => 'Section Danse - Professeurs/es',
            'labelPlural' => 'Professeurs/es',
            'labelSingular' => 'Professeur/e'
        ],
        self::PROFESSEUR_GYM_SPORTIVE => [
            'name' => 'Section Gym Sportive - Professeurs/es',
            'labelPlural' => 'Professeurs/es',
            'labelSingular' => 'Professeur/e'
        ],
        self::PROFESSEUR_GYM_TONIQUE => [
            'name' => 'Section Gym Tonique, Pilates, Yoga - Professeurs/es',
            'labelPlural' => 'Professeurs/es',
            'labelSingular' => 'Professeur/e'
        ],
    ];
}
