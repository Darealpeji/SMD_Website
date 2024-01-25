<?php

namespace App\DataFixtures\Constants;

class TimeSlotsConstants
{
    public const SALLE_ETIENNE_LANDAIS_TRAINING_TIME_SLOTS = 'salle_etienne_landais_training_time_slots';
    public const SALLE_HENRI_LOIRET_TRAINING_TIME_SLOTS = 'salle_henri_loiret_training_time_slots';
    public const SALLE_DANSE_TRAINING_TIME_SLOTS = 'salle_danse_training_time_slots';
    public const SALLE_ROGER_CORBARD_TRAINING_TIME_SLOTS = 'salle_roger_corbard_training_time_slots';
    public const PLAINE_JEUX_AUDUBON_TRAINING_TIME_SLOTS = 'plaine_jeux_audubon_training_time_slots';
    public const GYMNASE_DOULON_TRAINING_TIME_SLOTS = 'gymnase_doulon_training_time_slots';
    public const GYMNASE_COLINIERE_TRAINING_TIME_SLOTS = 'gymnase_coliniere_training_time_slots';
    public const GYMNASE_RAPHAEL_LEBEL_TRAINING_TIME_SLOTS = 'gymnase_raphael_lebel_training_time_slots';
    public const GYMNASE_CIFAM_TRAINING_TIME_SLOTS = 'gymnase_cifam_training_time_slots';
    public const GYMNASE_TOUTES_AIDES_TRAINING_TIME_SLOTS = 'gymnase_toutes_aides_training_time_slots';
    public const TERRAIN_LOUETTRIE_TRAINING_TIME_SLOTS = 'terrain_louettrie_training_time_slots';

