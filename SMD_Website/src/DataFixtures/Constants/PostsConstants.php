<?php

namespace App\DataFixtures\Constants;

use App\DataFixtures\Constants\MembersConstants;

class PostsConstants
{

    public const ORGANIZATIONS_POSTS = [
        OrganizationsConstants::ASSOCIATION => [
            'hierarchicalGroup' => [
                'Bureau' => [
                    [
                        'label' => 'Président/e', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [MembersConstants::YANNICK_JOSSE]
                    ],
                    [
                        'label' => 'Vice-Président/e', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => [MembersConstants::VALERIE_LEGENDRE]
                    ],
                    [
                        'label' => 'Trésorier/ère', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [MembersConstants::FRANCOIS_PATRON]
                    ],
                    [
                        'label' => 'Membre du Bureau', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::JEAN_FRANCOIS_RICHARD,
                            MembersConstants::CAMILLE_DURASSIER
                        ]
                    ],
                    [
                        'label' => 'Pôle Secrétariat', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::CHRISTOPHE_LE_FOLL,
                            MembersConstants::SYLVIE_CHAUVEAU
                        ]
                    ]
                ],
                'Conseil d\'Administration' => [
                    [
                        'label' => 'Membre du Conseil d\'Administration', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::STEPHANE_AUGEREAU,
                            MembersConstants::LAURE_BERNARD,
                            MembersConstants::PHILIPPE_CASSARD,
                            MembersConstants::SYLVIE_CHAUVEAU,
                            MembersConstants::DENIS_COUBARD,
                            MembersConstants::SERGE_DUCHESNE,
                            MembersConstants::CAMILLE_DURASSIER,
                            MembersConstants::EMMANUEL_GROSSEAU,
                            MembersConstants::YANNICK_JOSSE,
                            MembersConstants::CHRISTINE_LASSAIGNE,
                            MembersConstants::PHILIPPE_JEANNE,
                            MembersConstants::ANNIE_LE_GALLIC,
                            MembersConstants::VALERIE_LEGENDRE,
                            MembersConstants::FRANCOIS_PATRON,
                            MembersConstants::JEAN_FRANCOIS_RICHARD,
                            MembersConstants::PATRICK_WILLOCQ
                        ]
                    ]
                ],
                'Commission(s)' => [
                    [
                        'label' => 'Membre de la Commission Finances', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::BETTY_SORIN,
                            MembersConstants::MICHEL_GOURET,
                            MembersConstants::FRANCOIS_PATRON,
                            MembersConstants::MARIE_HELENE_BOUTTIER,
                            MembersConstants::NICOLE_DANSART,
                            MembersConstants::ELIANE_BERTIN,
                            MembersConstants::DOROTHEE_DUBOC,
                            MembersConstants::CLEMENT_SQUIRES,
                            MembersConstants::JEAN_PIERRE_DIEUAIDE,
                            MembersConstants::MYRIAM_BOUYER
                        ]
                    ],
                    [
                        'label' => 'Membre de la Commission Emploi', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::PHILIPPE_GICQUEL,
                            MembersConstants::EMMANUEL_GROSSEAU,
                            MembersConstants::SYLVIE_CHAUVEAU,
                            MembersConstants::PHILIPPE_JEANNE,
                            MembersConstants::JEROME_LEBATARD,
                            MembersConstants::LAURE_BERNARD,
                            MembersConstants::CHRISTINE_LASSAIGNE,
                            MembersConstants::JEAN_FRANCOIS_RICHARD
                        ]
                    ],
                    [
                        'label' => 'Membre de la Commission Patrimoine', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [MembersConstants::GUILLAUME_M]
                    ],
                    [
                        'label' => 'Membre de la Commission Vie Associative', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ANNIE_LE_GALLIC,
                            MembersConstants::CHRISTOPHE_LE_FOLL,
                            MembersConstants::PHILIPPE_CASSARD,
                            MembersConstants::CLEMENT_SQUIRES,
                            MembersConstants::HERVE_GUILLOU_HELY,
                            MembersConstants::GILBERT_TESSIER
                        ]
                    ],
                    [
                        'label' => 'Membre de la Commission Communication', 'ranking' => 5, 'status' => 'Bénévole',
                        'members' => [MembersConstants::BERNARD_LEGENDRE]
                    ],
                    [
                        'label' => 'Membre de la Commission Doulon-Gohards', 'ranking' => 6, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::PHILIPPE_GICQUEL,
                            MembersConstants::YANNICK_JOSSE,
                            MembersConstants::A_MARTINAUD,
                            MembersConstants::LAURE_BERNARD,
                            MembersConstants::CHRISTOPHE_LE_FOLL,
                            MembersConstants::CAMILLE_DURASSIER,
                            MembersConstants::GILLES_LANDAIS,
                            MembersConstants::PHILIPPE_CASSARD,
                            MembersConstants::BERNARD_LEGENDRE
                        ]
                    ]
                ],
                'Administration' => [
                    [
                        'label' => 'Secrétaire Administratif et Comptable', 'ranking' => 1, 'status' => 'Salarié',
                        'members' => [MembersConstants::ISABELLE_JEDRZEJKO]
                    ]
                ],
                'Maintenance' => [
                    [
                        'label' => 'Agent d\'Entretien', 'ranking' => 1, 'status' => 'Salarié',
                        'members' => [MembersConstants::NADINE_LE_BOULC_H]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::BASKET => [
            'hierarchicalGroup' => [
                'Bureau' => [
                    [
                        'label' => 'Président/e', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [MembersConstants::EMMANUEL_GROSSEAU]
                    ],
                    [
                        'label' => 'Assistant/e', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => [MembersConstants::SARAH_TASTET]
                    ],
                    [
                        'label' => 'Trésorier/ère', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [MembersConstants::ROMAIN_CHAPEL]
                    ],
                    [
                        'label' => 'Secrétaire', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::SEVERINE_POUGHON,
                            MembersConstants::SARAH_TASTET
                        ]
                    ],
                    [
                        'label' => 'Responsable des Plannings', 'ranking' => 5, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::EMMANUEL_GROSSEAU,
                            MembersConstants::SARAH_TASTET,
                            MembersConstants::SEVERINE_POUGHON
                        ]
                    ],
                    [
                        'label' => 'Responsable des Inscriptions', 'ranking' => 6, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::CELINE_BLIN,
                            MembersConstants::BENEDICTE_CISSE
                        ]
                    ],
                    [
                        'label' => 'Responsable de la Recherche de Partenaires', 'ranking' => 7, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Responsable de la Communication', 'ranking' => 8, 'status' => 'Bénévole',
                        'members' => [MembersConstants::EVA_DA_SILVA_AZEVEDO]
                    ],
                    [
                        'label' => 'Responsable des Animations', 'ranking' => 9, 'status' => 'Bénévole',
                        'members' => [MembersConstants::EVA_DA_SILVA_AZEVEDO]
                    ],
                    [
                        'label' => 'Responsable des Tournois et des Evènements Sportifs', 'ranking' => 10, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ALBAN_GUNSBURGER,
                            MembersConstants::ROMAIN_CHAPEL
                        ]
                    ]
                ],
                'Staff Technique' => [
                    [
                        'label' => 'Educateur/trice Sportif/ve', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ALBAN_GUNSBURGER,
                            MembersConstants::PIERRE_YVES,
                            MembersConstants::TOM,
                            MembersConstants::ENZO,
                            MembersConstants::EMMANUEL_GROSSEAU
                        ]
                    ],
                    [
                        'label' => 'Educateur/trice Sportif/ve', 'ranking' => 1, 'status' => 'Salarié',
                        'members' => [MembersConstants::JEREMY_SEJOURNE]
                    ],
                    [
                        'label' => 'Apprenti/e Educateur/trice Sportif/ve', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => [MembersConstants::EVA_DA_SILVA_AZEVEDO]
                    ]
                ],
                'Coach' => [
                    [
                        'label' => 'Coach Séniors Filles 1', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [MembersConstants::PIERRE_YVES]
                    ],
                    [
                        'label' => 'Coach Séniors Filles 2', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => [MembersConstants::CHRISTINE]
                    ],
                    [
                        'label' => 'Coach Séniors Garçons 1', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [MembersConstants::ALEXIS]
                    ],
                    [
                        'label' => 'Coach Séniors Garçons 2', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => [MembersConstants::EMMANUEL_GROSSEAU]
                    ],
                    [
                        'label' => 'Coach Séniors Garçons 3', 'ranking' => 5, 'status' => 'Bénévole',
                        'members' => [MembersConstants::TOM]
                    ],
                    [
                        'label' => 'Coach U20 Garçons 1', 'ranking' => 6, 'status' => 'Bénévole',
                        'members' => [MembersConstants::EMMANUEL_GROSSEAU]
                    ],
                    [
                        'label' => 'Coach U18 Filles 1', 'ranking' => 7, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::LEA,
                            MembersConstants::EMMA
                        ]
                    ],
                    [
                        'label' => 'Coach U17 Garçons 1', 'ranking' => 8, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ALBAN_GUNSBURGER,
                            MembersConstants::TOM
                        ]
                    ],
                    [
                        'label' => 'Coach U17 Garçons 2', 'ranking' => 9, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::MAHMOUD,
                            MembersConstants::ENZO
                        ]
                    ],
                    [
                        'label' => 'Coach U15 Filles 1', 'ranking' => 10, 'status' => 'Bénévole',
                        'members' => [MembersConstants::SARAH_TASTET],

                    ],
                    [
                        'label' => 'Coach U15 Garçons 1', 'ranking' => 11, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::NATHAN,
                            MembersConstants::EIDER
                        ]
                    ],
                    [
                        'label' => 'Coach U13 Filles 1', 'ranking' => 12, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::INES,
                            MembersConstants::GUILLAUME
                        ]
                    ],
                    [
                        'label' => 'Coach U13 Filles 2', 'ranking' => 13, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ROSE,
                            MembersConstants::LOUISE,
                            MembersConstants::ANOUK
                        ]
                    ],
                    [
                        'label' => 'Coach U13 Garçons 1', 'ranking' => 14, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::JEREMY_SEJOURNE,
                            MembersConstants::ALBAN_GUNSBURGER
                        ]
                    ],
                    [
                        'label' => 'Coach U13 Garçons 2', 'ranking' => 15, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::EMMANUEL_GROSSEAU,
                            MembersConstants::CHRISTOPHE
                        ]
                    ],
                    [
                        'label' => 'Coach U13 Garçons 3', 'ranking' => 16, 'status' => 'Bénévole',
                        'members' => [MembersConstants::KHALID]
                    ],
                    [
                        'label' => 'Coach U11 Filles 1', 'ranking' => 17, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::PAULINE,
                            MembersConstants::LEA
                        ]
                    ],
                    [
                        'label' => 'Coach U11 Filles 2', 'ranking' => 18, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::LILOU,
                            MembersConstants::LOUANE
                        ]
                    ],
                    [
                        'label' => 'Coach U11 Garçons 1', 'ranking' => 19, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ELIOTT,
                            MembersConstants::NOE
                        ]
                    ],
                    [
                        'label' => 'Coach U11 Garçons 2', 'ranking' => 20, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::COLIN,
                            MembersConstants::FANTINE
                        ]
                    ],
                    [
                        'label' => 'Coach U9 Filles 1', 'ranking' => 21, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::LUCIE,
                            MembersConstants::LISA
                        ]
                    ],
                    [
                        'label' => 'Coach U9 Garçons 1', 'ranking' => 22, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::OANELL,
                            MembersConstants::GABIN
                        ]
                    ],
                    [
                        'label' => 'Coach U7 Mixte', 'ranking' => 23, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::JULIEN,
                            MembersConstants::EIDER
                        ]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::CHORALE => [
            'hierarchicalGroup' => [
                'Bureau' => [
                    [
                        'label' => 'Président/e', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [MembersConstants::ANNIE_LE_GALLIC]
                    ],
                    [
                        'label' => 'Trésorier/ère', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => [MembersConstants::MARIE_HELENE_BOUTTIER]
                    ],
                    [
                        'label' => 'Trésorier/ère Adjoint/e', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [MembersConstants::NICOLE_DANSART]
                    ],
                    [
                        'label' => 'Responsable des Concerts', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => [MembersConstants::FRANCOISE_COUET]
                    ],
                    [
                        'label' => 'Responsable de la Communication et du Site Internet', 'ranking' => 5, 'status' => 'Bénévole',
                        'members' => [MembersConstants::BERNARD_LEGENDRE]
                    ],
                    [
                        'label' => 'Chef de Choeur', 'ranking' => 6, 'status' => 'Bénévole',
                        'members' => [MembersConstants::YANNICK_JOSSE]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::DANSE => [
            'hierarchicalGroup' => [
                'Bureau' => [
                    [
                        'label' => 'Président/e', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [MembersConstants::SYLVIE_CHAUVEAU]
                    ],
                    [
                        'label' => 'Responsable Danse de Salon', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => [MembersConstants::SYLVIE_CHAUVEAU]
                    ],
                    [
                        'label' => 'Responsable Modern Jazz et Aide Active', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ANNE_ROSSIGNOL,
                            MembersConstants::DELPHINE_PETREMANN
                        ]
                    ],
                    [
                        'label' => 'Responsable Danse Bretonne', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => [MembersConstants::FREDERICK_FORTI]
                    ],
                    [
                        'label' => 'Trésorier/ère - Suivi Budgétaire et Commission Finances', 'ranking' => 5, 'status' => 'Bénévole',
                        'members' => [MembersConstants::ELIANE_BERTIN]
                    ],
                    [
                        'label' => 'Gala et Aide Active', 'ranking' => 6, 'status' => 'Bénévole',
                        'members' => [MembersConstants::LUDOVIC_TESSON]
                    ],
                    [
                        'label' => 'Gestionnaire des Fichiers Adhérents et des Inscriptions Danse de Salon', 'ranking' => 7, 'status' => 'Bénévole',
                        'members' => [MembersConstants::FRANCOIS_PATRON]
                    ],
                    [
                        'label' => 'Responsable de la Communication et de la Gestion du Site Internet', 'ranking' => 8, 'status' => 'Bénévole',
                        'members' => [MembersConstants::LEA_ROUL]
                    ]
                ],
                'Professeur' => [
                    [
                        'label' => 'Professeur/e de Danse Modern Jazz - Groupe 1', 'ranking' => 1, 'status' => 'Salarié',
                        'members' => [MembersConstants::NATHALIE_DAVIAU]
                    ],
                    [
                        'label' => 'Moniteur/trice de Danse Modern Jazz - Groupe 1', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ANNE_ROSSIGNOL,
                            MembersConstants::DELPHINE_PETREMANN
                        ]
                    ],
                    [
                        'label' => 'Professeur/e de Danse Modern Jazz - Groupe 2', 'ranking' => 3, 'status' => 'Salarié',
                        'members' => [MembersConstants::NATHALIE_DAVIAU]
                    ],
                    [
                        'label' => 'Moniteur/trice de Danse Modern Jazz - Groupe 2', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ANNE_ROSSIGNOL,
                            MembersConstants::DELPHINE_PETREMANN
                        ]
                    ],
                    [
                        'label' => 'Professeur/e de Danse Modern Jazz - Groupe 3', 'ranking' => 5, 'status' => 'Salarié',
                        'members' => [MembersConstants::NATHALIE_DAVIAU]
                    ],
                    [
                        'label' => 'Moniteur/trice de Danse Modern Jazz - Groupe 3', 'ranking' => 6, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ANNE_ROSSIGNOL,
                            MembersConstants::DELPHINE_PETREMANN
                        ]
                    ],
                    [
                        'label' => 'Professeur/e de Danse Modern Jazz - Groupe 4', 'ranking' => 7, 'status' => 'Salarié',
                        'members' => [MembersConstants::NATHALIE_DAVIAU]
                    ],
                    [
                        'label' => 'Moniteur/trice de Danse Modern Jazz - Groupe 4', 'ranking' => 8, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ANNE_ROSSIGNOL,
                            MembersConstants::DELPHINE_PETREMANN
                        ]
                    ],
                    [
                        'label' => 'Professeur/e de Danse Modern Jazz - Groupe 5', 'ranking' => 9, 'status' => 'Salarié',
                        'members' => [MembersConstants::NATHALIE_DAVIAU]
                    ],
                    [
                        'label' => 'Moniteur/trice de Danse Modern Jazz - Groupe 5', 'ranking' => 10, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ANNE_ROSSIGNOL,
                            MembersConstants::DELPHINE_PETREMANN
                        ]
                    ],
                    [
                        'label' => 'Professeur/e de Danse Modern Jazz - Groupe 6', 'ranking' => 11, 'status' => 'Salarié',
                        'members' => [MembersConstants::NATHALIE_DAVIAU]
                    ],
                    [
                        'label' => 'Moniteur/trice de Danse Modern Jazz - Groupe 6', 'ranking' => 12, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ANNE_ROSSIGNOL,
                            MembersConstants::DELPHINE_PETREMANN
                        ]
                    ],
                    [
                        'label' => 'Professeur/e de Danse Modern Jazz - Groupe 7', 'ranking' => 13, 'status' => 'Salarié',
                        'members' => [MembersConstants::NATHALIE_DAVIAU]
                    ],
                    [
                        'label' => 'Moniteur/trice de Danse Modern Jazz - Groupe 7', 'ranking' => 14, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ANNE_ROSSIGNOL,
                            MembersConstants::DELPHINE_PETREMANN
                        ]
                    ],
                    [
                        'label' => 'Professeur/e de Danse Modern Jazz - Groupe 8', 'ranking' => 15, 'status' => 'Salarié',
                        'members' => [MembersConstants::NATHALIE_DAVIAU]
                    ],
                    [
                        'label' => 'Moniteur/trice de Danse Modern Jazz - Groupe 8', 'ranking' => 16, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ANNE_ROSSIGNOL,
                            MembersConstants::DELPHINE_PETREMANN
                        ]
                    ],
                    [
                        'label' => 'Professeur/e de Danse Modern Jazz - Groupe 9', 'ranking' => 17, 'status' => 'Salarié',
                        'members' => [MembersConstants::NATHALIE_DAVIAU]
                    ],
                    [
                        'label' => 'Moniteur/trice de Danse Modern Jazz - Groupe 9', 'ranking' => 18, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ANNE_ROSSIGNOL,
                            MembersConstants::DELPHINE_PETREMANN
                        ]
                    ],
                    [
                        'label' => 'Professeur/e de Danse Modern Jazz - Groupe 10', 'ranking' => 19, 'status' => 'Salarié',
                        'members' => [MembersConstants::NATHALIE_DAVIAU]
                    ],
                    [
                        'label' => 'Moniteur/trice de Danse Modern Jazz - Groupe 10', 'ranking' => 20, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ANNE_ROSSIGNOL,
                            MembersConstants::DELPHINE_PETREMANN
                        ]
                    ],
                    [
                        'label' => 'Professeur/e de Danse de Salon - Débutant Toutes Danses', 'ranking' => 3, 'status' => 'Salarié',
                        'members' => [MembersConstants::SOPHIE_ROCHER]
                    ],
                    [
                        'label' => 'Moniteur/trice de Danse de Salon - Débutant Toutes Danses', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => [MembersConstants::SYLVIE_CHAUVEAU]
                    ],
                    [
                        'label' => 'Professeur/e de Danse de Salon - Latine Intermédiaire', 'ranking' => 3, 'status' => 'Salarié',
                        'members' => [MembersConstants::SOPHIE_ROCHER]
                    ],
                    [
                        'label' => 'Moniteur/trice de Danse de Salon - Latine Intermédiaire', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => [MembersConstants::SYLVIE_CHAUVEAU]
                    ],
                    [
                        'label' => 'Professeur/e de Danse de Salon - Rock Intermédiaire', 'ranking' => 3, 'status' => 'Salarié',
                        'members' => [MembersConstants::SOPHIE_ROCHER]
                    ],
                    [
                        'label' => 'Moniteur/trice de Danse de Salon - Rock Intermédiaire', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => [MembersConstants::SYLVIE_CHAUVEAU]
                    ],
                    [
                        'label' => 'Professeur/e de Danse Bretonne', 'ranking' => 5, 'status' => 'Salarié',
                        'members' => []
                    ],
                    [
                        'label' => 'Moniteur/trice de Danse Bretonne', 'ranking' => 6, 'status' => 'Bénévole',
                        'members' => [MembersConstants::FREDERICK_FORTI]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::FOOTBALL => [
            'hierarchicalGroup' => [
                'Présidence' => [
                    [
                        'label' => 'Président/e', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::PHILIPPE_JEANNE,
                            MembersConstants::JEROME_LEBATARD
                        ]
                    ]
                ],
                'Bureau' => [
                    [
                        'label' => 'Membre du Bureau', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::DELPHINE_ROLLAND,
                            MembersConstants::BRICE_BOYER,
                            MembersConstants::PATRICE_MARTIN,
                            MembersConstants::PATRICK_WILLOCQ,
                            MembersConstants::MARTINE_GUILLOU,
                            MembersConstants::JEAN_JACQUES_DEL_VALLE,
                            MembersConstants::STEPHANE_AUGEREAU,
                            MembersConstants::ROMAIN_PASQUEREAU,
                            MembersConstants::ALEXANDRA_DENIAUD,
                            MembersConstants::AKRAM_MECHTER,
                            MembersConstants::PASCAL_MADIOT,
                            MembersConstants::THOMAS_BOURDAUD,
                            MembersConstants::PHILIPPE_JEANNE,
                            MembersConstants::JEROME_LEBATARD
                        ]
                    ]
                ],
                'Comité de Direction' => [
                    [
                        'label' => 'Membre du Comité de Direction', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::DELPHINE_ROLLAND,
                            MembersConstants::BRICE_BOYER,
                            MembersConstants::PATRICE_MARTIN,
                            MembersConstants::PATRICK_WILLOCQ,
                            MembersConstants::PHILIPPE_JEANNE,
                            MembersConstants::JEROME_LEBATARD
                        ]
                    ]
                ],
                'Commission(s)' => [
                    [
                        'label' => 'Membre de la Commission Administration et Institutions', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Membre de la Commission Finances et Juridique', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Membre de la Commission Logistique', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Membre de la Commission Communication et Evènementiels', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Membre de la Commission Management et Ressources Humaines', 'ranking' => 5, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Membre de la Commission Ethique, Environnement, Social, Educatif', 'ranking' => 6, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Membre de la Commission Sportif', 'ranking' => 7, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Membre de la Commission Arbitrage', 'ranking' => 8, 'status' => 'Bénévole',
                        'members' => []
                    ]
                ],
                'Administration' => [
                    [
                        'label' => 'Assistant Marketing', 'ranking' => 1, 'status' => 'Salarié(e)',
                        'members' => [MembersConstants::TOM_CARTRON]
                    ],
                    [
                        'label' => 'Assistant Commercial', 'ranking' => 1, 'status' => 'Salarié(e)',
                        'members' => [MembersConstants::ANTOINE_JEANNE]
                    ]
                ],
                'Staff Technique' => [
                    [
                        'label' => 'Educateur/trice Sportif/ve', 'ranking' => 1, 'status' => 'Salarié(e)',
                        'members' => [MembersConstants::ARNAUD_AUDAIRE]
                    ],
                    [
                        'label' => 'Apprenti/e Educateur/trice Sportif/ve', 'ranking' => 1, 'status' => 'Salarié(e)',
                        'members' => [MembersConstants::ANTOINE_BARROQUIN]
                    ]
                ],
                'Dirigeant' => [
                    [
                        'label' => 'Dirigeant/e Séniors A', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ULRICH_BUCHOUX,
                            MembersConstants::JIMMY_OTHAITAVY,
                            MembersConstants::DOMINIQUE_ELEONORE
                        ]
                    ],
                    [
                        'label' => 'Dirigeant/e Séniors B', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::JAPHET_N_DORAM,
                            MembersConstants::SERGE_FEUVRAIS
                        ]
                    ],
                    [
                        'label' => 'Dirigeant/e Séniors C', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::JEAN_CHRISTOPHE_FRABOUL,
                            MembersConstants::CLEMENT_HOCHET
                        ]
                    ],
                    [
                        'label' => 'Dirigeant/e U19', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ROMAIN_MENARD,
                            MembersConstants::JEROME_LEBATARD,
                            MembersConstants::OSCAR_NJOH_LEA,
                            MembersConstants::PHILIPPE_HERVE,
                            MembersConstants::CARL_DELPLANQUE
                        ]
                    ],
                    [
                        'label' => 'Dirigeant/e U17', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ROMAIN_MENARD,
                            MembersConstants::JORGE_CASADO,
                            MembersConstants::SEBASTIEN_PACREAU,
                            MembersConstants::THOMAS_KERHERVE
                        ]
                    ],
                    [
                        'label' => 'Dirigeant/e U15', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::GWENDAL_QUERE,
                            MembersConstants::ROMAIN_MENARD,
                            MembersConstants::RAPHAEL_LIORET,
                            MembersConstants::ANTOINE_ORY
                        ]
                    ],
                    [
                        'label' => 'Dirigeant/e U14', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::NICOLAS_BRANCHEREAU,
                            MembersConstants::THEODORE_KOULE,
                            MembersConstants::RAPHAEL_LIORET,
                            MembersConstants::ROMAIN_MENARD
                        ]
                    ],
                    [
                        'label' => 'Dirigeant/e U13', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ARNAUD_BURUK,
                            MembersConstants::ESTEBAN_GROSEIL,
                            MembersConstants::EVAN_ALLARD,
                            MembersConstants::RAPHAEL_LIORET,
                            MembersConstants::NICOLAS_BRANCHEREAU,
                            MembersConstants::SERGE_COLOMB,
                            MembersConstants::DOMINIQUE_BEGRAND
                        ]
                    ],
                    [
                        'label' => 'Dirigeant/e U11', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::ARNAUD_BURUK,
                            MembersConstants::EVAN_ALLARD,
                            MembersConstants::RAPHAEL_LIORET,
                            MembersConstants::WILLIAM_HECKER,
                            MembersConstants::ANTOINE_DENIS,
                            MembersConstants::KARIM_DOUMI
                        ]
                    ],
                    [
                        'label' => 'Dirigeant/e U9', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::WILLIAM_HECKER,
                            MembersConstants::ARNAUD_BURUK,
                            MembersConstants::FABIEN_PERUGI,
                            MembersConstants::EVAN_ALLARD,
                            MembersConstants::RAPHAEL_LIORET,
                            MembersConstants::GAETAN_DOITTEAU,
                            MembersConstants::SIMON_ROY,
                            MembersConstants::JOEL_LABBE,
                            MembersConstants::PIERRE_JEAN_DANNEYROLLE,
                            MembersConstants::BRICE_ROUAUD
                        ]
                    ],
                    [
                        'label' => 'Dirigeant/e U7', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::GAETAN_DOITTEAU,
                            MembersConstants::RAPHAEL_LIORET,
                            MembersConstants::EVAN_ALLARD,
                            MembersConstants::AXEL_HAEGEMAN,
                            MembersConstants::ARNAUD_BURUK,
                            MembersConstants::ERIC_OLLIVIER,
                            MembersConstants::JOEL_LABBE,
                            MembersConstants::MALO_BOUHIER
                        ]
                    ],
                    [
                        'label' => 'Dirigeant/e Vétérans', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::JEAN_PHILIPPE_VALLEE,
                            MembersConstants::JEAN_JACQUES_DEL_VALLE
                        ]
                    ],
                    [
                        'label' => 'Dirigeant/e Loisirs', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [MembersConstants::THOMAS_BOURDAUD]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::GYM_SPORTIVE => [
            'hierarchicalGroup' => [
                'Bureau' => [
                    [
                        'label' => 'Président/e', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [MembersConstants::LAURE_BERNARD]
                    ],
                    [
                        'label' => 'Trésorier/ère', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => [MembersConstants::DOROTHEE_DUBOC]
                    ],
                    [
                        'label' => 'Secrétaire', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [MembersConstants::SYLVAIN_FINET]
                    ]
                ],
                'Entraineur/se' => [
                    [
                        'label' => 'Entraineur/se Poussines', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [MembersConstants::LAURE_BERNARD]
                    ],
                    [
                        'label' => 'Entraineur/se Jeunesses', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => [MembersConstants::LAURE_BERNARD]
                    ],
                    [
                        'label' => 'Entraineur/se Aînées', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [MembersConstants::LAURE_BERNARD]
                    ]
                ],
                'Professeur/e' => [
                    [
                        'label' => 'Professeur/e Parents-Bébé - Groupe PB', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e Eveil Gymnique - Groupe ES1015', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e Eveil Gymnique - Groupe ES1115', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e Eveil Gymnique - Groupe EM', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e Initiation Gymnique - Groupe INI', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e Poussines Loisirs - Groupe PL1', 'ranking' => 5, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e Poussines Loisirs - Groupe PL2', 'ranking' => 5, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e Poussines Loisirs - Groupe PL3', 'ranking' => 5, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e Poussines Loisirs - Groupe PL4', 'ranking' => 5, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e Poussines Loisirs - Groupe PL5', 'ranking' => 5, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e Jeunesses Loisirs - Groupe JL1', 'ranking' => 6, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e Jeunesses Loisirs - Groupe JL2', 'ranking' => 6, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e Ado-Adultes Loisirs - Groupe AA', 'ranking' => 7, 'status' => 'Bénévole',
                        'members' => []
                    ]
                ]
            ]
        ],
        OrganizationsConstants::GYM_TONIQUE => [
            'hierarchicalGroup' => [
                'Bureau' => [
                    [
                        'label' => 'Président/e', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [MembersConstants::CHRISTINE_LASSAIGNE]
                    ],
                    [
                        'label' => 'Correspondant/e', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => [MembersConstants::CELINE_NICOLLAS]
                    ],
                ],
                'Professeur/e' => [
                    [
                        'label' => 'Professeur/e de Gym Tonique - Groupe GT-MA01', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e de Gym Tonique - Groupe GT-JE01', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e de Pilates - Stretching - Groupe PS-MA01', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e de Pilates - Stretching - Groupe PS-MA02', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e de Pilates - Stretching - Groupe PS-ME01', 'ranking' => 5, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e de Pilates - Stretching - Groupe PS-ME02', 'ranking' => 6, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e de Pilates - Stretching - Groupe PS-ME03', 'ranking' => 7, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e de Hatha Yoga - Groupe HY-LU01', 'ranking' => 8, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [

                        'label' => 'Professeur/e de Hatha Yoga - Groupe HY-MA01', 'ranking' => 9, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Professeur/e de Hatha Yoga - Groupe HY-VE01', 'ranking' => 10, 'status' => 'Bénévole',
                        'members' => []
                    ]
                ]
            ]
        ],
        OrganizationsConstants::LOISIRS => [
            'hierarchicalGroup' => [
                'Bureau' => [
                    [
                        'label' => 'Président/e', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [MembersConstants::SERGE_DUCHESNE]
                    ],
                    [
                        'label' => 'Vice-Président/e, Secrétaire, Trésorier/ère', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => [MembersConstants::CLEMENT_SQUIRES]
                    ],
                    [
                        'label' => 'Gestionnaire des Concours de Belote et des Festivités', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::CHRISTINE_HARDOUIN,
                            MembersConstants::PIERRE_HARDOUIN,
                            MembersConstants::MICHEL_MOREAU
                        ]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::PETANQUE => [
            'hierarchicalGroup' => [
                'Bureau' => [
                    [
                        'label' => 'Président/e', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [MembersConstants::PHILIPPE_CASSARD]
                    ],
                    [
                        'label' => 'Vice-Président/e', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => [MembersConstants::GILLES_LANDAIS]
                    ],
                    [
                        'label' => 'Gestionnaire des Concours de Belote et des Festivités', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [MembersConstants::JEAN_PIERRE_DIEUAIDE]
                    ],
                    [
                        'label' => 'Responsable Communication', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => [MembersConstants::CAROLE_GERBAUD]
                    ],
                    [
                        'label' => 'Gestionnaire du Foyer', 'ranking' => 5, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::PHILIPPE_DUDIT,
                            MembersConstants::JOSIANE_MALVAULT,
                            MembersConstants::PASCAL_GUILLARD
                        ]
                    ],
                    [
                        'label' => 'Responsable des Concours et du Championnat', 'ranking' => 6, 'status' => 'Bénévole',
                        'members' => [MembersConstants::JACKY_GALAIS]
                    ],
                    [
                        'label' => 'Responsables des Equipements et du Terrain', 'ranking' => 7, 'status' => 'Bénévole',
                        'members' => [MembersConstants::PASCAL_CADIOT]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::TENNIS_DE_TABLE => [
            'hierarchicalGroup' => [
                'Bureau' => [
                    [
                        'label' => 'Président/e', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [MembersConstants::JEAN_FRANCOIS_RICHARD]
                    ],
                    [
                        'label' => 'Vice-Président/e', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [MembersConstants::CHRISTINE_LASSAIGNE]
                    ],
                    [
                        'label' => 'Trésorier/ère', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => [MembersConstants::MYRIAM_BOUYER]
                    ],
                    [
                        'label' => 'Secrétaire', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [MembersConstants::SYLVIE_BURTY]
                    ],
                    [
                        'label' => 'Secrétaire Adjoint/e', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [MembersConstants::LAURENCE_TREGOUET]
                    ],
                    [
                        'label' => 'Responsable Technique', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::THIERRY_GUILLERM,
                            MembersConstants::PATRICK_GOBIN
                        ]
                    ],
                    [
                        'label' => 'Responsable Communication', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [MembersConstants::PHILIPPE_METAIREAU]
                    ],
                    [
                        'label' => 'Responsable Sponsoring', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => [MembersConstants::CHARLY_GABORIAU]
                    ]
                ],
                'Staff Technique' => [
                    [
                        'label' => 'Educateur/trice Sportif', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [
                            MembersConstants::BENJAMIN_FRIGGI,
                            MembersConstants::COLIN_FRIGGI
                        ]
                    ],
                    [
                        'label' => 'Service Civique', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => [MembersConstants::YOURI_MIRALLES]
                    ]
                ],
                'Entraineurs/ses' => [
                    [
                        'label' => 'Entraineur/se Nationale 2 Garçons', 'ranking' => 1, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Nationale 3 Filles', 'ranking' => 2, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Nationale 3 Garçons', 'ranking' => 3, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Pré Nationale Garçons', 'ranking' => 4, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Régionale 1 Garçons', 'ranking' => 5, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Régionale 3 Garçons', 'ranking' => 6, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Pré Régionale Filles', 'ranking' => 7, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Départementale 0', 'ranking' => 8, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Départementale 1', 'ranking' => 9, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Départementale 2', 'ranking' => 10, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Départementale 4', 'ranking' => 11, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Jeunes 1', 'ranking' => 12, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Jeunes 2', 'ranking' => 13, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Vétérans', 'ranking' => 14, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Baby Ping', 'ranking' => 15, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Jeunes Loisirs', 'ranking' => 16, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Ado Loisirs', 'ranking' => 17, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Adultes Loisirs', 'ranking' => 18, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Section Sportive', 'ranking' => 19, 'status' => 'Bénévole',
                        'members' => []
                    ],
                    [
                        'label' => 'Entraineur/se Entreprises', 'ranking' => 20, 'status' => 'Bénévole',
                        'members' => []
                    ]
                ]
            ]
        ]
    ];
}
