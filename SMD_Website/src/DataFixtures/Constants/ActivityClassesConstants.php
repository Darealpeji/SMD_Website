<?php

namespace App\DataFixtures\Constants;

class ActivityClassesConstants
{
    public const CLASSES_SCHEDULE = [
        OrganizationsConstants::CHORALE => [
            'activities' => [
                [
                    'label' => 'Chorale',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Répétitions',
                            'trainingSlot' => [
                                'Salle Etienne Landais - Le Jeudi de 20:15 à 22:15'
                            ],
                            'posts' => ['Chef de Choeur']
                        ]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::DANSE => [
            'activities' => [
                [
                    'label' => 'Modern Jazz',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Groupe 1',
                            'trainingSlot' => [
                                'Salle de Danse - Le Mercredi de 14:15 à 15:30'
                            ],
                            'posts' => [
                                'Professeur/e de Danse Modern Jazz - Groupe 1',
                                'Moniteur/trice de Danse Modern Jazz - Groupe 1'
                            ]
                        ],
                        [
                            'name' => 'Groupe 2',
                            'trainingSlot' => [
                                'Salle de Danse - Le Mercredi de 15:45 à 17:00'
                            ],
                            'posts' => [
                                'Professeur/e de Danse Modern Jazz - Groupe 2',
                                'Moniteur/trice de Danse Modern Jazz - Groupe 2'
                            ]
                        ],
                        [
                            'name' => 'Groupe 3',
                            'trainingSlot' => [
                                'Salle de Danse - Le Samedi de 09:15 à 10:30'
                            ],
                            'posts' => [
                                'Professeur/e de Danse Modern Jazz - Groupe 3',
                                'Moniteur/trice de Danse Modern Jazz - Groupe 3'
                            ]
                        ],
                        [
                            'name' => 'Groupe 4',
                            'trainingSlot' => [
                                'Salle de Danse - Le Samedi de 10:45 à 12:00'
                            ],
                            'posts' => [
                                'Professeur/e de Danse Modern Jazz - Groupe 4',
                                'Moniteur/trice de Danse Modern Jazz - Groupe 4'
                            ]
                        ],
                        [
                            'name' => 'Groupe 5',
                            'trainingSlot' => [
                                'Salle de Danse - Le Mardi de 18:15 à 19:30'
                            ],
                            'posts' => [
                                'Professeur/e de Danse Modern Jazz - Groupe 5',
                                'Moniteur/trice de Danse Modern Jazz - Groupe 5'
                            ]
                        ],
                        [
                            'name' => 'Groupe 6',
                            'trainingSlot' => [
                                'Salle de Danse - Le Mardi de 19:45 à 21:00'
                            ],
                            'posts' => [
                                'Professeur/e de Danse Modern Jazz - Groupe 6',
                                'Moniteur/trice de Danse Modern Jazz - Groupe 6'
                            ]
                        ],
                        [
                            'name' => 'Groupe 7',
                            'trainingSlot' => [
                                'Salle de Danse - Le Jeudi de 18:15 à 19:30'
                            ],
                            'posts' => [
                                'Professeur/e de Danse Modern Jazz - Groupe 7',
                                'Moniteur/trice de Danse Modern Jazz - Groupe 7'
                            ]
                        ],
                        [
                            'name' => 'Groupe 8',
                            'trainingSlot' => [
                                'Salle de Danse - Le Jeudi de 19:45 à 21:00'
                            ],
                            'posts' => [
                                'Professeur/e de Danse Modern Jazz - Groupe 8',
                                'Moniteur/trice de Danse Modern Jazz - Groupe 8'
                            ]
                        ],
                        [
                            'name' => 'Groupe 9',
                            'trainingSlot' => [
                                'Salle de Danse - Le Vendredi de 18:15 à 19:30'
                            ],
                            'posts' => [
                                'Professeur/e de Danse Modern Jazz - Groupe 9',
                                'Moniteur/trice de Danse Modern Jazz - Groupe 9'
                            ]
                        ],
                        [
                            'name' => 'Groupe 10',
                            'trainingSlot' => [
                                'Salle de Danse - Le Vendredi de 19:45 à 21:00'
                            ],
                            'posts' => [
                                'Professeur/e de Danse Modern Jazz - Groupe 10',
                                'Moniteur/trice de Danse Modern Jazz - Groupe 10'
                            ]
                        ]
                    ]
                ],
                [
                    'label' => 'Danse de Salon',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Débutant Toutes Danses',
                            'trainingSlot' => [
                                'Salle de Danse - Le Mercredi de 19:00 à 20:00'
                            ],
                            'posts' => [
                                'Professeur/e de Danse de Salon - Débutant Toutes Danses',
                                'Moniteur/trice de Danse de Salon - Débutant Toutes Danses'
                            ]
                        ],
                        [
                            'name' => 'Latine Intermédiaire',
                            'trainingSlot' => [
                                'Salle de Danse - Le Mercredi de 20:05 à 20:50'
                            ],
                            'posts' => [
                                'Professeur/e de Danse de Salon - Latine Intermédiaire',
                                'Moniteur/trice de Danse de Salon - Latine Intermédiaire'
                            ]
                        ],
                        [
                            'name' => 'Rock Intermédiaire',
                            'trainingSlot' => [
                                'Salle de Danse - Le Mercredi de 20:55 à 21:40'
                            ],
                            'posts' => [
                                'Professeur/e de Danse de Salon - Rock Intermédiaire',
                                'Moniteur/trice de Danse de Salon - Rock Intermédiaire'
                            ]
                        ]
                    ]
                ],
                [
                    'label' => 'Danse Bretonne',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Danse Bretonne',
                            'trainingSlot' => [
                                'Salle de Danse - Le Dimanche de 15:00 à 18:00'
                            ],
                            'posts' => [
                                'Professeur/e de Danse Bretonne',
                                'Moniteur/trice de Danse Bretonne'
                            ]
                        ]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::GYM_SPORTIVE => [
            'activities' => [
                [
                    'label' => 'Parents-Bébé 1-2 ans (Mixte)',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Parents-Bébé - Groupe PB',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Samedi de 09:15 à 10:00'
                            ],
                            'posts' => ['Professeur/e Parents-Bébé - Groupe PB']
                        ]
                    ]
                ],
                [
                    'label' => 'Eveil Gymnique 3 ans (Mixte)',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Eveil Gymnique - Groupe ES1015',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Samedi de 10:15 à 11:00'
                            ],
                            'posts' => ['Professeur/e Eveil Gymnique - Groupe ES1015']
                        ]
                    ]
                ],
                [
                    'label' => 'Eveil Gymnique 4-5 ans (Mixte)',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Eveil Gymnique - Groupe ES1115',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Samedi de 11:15 à 12:00'
                            ],
                            'posts' => ['Professeur/e Eveil Gymnique - Groupe ES1115']
                        ],
                        [
                            'name' => 'Eveil Gymnique - Groupe EM',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Mercredi de 10:00 à 10:45'
                            ],
                            'posts' => ['Professeur/e Eveil Gymnique - Groupe EM']
                        ]
                    ]
                ],
                [
                    'label' => 'Initiation Gymnique 5-6 ans (Féminine)',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Initiation Gymnique - Groupe INI',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Mercredi de 13:30 à 15:00'
                            ],
                            'posts' => ['Professeur/e Initiation Gymnique - Groupe INI']
                        ]
                    ]
                ],
                [
                    'label' => 'Poussines Loisirs 6-9 ans (Féminine)',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Poussines Loisirs - Groupe PL1',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Lundi de 17:15 à 18:45'
                            ],
                            'posts' => ['Professeur/e Poussines Loisirs - Groupe PL1']
                        ],
                        [
                            'name' => 'Poussines Loisirs - Groupe PL2',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Mercredi de 10:45 à 12:15'
                            ],
                            'posts' => ['Professeur/e Poussines Loisirs - Groupe PL2']
                        ],
                        [
                            'name' => 'Poussines Loisirs - Groupe PL3',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Mercredi de 13:30 à 15:00'
                            ],
                            'posts' => ['Professeur/e Poussines Loisirs - Groupe PL3']
                        ],
                        [
                            'name' => 'Poussines Loisirs - Groupe PL4',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Jeudi de 16:45 à 18:15'
                            ],
                            'posts' => ['Professeur/e Poussines Loisirs - Groupe PL4']
                        ],
                        [
                            'name' => 'Poussines Loisirs - Groupe PL5',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Vendredi de 17:00 à 18:30'
                            ],
                            'posts' => ['Professeur/e Poussines Loisirs - Groupe PL5']
                        ]
                    ]
                ],
                [
                    'label' => 'Jeunesses Loisirs 10-13 ans (Féminine)',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Jeunesses Loisirs - Groupe JL1',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Jeudi de 18:15 à 19:45'
                            ],
                            'posts' => ['Professeur/e Jeunesses Loisirs - Groupe JL1']
                        ],
                        [
                            'name' => 'Jeunesses Loisirs - Groupe JL2',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Jeudi de 19:45 à 21:15'
                            ],
                            'posts' => ['Professeur/e Jeunesses Loisirs - Groupe JL2']
                        ]
                    ]
                ],
                [
                    'label' => 'Ado-Adultes Loisirs 14 ans et + (Féminine)',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Ado-Adultes Loisirs - Groupe AA',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Vendredi de 20:00 à 21:30'
                            ],
                            'posts' => ['Professeur/e Ado-Adultes Loisirs - Groupe AA']
                        ]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::GYM_TONIQUE => [
            'activities' => [
                [
                    'label' => 'Gym Tonique',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Groupe GT-MA01',
                            'trainingSlot' => [
                                'Gymnase de Toutes-Aides - Le Mardi de 19:00 à 20:00'
                            ],
                            'posts' => ['Professeur/e de Gym Tonique - Groupe GT-MA01']
                        ],
                        [
                            'name' => 'Groupe GT-JE01',
                            'trainingSlot' => [
                                'Gymnase de Toutes-Aides - Le Jeudi de 18:30 à 19:30'
                            ],
                            'posts' => ['Professeur/e de Gym Tonique - Groupe GT-JE01']
                        ]
                    ]
                ],
                [
                    'label' => 'Pilates - Stretching',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Groupe PS-MA01',
                            'trainingSlot' => [
                                'Gymnase de Toutes-Aides - Le Mardi de 18:00 à 19:00'
                            ],
                            'posts' => ['Professeur/e de Pilates - Stretching - Groupe PS-MA01']
                        ],
                        [
                            'name' => 'Groupe PS-MA02',
                            'trainingSlot' => [
                                'Gymnase de Toutes-Aides - Le Mardi de 20:00 à 21:00'
                            ],
                            'posts' => ['Professeur/e de Pilates - Stretching - Groupe PS-MA02']
                        ],
                        [
                            'name' => 'Groupe PS-ME01',
                            'trainingSlot' => [
                                'Salle Etienne Landais - Le Mercredi de 18:15 à 19:15'
                            ],
                            'posts' => ['Professeur/e de Pilates - Stretching - Groupe PS-ME01']
                        ],
                        [
                            'name' => 'Groupe PS-ME02',
                            'trainingSlot' => [
                                'Salle Etienne Landais - Le Mercredi de 19:15 à 20:15'
                            ],
                            'posts' => ['Professeur/e de Pilates - Stretching - Groupe PS-ME02']
                        ],
                        [
                            'name' => 'Groupe PS-ME03',
                            'trainingSlot' => [
                                'Salle Etienne Landais - Le Mercredi de 20:15 à 21:15'
                            ],
                            'posts' => ['Professeur/e de Pilates - Stretching - Groupe PS-ME03']
                        ]
                    ]
                ],
                [
                    'label' => 'Hatha Yoga',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Groupe HY-LU01',
                            'trainingSlot' => [
                                'Salle Etienne Landais - Le Lundi de 19:00 à 20:15'
                            ],
                            'posts' => ['Professeur/e de Hatha Yoga - Groupe HY-LU01']
                        ],
                        [
                            'name' => 'Groupe HY-MA01',
                            'trainingSlot' => [
                                'Salle Etienne Landais - Le Mardi de 19:00 à 20:15'
                            ],
                            'posts' => ['Professeur/e de Hatha Yoga - Groupe HY-MA01']
                        ],
                        [
                            'name' => 'Groupe HY-VE01',
                            'trainingSlot' => [
                                'Salle de Danse - Le Vendredi de 10:30 à 11:45'
                            ],
                            'posts' => ['Professeur/e de Hatha Yoga - Groupe HY-VE01']
                        ]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::LOISIRS => [
            'activities' => [
                [
                    'label' => 'Loisirs',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Belote & Tarots',
                            'trainingSlot' => [
                                'Salle Etienne Landais - Le Lundi de 13:30 à 17:30'
                            ],
                            'posts' => []
                        ]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::PETANQUE => [
            'activities' => [
                [
                    'label' => 'Pétanque',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Pétanque',
                            'trainingSlot' => [
                                'Terrain de la Louettrie - Le Mardi de 14:30 à 19:00',
                                'Terrain de la Louettrie - Le Jeudi de 14:30 à 19:00',
                                'Terrain de la Louettrie - Le Samedi de 14:30 à 19:00'
                            ],
                            'posts' => []
                        ]
                    ]
                ]
            ]
        ],
        OrganizationsConstants::TENNIS_DE_TABLE => [
            'activities' => [
                [
                    'label' => 'Baby Ping 4-7 ans',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Baby Ping',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Vendredi de 17:00 à 18:00'
                            ],
                            'posts' => ['Entraineur/se Baby Ping']
                        ]
                    ]
                ],
                [
                    'label' => 'Jeunes Loisirs 8-12 ans',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Jeunes Loisirs',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mercredi de 13:30 à 15:00',
                                'Salle Roger Corbard - Le Vendredi de 18:00 à 19:00'
                            ],
                            'posts' => ['Entraineur/se Jeunes Loisirs']
                        ]
                    ]
                ],
                [
                    'label' => 'Ado Loisirs 13-18 ans',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Ado Loisirs',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mercredi de 15:00 à 16:30',
                                'Salle Roger Corbard - Le Vendredi de 19:00 à 20:30'
                            ],
                            'posts' => ['Entraineur/se Ado Loisirs']
                        ]
                    ]
                ],
                [
                    'label' => 'Adultes Loisirs',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Adultes Loisirs',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Lundi de 19:00 à 22:00',
                                'Salle Roger Corbard - Le Vendredi de 20:30 à 22:00'
                            ],
                            'posts' => ['Entraineur/se Adultes Loisirs']
                        ]
                    ]
                ],
                [
                    'label' => 'Section Sportive',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Section Sportive',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Lundi de 16:00 à 19:00',
                                'Salle Roger Corbard - Le Mardi de 16:00 à 19:00',
                                'Salle Roger Corbard - Le Mercredi de 16:30 à 18:30',
                                'Salle Roger Corbard - Le Jeudi de 16:00 à 19:00'
                            ],
                            'posts' => ['Entraineur/se Section Sportive']
                        ]
                    ]
                ],
                [
                    'label' => 'Entreprises',
                    'competition' => false,
                    'activityClasses' => [
                        [
                            'name' => 'Entreprises',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mardi de 12:00 à 13:30',
                                'Salle Roger Corbard - Le Jeudi de 12:00 à 13:30',
                            ],
                            'posts' => ['Entraineur/se Entreprises']
                        ]
                    ]
                ]
            ]
        ]
    ];
}