    public const TRAINING_TIME_SLOTS = [
        self::SALLE_ETIENNE_LANDAIS_TRAINING_TIME_SLOTS => [
            ActivityPlacesConstants::SALLE_ETIENNE_LANDAIS => [
                'day' => [
                    'Lundi' => [
                        'startTimeSlot' => ['13:30', '19:00'],
                        'endTimeSlot' => ['17:30', '20:15'],
                    ],
                    'Mardi' => [
                        'startTimeSlot' => ['19:00'],
                        'endTimeSlot' => ['20:15'],
                    ],
                    'Mercredi' => [
                        'startTimeSlot' => ['18:15', '19:15', '20:15'],
                        'endTimeSlot' => ['19:15', '20:15', '21:15'],
                    ],
                    'Jeudi' => [
                        'startTimeSlot' => ['20:15'],
                        'endTimeSlot' => ['22:15'],
                    ],
                ],
            ],
        ],
        self::SALLE_HENRI_LOIRET_TRAINING_TIME_SLOTS => [
            ActivityPlacesConstants::SALLE_HENRI_LOIRET => [
                'day' => [
                    'Lundi' => [
                        'startTimeSlot' => ['17:15', '17:15', '18:45'],
                        'endTimeSlot' => ['18:45', '19:00', '20:30'],
                    ],
                    'Mercredi' => [
                        'startTimeSlot' => ['10:00', '10:45', '13:30', '15:00'],
                        'endTimeSlot' => ['10:45', '12:15', '15:00', '16:45'],
                    ],
                    'Jeudi' => [
                        'startTimeSlot' => ['16:45', '18:15', '19:45'],
                        'endTimeSlot' => ['18:15', '19:45', '21:15'],
                    ],
                    'Vendredi' => [
                        'startTimeSlot' => ['17:00', '17:15', '18:30', '20:00', '20:00'],
                        'endTimeSlot' => ['18:30', '18:45', '20:15', '21:30', '21:45'],
                    ],
                    'Samedi' => [
                        'startTimeSlot' => ['9:15', '10:15', '11:15'],
                        'endTimeSlot' => ['10:00', '11:00', '12:00'],
                    ],
                ],
            ],
        ],
        self::SALLE_DANSE_TRAINING_TIME_SLOTS => [
            ActivityPlacesConstants::SALLE_DANSE => [
                'day' => [
                    'Mardi' => [
                        'startTimeSlot' => ['18:15', '19:45'],
                        'endTimeSlot' => ['19:30', '21:00'],
                    ],
                    'Mercredi' => [
                        'startTimeSlot' => ['14:15', '15:45', '19:00', '20:05', '20:55'],
                        'endTimeSlot' => ['15:30', '17:00', '20:00', '20:50', '21:40'],
                    ],
                    'Jeudi' => [
                        'startTimeSlot' => ['18:15', '19:45'],
                        'endTimeSlot' => ['19:30', '21:00'],
                    ],
                    'Vendredi' => [
                        'startTimeSlot' => ['10:30', '18:15', '19:45'],
                        'endTimeSlot' => ['11:45', '19:30', '21:00'],
                    ],
                    'Samedi' => [
                        'startTimeSlot' => ['9:15', '10:45'],
                        'endTimeSlot' => ['10:30', '12:00'],
                    ],
                    'Dimanche' => [
                        'startTimeSlot' => ['15:00'],
                        'endTimeSlot' => ['18:00'],
                    ],
                ],
            ],
        ],
        self::SALLE_ROGER_CORBARD_TRAINING_TIME_SLOTS => [
            ActivityPlacesConstants::SALLE_ROGER_CORBARD => [
                'day' => [
                    'Lundi' => [
                        'startTimeSlot' => ['16:00', '17:00', '19:00'],
                        'endTimeSlot' => ['19:00', '19:00', '22:00'],
                    ],
                    'Mardi' => [
                        'startTimeSlot' => ['10:00', '12:00', '16:00', '17:00', '19:00', '20:30'],
                        'endTimeSlot' => ['12:00', '13:30', '19:00', '19:00', '20:30', '22:00'],
                    ],
                    'Mercredi' => [
                        'startTimeSlot' => ['13:30', '15:00', '16:30', '16:30', '18:30'],
                        'endTimeSlot' => ['15:00', '16:30', '18:30', '18:30', '20:30'],
                    ],
                    'Jeudi' => [
                        'startTimeSlot' => ['10:00', '12:00', '16:00', '17:00', '19:00', '20:30'],
                        'endTimeSlot' => ['12:00', '13:30', '19:00', '19:00', '20:30', '22:00'],
                    ],
                    'Vendredi' => [
                        'startTimeSlot' => ['17:00', '18:00', '19:00', '20:30'],
                        'endTimeSlot' => ['18:00', '19:00', '20:30', '22:00'],
                    ],
                ],
            ],
        ],
        self::PLAINE_JEUX_AUDUBON_TRAINING_TIME_SLOTS => [
            ActivityPlacesConstants::PLAINE_JEUX_AUDUBON => [
                'day' => [
                    'Lundi' => [
                        'startTimeSlot' => ['18:00', '19:30'],
                        'endTimeSlot' => ['19:15', '21:00'],
                    ],
                    'Mardi' => [
                        'startTimeSlot' => ['14:30', '18:00', '19:45'],
                        'endTimeSlot' => ['15:30', '19:30', '21:15'],
                    ],
                    'Mercredi' => [
                        'startTimeSlot' => ['14:30', '16:00', '17:30', '19:00', '19:30', '21:00'],
                        'endTimeSlot' => ['15:45', '17:15', '18:45', '20:30', '21:00', '22:15'],
                    ],
                    'Jeudi' => [
                        'startTimeSlot' => ['18:00', '19:45'],
                        'endTimeSlot' => ['19:30', '21:15'],
                    ],
                    'Vendredi' => [
                        'startTimeSlot' => ['18:00', '19:30'],
                        'endTimeSlot' => ['19:15', '21:00'],
                    ]
                ],
            ],
        ],
        self::GYMNASE_DOULON_TRAINING_TIME_SLOTS => [
            ActivityPlacesConstants::GYMNASE_DOULON => [
                'day' => [
                    'Mardi' => [
                        'startTimeSlot' => ['18:00', '19:30', '21:00'],
                        'endTimeSlot' => ['19:30', '21:00', '22:30'],
                    ],
                    'Mercredi' => [
                        'startTimeSlot' => ['13:30', '14:45', '16:00', '17:15', '18:30', '19:45', '21:00'],
                        'endTimeSlot' => ['14:45', '16:00', '17:15', '18:30', '19:45', '21:00', '22:30'],
                    ],
                    'Jeudi' => [
                        'startTimeSlot' => ['18:00', '19:30', '21:00', '21:15'],
                        'endTimeSlot' => ['19:30', '21:15', '22:30', '22:45'],
                    ],
                    'Vendredi' => [
                        'startTimeSlot' => ['17:00', '18:15', '19:30', '21:00'],
                        'endTimeSlot' => ['18:15', '19:30', '20:45', '22:30'],
                    ],
                    'Samedi' => [
                        'startTimeSlot' => ['9:00', '10:00', '11:15'],
                        'endTimeSlot' => ['10:00', '11:00', '12:15'],
                    ],
                ],
            ],
        ],
        self::GYMNASE_COLINIERE_TRAINING_TIME_SLOTS => [
            ActivityPlacesConstants::GYMNASE_COLINIERE => [
                'day' => [
                    'Lundi' => [
                        'startTimeSlot' => ['18:00'],
                        'endTimeSlot' => ['19:45'],
                    ],
                    'Mercredi' => [
                        'startTimeSlot' => ['18:00'],
                        'endTimeSlot' => ['19:30'],
                    ],
                    'Jeudi' => [
                        'startTimeSlot' => ['18:00'],
                        'endTimeSlot' => ['19:30'],
                    ],
                ],
            ],
        ],
        self::GYMNASE_RAPHAEL_LEBEL_TRAINING_TIME_SLOTS => [
            ActivityPlacesConstants::GYMNASE_RAPHAEL_LEBEL => [
                'day' => [
                    'Lundi' => [
                        'startTimeSlot' => ['18:30'],
                        'endTimeSlot' => ['20:00'],
                    ],
                    'Mardi' => [
                        'startTimeSlot' => ['20:00'],
                        'endTimeSlot' => ['22:00'],
                    ],
                    'Jeudi' => [
                        'startTimeSlot' => ['20:00'],
                        'endTimeSlot' => ['22:00'],
                    ],
                    'Vendredi' => [
                        'startTimeSlot' => ['19:30', '21:00'],
                        'endTimeSlot' => ['21:00', '22:30'],
                    ],
                ],
            ],
        ],
        self::GYMNASE_CIFAM_TRAINING_TIME_SLOTS => [
            ActivityPlacesConstants::GYMNASE_CIFAM => [
                'day' => [
                    'Lundi' => [
                        'startTimeSlot' => ['19:00', '20:30'],
                        'endTimeSlot' => ['20:30', '22:00'],
                    ],
                ],
            ],
        ],
        self::GYMNASE_TOUTES_AIDES_TRAINING_TIME_SLOTS => [
            ActivityPlacesConstants::GYMNASE_TOUTES_AIDES => [
                'day' => [
                    'Mardi' => [
                        'startTimeSlot' => ['18:00', '19:00', '20:00'],
                        'endTimeSlot' => ['19:00', '20:00', '21:00'],
                    ],
                    'Jeudi' => [
                        'startTimeSlot' => ['18:30'],
                        'endTimeSlot' => ['19:30'],
                    ],
                    'Vendredi' => [
                        'startTimeSlot' => ['20:00'],
                        'endTimeSlot' => ['22:00'],
                    ],
                ],
            ],
        ],
        self::TERRAIN_LOUETTRIE_TRAINING_TIME_SLOTS => [
            ActivityPlacesConstants::TERRAIN_LOUETTRIE => [
                'day' => [
                    'Mardi' => [
                        'startTimeSlot' => ['14:30'],
                        'endTimeSlot' => ['19:00'],
                    ],
                    'Jeudi' => [
                        'startTimeSlot' => ['14:30'],
                        'endTimeSlot' => ['19:00'],
                    ],
                    'Samedi' => [
                        'startTimeSlot' => ['14:30'],
                        'endTimeSlot' => ['19:00'],
                    ],
                ],
            ],
        ],
    ];
}
