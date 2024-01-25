<?php

namespace App\DataFixtures\Constants;

use App\DataFixtures\Constants\OrganizationsConstants;

class NavBarConstants
{
    public const NAVBAR = [
        OrganizationsConstants::ASSOCIATION => [
            'navBarMenusData' => [
                [
                    'label' => 'Accueil',
                    'slug' => '',
                    'routeName' => 'home_association',
                    'ranking' => 1,
                    'navBarSubMenus' => [
                        ['label' => 'Actualités', 'slug' => 'actualites', 'routeName' => 'news_association', 'ranking' => 1]
                    ]
                ],
                [
                    'label' => "L'Association",
                    'slug' => 'l-association',
                    'routeName' => 'presentation_association',
                    'ranking' => 2,
                    'navBarSubMenus' => [
                        ['label' => 'Notre Histoire', 'slug' => 'notre-histoire', 'routeName' => 'historical_association', 'ranking' => 1],
                        ['label' => "L'Organigramme", 'slug' => 'l-organigramme', 'routeName' => 'organization_chart_association', 'ranking' => 2],
                        ['label' => 'Documents', 'slug' => 'documents', 'routeName' => '', 'ranking' => 3],
                        ['label' => 'Nos Partenaires', 'slug' => 'nos-partenaires', 'routeName' => '', 'ranking' => 4]
                    ]
                ],
                [
                    'label' => 'Nos Sections',
                    'slug' => 'nos-sections',
                    'routeName' => '',
                    'ranking' => 3,
                    'navBarSubMenus' => [
                        ['label' => 'Basket', 'slug' => 'section-basket', 'routeName' => 'home_section', 'ranking' => 1],
                        ['label' => 'Chorale', 'slug' => 'section-chorale', 'routeName' => 'home_section', 'ranking' => 2],
                        ['label' => 'Danse', 'slug' => 'section-danse', 'routeName' => 'home_section', 'ranking' => 3],
                        ['label' => 'Football', 'slug' => 'section-football', 'routeName' => 'home_section', 'ranking' => 4],
                        ['label' => 'Gym Sportive', 'slug' => 'section-gym-sportive', 'routeName' => 'home_section', 'ranking' => 5],
                        ['label' => 'Gym Tonique, Pilates, Yoga', 'slug' => 'section-gym-tonique-pilates-yoga', 'routeName' => 'home_section', 'ranking' => 6],
                        ['label' => 'Loisirs', 'slug' => 'section-loisirs', 'routeName' => 'home_section', 'ranking' => 7],
                        ['label' => 'Pétanque', 'slug' => 'section-petanque', 'routeName' => 'home_section', 'ranking' => 8],
                        ['label' => 'Tennis de Table', 'slug' => 'section-tennis-de-table', 'routeName' => 'home_section', 'ranking' => 9]
                    ]
                ],
                [
                    'label' => 'Infos Pratiques',
                    'slug' => 'infos-pratiques',
                    'routeName' => 'useful_informations_association',
                    'ranking' => 4,
                    'navBarSubMenus' => []
                ]
            ]
        ],
        OrganizationsConstants::BASKET => [
            'navBarMenusData' => [
                [
                    'label' => 'Accueil',
                    'slug' => 'section-basket',
                    'routeName' => 'home_section',
                    'ranking' => 1,
                    'navBarSubMenus' => [
                        ['label' => 'Actualités', 'slug' => 'actualites', 'routeName' => 'news_section', 'ranking' => 1],
                        ['label' => 'La Vie du Club', 'slug' => 'la-vie-du-club', 'routeName' => '', 'ranking' => 2],
                        ['label' => 'Les Stages', 'slug' => 'les-stages', 'routeName' => '', 'ranking' => 3]
                    ]
                ],
                [
                    'label' => 'Le Club',
                    'slug' => 'le-club',
                    'routeName' => 'the_club_section',
                    'ranking' => 2,
                    'navBarSubMenus' => [
                        ['label' => "L'Organigramme", 'slug' => 'l-organigramme', 'routeName' => 'organization_chart_section', 'ranking' => 1],
                        ['label' => 'Nos Partenaires', 'slug' => 'nos-partenaires', 'routeName' => '', 'ranking' => 2]
                    ]
                ],
                [
                    'label' => 'Nos Equipes',
                    'slug' => 'nos-equipes',
                    'routeName' => 'our_team_categories_section',
                    'ranking' => 3,
                    'navBarSubMenus' => [
                        ['label' => 'Séniors', 'slug' => 'seniors', 'routeName' => 'our_teams_section', 'ranking' => 1],
                        ['label' => 'U18', 'slug' => 'u18', 'routeName' => 'our_teams_section', 'ranking' => 2],
                        ['label' => 'U15', 'slug' => 'u15', 'routeName' => 'our_teams_section', 'ranking' => 3],
                        ['label' => 'U13', 'slug' => 'u13', 'routeName' => 'our_teams_section', 'ranking' => 4],
                        ['label' => 'U11', 'slug' => 'u11', 'routeName' => 'our_teams_section', 'ranking' => 5],
                        ['label' => 'U9', 'slug' => 'u9', 'routeName' => 'our_teams_section', 'ranking' => 6],
                        ['label' => "L'Ecole d'Arbitrage", 'slug' => 'l-ecole-d-arbitrage', 'routeName' => '', 'ranking' => 7]
                    ]
                ],
                [
                    'label' => 'Boutique',
                    'slug' => 'boutique',
                    'routeName' => '',
                    'ranking' => 4,
                    'navBarSubMenus' => []
                ],
                [
                    'label' => 'Infos Pratiques',
                    'slug' => 'infos-pratiques',
                    'routeName' => 'useful_informations_section',
                    'ranking' => 5,
                    'navBarSubMenus' => [
                        ['label' => 'Inscriptions', 'slug' => 'inscriptions', 'routeName' => '', 'ranking' => 1]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::CHORALE => [
            'navBarMenusData' => [
                [
                    'label' => 'Accueil',
                    'slug' => 'section-chorale',
                    'routeName' => 'home_section',
                    'ranking' => 1,
                    'navBarSubMenus' => [
                        ['label' => 'Actualités', 'slug' => 'actualites', 'routeName' => 'news_section', 'ranking' => 1],
                        ['label' => 'Répertoire', 'slug' => 'repertoire', 'routeName' => '', 'ranking' => 1],
                        ['label' => "Modalités de Travail", 'slug' => 'modalite-de-travail', 'routeName' => '', 'ranking' => 2]
                    ]
                ],
                [
                    'label' => 'Présentation',
                    'slug' => 'presentation',
                    'routeName' => 'presentation_section',
                    'ranking' => 2,
                    'navBarSubMenus' => [
                        ['label' => 'Inscriptions', 'slug' => 'inscriptions', 'routeName' => '', 'ranking' => 1]
                    ]
                ],
                [
                    'label' => 'Nos Concerts',
                    'slug' => 'nos-concerts',
                    'routeName' => '',
                    'ranking' => 3,
                    'navBarSubMenus' => []
                ],
                [
                    'label' => 'Infos Pratiques',
                    'slug' => 'infos-pratiques',
                    'routeName' => 'useful_informations_section',
                    'ranking' => 4,
                    'navBarSubMenus' => [
                        ['label' => 'Inscriptions', 'slug' => 'inscriptions', 'routeName' => '', 'ranking' => 1]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::DANSE => [
            'navBarMenusData' => [
                [
                    'label' => 'Accueil',
                    'slug' => 'section-danse',
                    'routeName' => 'home_section',
                    'ranking' => 1,
                    'navBarSubMenus' => [
                        ['label' => 'Actualités', 'slug' => 'actualites', 'routeName' => 'news_section', 'ranking' => 1]
                    ]
                ],
                [
                    'label' => 'Présentation',
                    'slug' => 'presentation',
                    'routeName' => 'presentation_section',
                    'ranking' => 2,
                    'navBarSubMenus' => []
                ],
                [
                    'label' => 'Nos Activités',
                    'slug' => 'nos-activites',
                    'routeName' => 'our_activities_section',
                    'ranking' => 3,
                    'navBarSubMenus' => []
                ],
                [
                    'label' => 'Boutique',
                    'slug' => 'boutique',
                    'routeName' => '',
                    'ranking' => 4,
                    'navBarSubMenus' => []
                ],
                [
                    'label' => 'Infos Pratiques',
                    'slug' => 'infos-pratiques',
                    'routeName' => 'useful_informations_section',
                    'ranking' => 5,
                    'navBarSubMenus' => [
                        ['label' => 'Inscriptions', 'slug' => 'inscriptions', 'routeName' => '', 'ranking' => 1]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::FOOTBALL => [
            'navBarMenusData' => [
                [
                    'label' => 'Accueil',
                    'slug' => 'section-football',
                    'routeName' => 'home_section',
                    'ranking' => 1,
                    'navBarSubMenus' => [
                        ['label' => 'Actualités', 'slug' => 'actualites', 'routeName' => 'news_section', 'ranking' => 1],
                        ['label' => 'TV SMD', 'slug' => 'tv-smd', 'routeName' => '', 'ranking' => 2]
                    ]
                ],
                [
                    'label' => 'Le Club',
                    'slug' => 'le-club',
                    'routeName' => 'the_club_section',
                    'ranking' => 2,
                    'navBarSubMenus' => [
                        ['label' => 'Notre Histoire', 'slug' => 'notre-histoire', 'routeName' => 'club_historical_section', 'ranking' => 1],
                        ['label' => "L'Organigramme", 'slug' => 'l-organigramme', 'routeName' => 'organization_chart_section', 'ranking' => 2],
                        ['label' => 'P.E.F.', 'slug' => 'p-e-f', 'routeName' => '', 'ranking' => 3],
                        ['label' => "Règlement et Charte", 'slug' => 'reglement-et-charte', 'routeName' => '', 'ranking' => 4],
                        ['label' => 'Nos Partenaires', 'slug' => 'nos-partenaires', 'routeName' => '', 'ranking' => 5]
                    ]
                ],
                [
                    'label' => 'Nos Equipes',
                    'slug' => 'nos-equipes',
                    'routeName' => 'our_team_categories_section',
                    'ranking' => 3,
                    'navBarSubMenus' => [
                        ['label' => 'Séniors', 'slug' => 'seniors', 'routeName' => 'our_teams_section', 'ranking' => 1],
                        ['label' => 'U19', 'slug' => 'u19', 'routeName' => 'our_teams_section', 'ranking' => 2],
                        ['label' => 'U17', 'slug' => 'u17', 'routeName' => 'our_teams_section', 'ranking' => 3],
                        ['label' => 'U15', 'slug' => 'u15', 'routeName' => 'our_teams_section', 'ranking' => 4],
                        ['label' => 'U13', 'slug' => 'u13', 'routeName' => 'our_teams_section', 'ranking' => 5],
                        ['label' => 'U11', 'slug' => 'u11', 'routeName' => 'our_teams_section', 'ranking' => 6],
                        ['label' => 'U9', 'slug' => 'u9', 'routeName' => 'our_teams_section', 'ranking' => 7],
                        ['label' => 'U7', 'slug' => 'u7', 'routeName' => 'our_teams_section', 'ranking' => 8],
                        ['label' => 'Groupement Féminin', 'slug' => 'groupement-feminin', 'routeName' => '', 'ranking' => 9],
                        ['label' => 'Vétérans', 'slug' => 'veterans', 'routeName' => 'our_teams_section', 'ranking' => 10],
                        ['label' => 'Loisirs', 'slug' => 'loisirs', 'routeName' => 'our_teams_section', 'ranking' => 11],
                        ['label' => "Arbitres", 'slug' => 'l-ecole-d-arbitrage', 'routeName' => '', 'ranking' => 12]
                    ]
                ],
                [
                    'label' => 'Boutique',
                    'slug' => 'boutique',
                    'routeName' => '',
                    'ranking' => 4,
                    'navBarSubMenus' => []
                ],
                [
                    'label' => 'Infos Pratiques',
                    'slug' => 'infos-pratiques',
                    'routeName' => 'useful_informations_section',
                    'ranking' => 5,
                    'navBarSubMenus' => [
                        ['label' => 'Inscriptions', 'slug' => 'inscriptions', 'routeName' => '', 'ranking' => 1]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::GYM_SPORTIVE => [
            'navBarMenusData' => [
                [
                    'label' => 'Accueil',
                    'slug' => 'section-gym-sportive',
                    'routeName' => 'home_section',
                    'ranking' => 1,
                    'navBarSubMenus' => [
                        ['label' => 'Actualités', 'slug' => 'actualites', 'routeName' => 'news_section', 'ranking' => 1]
                    ]
                ],
                [
                    'label' => 'Présentation',
                    'slug' => 'presentation',
                    'routeName' => 'presentation_section',
                    'ranking' => 2,
                    'navBarSubMenus' => []
                ],
                [
                    'label' => 'Nos Equipes',
                    'slug' => 'nos-equipes',
                    'routeName' => 'our_team_categories_section',
                    'ranking' => 3,
                    'navBarSubMenus' => [
                        ['label' => 'Poussines', 'slug' => 'poussines', 'routeName' => 'our_teams_section', 'ranking' => 1],
                        ['label' => 'Jeunesses', 'slug' => 'jeunesses', 'routeName' => 'our_teams_section', 'ranking' => 2],
                        ['label' => 'Ainées', 'slug' => 'ainees', 'routeName' => 'our_teams_section', 'ranking' => 3]
                    ]
                ],
                [
                    'label' => 'Nos Activités',
                    'slug' => 'nos-activites',
                    'routeName' => 'our_activities_section',
                    'ranking' => 4,
                    'navBarSubMenus' => []
                ],
                [
                    'label' => 'Infos Pratiques',
                    'slug' => 'infos-pratiques',
                    'routeName' => 'useful_informations_section',
                    'ranking' => 5,
                    'navBarSubMenus' => [
                        ['label' => 'Inscriptions', 'slug' => 'inscriptions', 'routeName' => '', 'ranking' => 1]
                    ]
                ],
            ]
        ],
        OrganizationsConstants::GYM_TONIQUE => [
            'navBarMenusData' => [
                [
                    'label' => 'Accueil',
                    'slug' => 'section-gym-tonique-pilates-yoga',
                    'routeName' => 'home_section',
                    'ranking' => 1,
                    'navBarSubMenus' => [
                        ['label' => 'Actualités', 'slug' => 'actualites', 'routeName' => 'news_section', 'ranking' => 1]
                    ]
                ],
                [
                    'label' => 'Présentation',
                    'slug' => 'presentation',
                    'routeName' => 'presentation_section',
                    'ranking' => 2,
                    'navBarSubMenus' => []
                ],
                [
                    'label' => 'Nos Activités',
                    'slug' => 'nos-activites',
                    'routeName' => 'our_activities_section',
                    'ranking' => 3,
                    'navBarSubMenus' => []
                ],
                [
                    'label' => 'Infos Pratiques',
                    'slug' => 'infos-pratiques',
                    'routeName' => 'useful_informations_section',
                    'ranking' => 4,
                    'navBarSubMenus' => [
                        ['label' => 'Inscriptions', 'slug' => 'inscriptions', 'routeName' => '', 'ranking' => 1]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::LOISIRS => [
            'navBarMenusData' => [
                [
                    'label' => 'Accueil',
                    'slug' => 'section-loisirs',
                    'routeName' => 'home_section',
                    'ranking' => 1,
                    'navBarSubMenus' => [
                        ['label' => 'Actualités', 'slug' => 'actualites', 'routeName' => 'news_section', 'ranking' => 1]
                    ]
                ],
                [
                    'label' => 'Présentation',
                    'slug' => 'presentation',
                    'routeName' => 'presentation_section',
                    'ranking' => 2,
                    'navBarSubMenus' => []
                ],
                [
                    'label' => 'Infos Pratiques',
                    'slug' => 'infos-pratiques',
                    'routeName' => 'useful_informations_section',
                    'ranking' => 3,
                    'navBarSubMenus' => []
                ]
            ]
        ],
        OrganizationsConstants::PETANQUE => [
            'navBarMenusData' => [
                [
                    'label' => 'Accueil',
                    'slug' => 'section-petanque',
                    'routeName' => 'home_section',
                    'ranking' => 1,
                    'navBarSubMenus' => [
                        ['label' => 'Actualités', 'slug' => 'actualites', 'routeName' => 'news_section', 'ranking' => 1, 'navBarMenu' => 'Accueil']
                    ]
                ],
                [
                    'label' => 'Présentation',
                    'slug' => 'presentation',
                    'routeName' => 'presentation_section',
                    'ranking' => 2,
                    'navBarSubMenus' => []
                ],
                [
                    'label' => 'Infos Pratiques',
                    'slug' => 'infos-pratiques',
                    'routeName' => 'useful_informations_section',
                    'ranking' => 3,
                    'navBarSubMenus' => []
                ]
            ]
        ],
        OrganizationsConstants::TENNIS_DE_TABLE => [
            'navBarMenusData' => [
                [
                    'label' => 'Accueil',
                    'slug' => 'section-tennis-de-table',
                    'routeName' => 'home_section',
                    'ranking' => 1,
                    'navBarSubMenus' => [
                        ['label' => 'Actualités', 'slug' => 'actualites', 'routeName' => 'news_section', 'ranking' => 1]
                    ]
                ],
                [
                    'label' => 'Le Club',
                    'slug' => 'le-club',
                    'routeName' => 'the_club_section',
                    'ranking' => 2,
                    'navBarSubMenus' => [
                        ['label' => 'Notre Histoire', 'slug' => 'notre-histoire', 'routeName' => 'club_historical_section', 'ranking' => 1],
                        ['label' => "L'Organigramme", 'slug' => 'l-organigramme', 'routeName' => 'organization_chart_section', 'ranking' => 2],
                        ['label' => 'Nos Partenaires', 'slug' => 'nos-partenaires', 'routeName' => '', 'ranking' => 3]
                    ]
                ],
                [
                    'label' => 'Nos Equipes',
                    'slug' => 'nos-equipes',
                    'routeName' => 'our_team_categories_section',
                    'ranking' => 3,
                    'navBarSubMenus' => [
                        ['label' => 'Nationale', 'slug' => 'nationale', 'routeName' => 'our_teams_section', 'ranking' => 1],
                        ['label' => 'Régionale', 'slug' => 'regionale', 'routeName' => 'our_teams_section', 'ranking' => 2],
                        ['label' => 'Départementale', 'slug' => 'departementale', 'routeName' => 'our_teams_section', 'ranking' => 3],
                        ['label' => 'Jeunes', 'slug' => 'jeunes', 'routeName' => 'our_teams_section', 'ranking' => 4]
                    ]
                ],
                [
                    'label' => 'Nos Activités',
                    'slug' => 'nos-activites',
                    'routeName' => 'our_activities_section',
                    'ranking' => 4,
                    'navBarSubMenus' => []
                ],
                [
                    'label' => 'Infos Pratiques',
                    'slug' => 'infos-pratiques',
                    'routeName' => 'useful_informations_section',
                    'ranking' => 5,
                    'navBarSubMenus' => [
                        ['label' => 'Inscriptions', 'slug' => 'inscriptions', 'routeName' => '', 'ranking' => 1]
                    ]
                ]
            ],
        ]
    ];

    public const NAVBAR_LOGGED_IN = [
        'navBarSubMenusData' => [
            ['label' => 'Mon Compte', 'slug' => 'mon-compte', 'routeName' => '', 'ranking' => 1],
            ['label' => 'Convocation', 'slug' => 'convocation', 'routeName' => '', 'ranking' => 2],
            ['label' => 'Echo Raleur', 'slug' => 'echo-raleur', 'routeName' => '', 'ranking' => 3],
            ['label' => 'Lire une Partition', 'slug' => 'lire-une-partition', 'routeName' => '', 'ranking' => 4],
            ['label' => 'Fichiers MP3', 'slug' => 'fichiers-mp3', 'routeName' => '', 'ranking' => 5],
            ['label' => 'PV Bureau', 'slug' => 'pv-bureau', 'routeName' => '', 'ranking' => 6],
            ['label' => 'Espace Administrateur', 'slug' => 'espace-administrateur', 'routeName' => 'admin', 'ranking' => 7],
            ['label' => 'Gestion des Articles', 'slug' => 'gestion-des-articles', 'routeName' => 'admin', 'ranking' => 8],
            ['label' => 'Gestion des Convocations', 'slug' => 'gestion-des-convocations', 'routeName' => 'admin', 'ranking' => 9],
            ['label' => 'Se Déconnecter', 'slug' => 'se-deconnecter', 'routeName' => 'app_logout', 'ranking' => 10],
        ]
    ];
}
