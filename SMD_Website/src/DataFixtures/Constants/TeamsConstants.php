<?php

namespace App\DataFixtures\Constants;

class TeamsConstants
{
    public const ORGANIZATIONS = [
        OrganizationsConstants::FOOTBALL => [
            'categories' => [
                [
                    'label' => 'Séniors',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'Séniors A',
                            'trainingSlot' => [
                                'La Plaine de Jeux Audubon - Le Mardi de 19:45 à 21:15',
                                'La Plaine de Jeux Audubon - Le Jeudi de 19:45 à 21:15',
                            ],
                            'posts' => ['Dirigeant/e Séniors A'],
                        ],
                        [
                            'name' => 'Séniors B',
                            'trainingSlot' => [
                                'La Plaine de Jeux Audubon - Le Mardi de 19:45 à 21:15',
                                'La Plaine de Jeux Audubon - Le Jeudi de 19:45 à 21:15',
                            ],
                            'posts' => ['Dirigeant/e Séniors B'],
                        ],
                        [
                            'name' => 'Séniors C',
                            'trainingSlot' => [
                                'La Plaine de Jeux Audubon - Le Mercredi de 21:00 à 22:15',
                                'La Plaine de Jeux Audubon - Le Vendredi de 19:30 à 21:00',
                            ],
                            'posts' => ['Dirigeant/e Séniors C'],
                        ],
                    ],
                ],
                [
                    'label' => 'U19',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U19',
                            'trainingSlot' => [
                                'La Plaine de Jeux Audubon - Le Mercredi de 19:30 à 21:00',
                                'La Plaine de Jeux Audubon - Le Vendredi de 19:30 à 21:00',
                            ],
                            'posts' => ['Dirigeant/e U19'],
                        ],
                    ],
                ],
                [
                    'label' => 'U17',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U17',
                            'trainingSlot' => [
                                'La Plaine de Jeux Audubon - Le Lundi de 19:30 à 21:00',
                                'La Plaine de Jeux Audubon - Le Mercredi de 19:00 à 20:30',
                            ],
                            'posts' => ['Dirigeant/e U17'],
                        ],
                    ],
                ],
                [
                    'label' => 'U15',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U15',
                            'trainingSlot' => [
                                'La Plaine de Jeux Audubon - Le Mardi de 18:00 à 19:30',
                                'La Plaine de Jeux Audubon - Le Jeudi de 18:00 à 19:30',
                            ],
                            'posts' => ['Dirigeant/e U15'],
                        ],
                        [
                            'name' => 'U14',
                            'trainingSlot' => [
                                'La Plaine de Jeux Audubon - Le Mardi de 18:00 à 19:30',
                                'La Plaine de Jeux Audubon - Le Jeudi de 18:00 à 19:30',
                            ],
                            'posts' => ['Dirigeant/e U14'],
                        ],
                    ],
                ],
                [
                    'label' => 'U13',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U13',
                            'trainingSlot' => [
                                'La Plaine de Jeux Audubon - Le Lundi de 18:00 à 19:15',
                                'La Plaine de Jeux Audubon - Le Mercredi de 17:30 à 18:45',
                            ],
                            'posts' => ['Dirigeant/e U13'],
                        ],
                    ],
                ],
                [
                    'label' => 'U11',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U11',
                            'trainingSlot' => [
                                'La Plaine de Jeux Audubon - Le Mercredi de 16:00 à 17:15',
                                'La Plaine de Jeux Audubon - Le Vendredi de 18:00 à 19:15',
                            ],
                            'posts' => ['Dirigeant/e U11'],
                        ],
                    ],
                ],
                [
                    'label' => 'U9',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U9',
                            'trainingSlot' => [
                                'La Plaine de Jeux Audubon - Le Mercredi de 14:30 à 15:45',
                            ],
                            'posts' => ['Dirigeant/e U9'],
                        ],
                    ],
                ],
                [
                    'label' => 'U7',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U7',
                            'trainingSlot' => [
                                'La Plaine de Jeux Audubon - Le Mercredi de 14:30 à 15:45',
                            ],
                            'posts' => ['Dirigeant/e U7'],
                        ],
                    ],
                ],
                [
                    'label' => 'Groupement Féminin',
                    'competition' => false,
                    'teams' => [
                        [
                            'name' => 'Groupement Féminin',
                            'trainingSlot' => [],
                            'posts' => [],
                        ],
                    ],
                ],
                [
                    'label' => 'Vétérans',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'Vétérans',
                            'trainingSlot' => [
                                'La Plaine de Jeux Audubon - Le Mardi de 14:30 à 15:30',
                            ],
                            'posts' => ['Dirigeant/e Vétérans'],
                        ],
                    ],
                ],
                [
                    'label' => 'Loisirs',
                    'competition' => false,
                    'teams' => [
                        [
                            'name' => 'Loisirs',
                            'trainingSlot' => [],
                            'posts' => ['Dirigeant/e Loisirs'],
                        ],
                    ],
                ],
                [
                    'label' => 'Arbitres',
                    'competition' => false,
                    'teams' => [
                        [
                            'name' => 'Arbitres',
                            'trainingSlot' => [],
                            'posts' => [],
                        ],
                    ],
                ],
            ],
        ],
        OrganizationsConstants::BASKET => [
            'categories' => [
                [
                    'label' => 'Séniors',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'Séniors Filles 1',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mercredi de 21:00 à 22:30',
                                'Gymnase de Toutes-Aides - Le Vendredi de 20:00 à 22:00',
                            ],
                            'posts' => ['Coach Séniors Filles 1'],
                        ],
                        [
                            'name' => 'Séniors Filles 2',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Jeudi de 21:15 à 22:45',
                            ],
                            'posts' => ['Coach Séniors Filles 2'],
                        ],
                        [
                            'name' => 'Séniors Garçons 1',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mardi de 21:00 à 22:30',
                                'Gymnase de Doulon - Le Jeudi de 21:00 à 22:30',
                            ],
                            'posts' => ['Coach Séniors Garçons 1'],
                        ],
                        [
                            'name' => 'Séniors Garçons 2',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Vendredi de 21:00 à 22:30',
                            ],
                            'posts' => ['Coach Séniors Garçons 2'],
                        ],
                        [
                            'name' => 'Séniors Garçons 3',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mardi de 19:30 à 21:00',
                            ],
                            'posts' => ['Coach Séniors Garçons 3'],
                        ],
                    ],
                ],
                [
                    'label' => 'U20',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U20 Garçons 1',
                            'trainingSlot' => [
                                'Gymnase du CIFAM - Le Lundi de 19:00 à 20:30',
                                'Gymnase Raphaël Lebel - Le Vendredi de 21:00 à 22:30',
                            ],
                            'posts' => ['Coach U20 Garçons 1'],
                        ],
                    ],
                ],
                [
                    'label' => 'U18',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U18 Filles 1',
                            'trainingSlot' => [
                                'Gymnase de la Colinière - Le Lundi de 18:00 à 19:45',
                                'Gymnase de Doulon - Le Mercredi de 19:45 à 21:00',
                            ],
                            'posts' => ['Coach U18 Filles 1'],
                        ],
                    ],
                ],
                [
                    'label' => 'U17',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U17 Garçons 1',
                            'trainingSlot' => [
                                'Gymnase Raphaël Lebel - Le Lundi de 18:30 à 20:00',
                                'Gymnase de Doulon - Le Mardi de 19:30 à 21:00',
                                'Gymnase Raphaël Lebel - Le Vendredi de 19:30 à 21:00',
                            ],
                            'posts' => ['Coach U17 Garçons 1'],
                        ],
                        [
                            'name' => 'U17 Garçons 2',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mardi de 19:30 à 21:00',
                                'Gymnase Raphaël Lebel - Le Vendredi de 19:30 à 21:00',
                            ],
                            'posts' => ['Coach U17 Garçons 2'],
                        ],
                    ],
                ],
                [
                    'label' => 'U15',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U15 Filles 1',
                            'trainingSlot' => [
                                'Gymnase de la Colinière - Le Lundi de 18:00 à 19:45',
                                'Gymnase de Doulon - Le Vendredi de 19:30 à 20:45',
                            ],
                            'posts' => ['Coach U15 Filles 1'],
                        ],
                        [
                            'name' => 'U15 Garçons 1',
                            'trainingSlot' => [
                                'Gymnase de la Colinière - Le Mercredi de 18:00 à 19:30',
                                'Gymnase de Doulon - Le Vendredi de 19:30 à 20:45',
                            ],
                            'posts' => ['Coach U15 Garçons 1'],
                        ],
                    ],
                ],
                [
                    'label' => 'U13',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U13 Filles 1',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mercredi de 17:15 à 18:30',
                                'Gymnase de la Colinière - Le Jeudi de 18:00 à 19:30',
                            ],
                            'posts' => ['Coach U13 Filles 1'],
                        ],
                        [
                            'name' => 'U13 Filles 2',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mercredi de 17:15 à 18:30',
                                'Gymnase de la Colinière - Le Jeudi de 18:00 à 19:30',
                            ],
                            'posts' => ['Coach U13 Filles 2'],
                        ],
                        [
                            'name' => 'U13 Garçons 1',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mardi de 18:00 à 19:30',
                                'Gymnase de Doulon - Le Mercredi de 18:30 à 19:45',
                            ],
                            'posts' => ['Coach U13 Garçons 1'],
                        ],
                        [
                            'name' => 'U13 Garçons 2',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mercredi de 18:30 à 19:45',
                                'Gymnase de la Colinière - Le Jeudi de 18:00 à 19:30',
                            ],
                            'posts' => ['Coach U13 Garçons 2'],
                        ],
                        [
                            'name' => 'U13 Garçons 3',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mercredi de 18:30 à 19:45',
                                'Gymnase de la Colinière - Le Jeudi de 18:00 à 19:30',
                            ],
                            'posts' => ['Coach U13 Garçons 3'],
                        ],
                    ],
                ],
                [
                    'label' => 'U11',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U11 Filles 1',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mercredi de 14:45 à 16:00',
                                'Gymnase de Doulon - Le Vendredi de 18:15 à 19:30',
                            ],
                            'posts' => ['Coach U11 Filles 1'],
                        ],
                        [
                            'name' => 'U11 Filles 2',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mercredi de 14:45 à 16:00',
                                'Gymnase de Doulon - Le Vendredi de 18:15 à 19:30',
                            ],
                            'posts' => ['Coach U11 Filles 2'],
                        ],
                        [
                            'name' => 'U11 Garçons 1',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mercredi de 16:00 à 17:15',
                                'Gymnase de Doulon - Le Vendredi de 18:15 à 19:30',
                            ],
                            'posts' => ['Coach U11 Garçons 1'],
                        ],
                        [
                            'name' => 'U11 Garçons 2',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mercredi de 16:00 à 17:15',
                                'Gymnase de Doulon - Le Vendredi de 18:15 à 19:30',
                            ],
                            'posts' => ['Coach U11 Garçons 2'],
                        ],
                    ],
                ],
                [
                    'label' => 'U9',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U9 Filles',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mercredi de 13:30 à 14:45',
                                'Gymnase de Doulon - Le Vendredi de 17:00 à 18:15',
                            ],
                            'posts' => ['Coach U9 Filles 1'],
                        ],
                        [
                            'name' => 'U9 Garçons',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Mercredi de 13:30 à 14:45',
                                'Gymnase de Doulon - Le Vendredi de 17:00 à 18:15',
                            ],
                            'posts' => ['Coach U9 Garçons 1'],
                        ],
                    ],
                ],
                [
                    'label' => 'U7',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'U7 Mixte',
                            'trainingSlot' => [
                                'Gymnase de Doulon - Le Samedi de 10:00 à 11:00',
                                'Gymnase de Doulon - Le Samedi de 11:15 à 12:15',
                            ],
                            'posts' => ['Coach U7 Mixte'],
                        ],
                    ],
                ],
            ],
        ],
        OrganizationsConstants::TENNIS_DE_TABLE => [
            'categories' => [
                [
                    'label' => 'Nationale',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'Nationale 2 Garçons',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mardi de 19:00 à 20:30',
                                'Salle Roger Corbard - Le Jeudi de 19:00 à 20:30',
                            ],
                            'posts' => [
                                'Entraineur/se Nationale 2 Garçons',
                            ],
                        ],
                        [
                            'name' => 'Nationale 3 Filles',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mardi de 19:00 à 20:30',
                                'Salle Roger Corbard - Le Jeudi de 19:00 à 20:30',
                            ],
                            'posts' => [
                                'Entraineur/se Nationale 3 Filles',
                            ],
                        ],
                        [
                            'name' => 'Nationale 3 Garçons',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mardi de 19:00 à 20:30',
                                'Salle Roger Corbard - Le Jeudi de 19:00 à 20:30',
                            ],
                            'posts' => [
                                'Entraineur/se Nationale 3 Garçons',
                            ],
                        ],
                        [
                            'name' => 'Pré Nationale Garçons',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mardi de 19:00 à 20:30',
                                'Salle Roger Corbard - Le Jeudi de 19:00 à 20:30',
                            ],
                            'posts' => [
                                'Entraineur/se Pré Nationale Garçons',
                            ],
                        ],
                    ],
                ],
                [
                    'label' => 'Régionale',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'Régionale 1 Garçons',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mardi de 19:00 à 20:30',
                                'Salle Roger Corbard - Le Jeudi de 19:00 à 20:30',
                            ],
                            'posts' => [
                                'Entraineur/se Régionale 1 Garçons',
                            ],
                        ],
                        [
                            'name' => 'Régionale 3 Garçons',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mardi de 19:00 à 20:30',
                                'Salle Roger Corbard - Le Jeudi de 19:00 à 20:30',
                            ],
                            'posts' => [
                                'Entraineur/se Régionale 3 Garçons',
                            ],
                        ],
                        [
                            'name' => 'Pré Régionale Filles',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mardi de 19:00 à 20:30',
                                'Salle Roger Corbard - Le Jeudi de 19:00 à 20:30',
                            ],
                            'posts' => [
                                'Entraineur/se Pré Régionale Filles',
                            ],
                        ],
                    ],
                ],
                [
                    'label' => 'Départementale',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'Départementale 0',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mardi de 20:30 à 22:00',
                            ],
                            'posts' => [
                                'Entraineur/se Départementale 0',
                            ],
                        ],
                        [
                            'name' => 'Départementale 1',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mardi de 20:30 à 22:00',
                            ],
                            'posts' => [
                                'Entraineur/se Départementale 1',
                            ],
                        ],
                        [
                            'name' => 'Départementale 2',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mardi de 20:30 à 22:00',
                            ],
                            'posts' => [
                                'Entraineur/se Départementale 2',
                            ],
                        ],
                        [
                            'name' => 'Départementale 4',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mardi de 20:30 à 22:00',
                            ],
                            'posts' => [
                                'Entraineur/se Départementale 4',
                            ],
                        ],
                    ],
                ],
                [
                    'label' => 'Jeunes',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'Jeunes 1',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Lundi de 17:00 à 19:00',
                                'Salle Roger Corbard - Le Mercredi de 16:30 à 18:30',
                            ],
                            'posts' => [
                                'Entraineur/se Jeunes 1',
                            ],
                        ],
                        [
                            'name' => 'Jeunes 2',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mardi de 17:00 à 19:00',
                                'Salle Roger Corbard - Le Jeudi de 17:00 à 19:00',
                            ],
                            'posts' => [
                                'Entraineur/se Jeunes 2',
                            ],
                        ],
                    ],
                ],
                [
                    'label' => 'Vétérans',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'Vétérans',
                            'trainingSlot' => [
                                'Salle Roger Corbard - Le Mardi de 10:00 à 12:00',
                                'Salle Roger Corbard - Le Jeudi de 10:00 à 12:00',
                            ],
                            'posts' => [
                                'Entraineur/se Vétérans',
                            ],
                        ],
                    ],
                ],
            ],
        ],
        OrganizationsConstants::GYM_SPORTIVE => [
            'categories' => [
                [
                    'label' => 'Poussines',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'Poussines Compétition 6-9 ans (Féminine)',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Lundi de 17:15 à 19:00',
                                'Salle Henri Loiret - Le Vendredi de 17:15 à 18:45',
                            ],
                            'posts' => ['Entraineur/se Poussines'],
                        ],
                    ],
                ],
                [
                    'label' => 'Jeunesses',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'Jeunesses Compétition 10-13 ans (Féminine)',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Lundi de 18:45 à 20:30',
                                'Salle Henri Loiret - Le Vendredi de 18:30 à 20:15',
                            ],
                            'posts' => ['Entraineur/se Jeunesses'],
                        ],
                    ],
                ],
                [
                    'label' => 'Aînées',
                    'competition' => true,
                    'teams' => [
                        [
                            'name' => 'Aînées Compétition 14 ans et + (Féminine)',
                            'trainingSlot' => [
                                'Salle Henri Loiret - Le Mercredi de 15:00 à 16:45',
                                'Salle Henri Loiret - Le Vendredi de 20:00 à 21:45',
                            ],
                            'posts' => ['Entraineur/se Aînées'],
                        ],
                    ],
                ],
            ],
        ],
    ];
}
