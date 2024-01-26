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
            'adress' => self::ADRESS,
            'postalCode' => self::POSTAL_CODE,
            'city' => self::CITY,
            'phone' => '0981393509',
            'mail' => 'accueil@saintmedard-nantes.fr',
            'manageConvocation' => false,
            'presentation' => "
            Notre association sera bientôt centenaire et a vu le quartier évoluer au fur et à mesure des événements de société, des progrès technologiques, des modifications économiques et sociales et de l'essor des pratiques sportives et de loisirs. Elle fêtera ses cent ans en 2030 en étant sortie de la crise sanitaire avec un nombre d'adhérents sans cesse en augmentation. Et pourtant, elle reste très sensible aux conséquences de la moindre difficulté à surmonter. L'incertitude que laisse planer Nantes Métropole sur l'emplacement et la qualité des installations dont nous disposerons à l'achèvement de la ZAC Doulon-Gohards constitue la principale de ses difficultés actuelles; comment se projeter dans ce futur si proche, comment présenter aux nouveaux arrivants dans le quartier une offre d'activités correspondant à leurs besoins si les équipements à notre disposition ne sont pas à la hauteur des enjeux?
            ​Les instances de l'association comptent sur la vitalité et l'accroissement du nombre de bénévoles pour relever ce défi.",
            'historical' => "Acte de naissance de l'ASSOCIATION D'EDUCATION POPULAIRE (AEP) SAINT MEDARD DE DOULON déposé par Donatien COTTINEAU. L'objet était de 'relever par tous les moyens en son pouvoir le niveau intellectuel et moral des classes populaires'. L'officialisation s'est faite par la parution au journal officiel sous le n° 827 le 26 juin 1930. Le registre officiel a été délivré le 6 août 1930. L'association s'est affiliée à la Fédération Sportive de France à paris le 23 novembre 1931 puis à l'Union départementale sous le n° 93. Au vu des archives, la première activité exercée serait la mise en place d'une troupe théâtrale dirigée par Mme CHABOT et l'abbé BOURCIER.",
        ],
        self::BASKET => [
            'name' => 'Section Basket',
            'motto' => '',
            'adress' => self::ADRESS,
            'postalCode' => self::POSTAL_CODE,
            'city' => self::CITY,
            'phone' => '0681588985',
            'mail' => 'basket@saintmedard-nantes.fr',
            'manageConvocation' => true,
            'presentation' => "La Saint-Médard de Doulon Basket a été créée en 1935 afin de proposer aux jeunes des quartiers est de la ville de Nantes de pratiquer ce sport. Presque 90 ans plus tard, la SMD compte désormais 280 licencié.e.s réparti.e.s sur nos 20 équipes. La Saint-Médard de Doulon est fière de voir évoluer tous ces jeunes depuis l'école de basket jusqu'à leur arrivée en séniors. S'efforçant de proposer le meilleur encadrement possible à ses licencié.e.s, le club compte sur une personne salariée à temps plein spécialisée sur les équipes jeunes ainsi que sur tous ses bénévoles qui suivent, entraînent, coachent et animent le club afin d'en faire un véritable lieu de partage.
            NOTRE PHILOSOPHIE
            Notre club a toujours eu pour seule ambition de se développer afin de proposer une pratique du basket pour tous et toutes. Les conditions d'entrée sont simples : avoir l'envie de découvrir ce sport et de s'impliquer dans toutes les aventures que cela implique. Eh oui ! Le jeu d'équipe ce n'est pas seulement sur le terrain qu'on l'apprend mais aussi en dehors de ses limites. Aider, s'intéresser, participer, donner de son temps, c'est aussi cela faire partie d'une association. Et nous remercions chaleureusement tous nos bénévoles qui, chacun à leur niveau, permettent à la Saint-Médard de Doulon basket de continuer à exister et de se développer année après année.
            Nous sommes extrêmement fiers aujourd'hui de pouvoir voir évoluer des équipes dans toutes les catégories d'âges et de pouvoir proposer des créneaux à tout le monde. Pour la première fois, nous engageons une équipes en U18 filles et comptons ainsi désormais une équipe fille dans chaque catégorie d'âge. Une petite victoire pour nous car, si les garçons restent majoritaires, nous avons à cœur de favoriser la mixité dans ce sport. De la mixité, il y en a chez nous, c'est même notre essence, et c'est pour la conserver que nous essaierons toujours de proposer des tarifs de licences abordables tout en proposant des solutions pour faciliter l'adhésion à notre association.
            Apprendre le basket chez nous, c'est aussi apprendre à vivre avec les autres, à les respecter et à participer au fonctionnement de notre grande famille de la Saint-Médard de Doulon !",
            'historical' => "",
        ],
        self::CHORALE => [
            'name' => 'Section Chorale',
            'motto' => 'A Portée de Voix',
            'adress' => self::ADRESS,
            'postalCode' => self::POSTAL_CODE,
            'city' => self::CITY,
            'phone' => '0683286018',
            'mail' => 'chorale@saintmedard-nantes.fr',
            'manageConvocation' => false,
            'presentation' => "17ème Saison d'existence de la chorale A PORTEE DE VOIX
            La chorale A PORTEE DE VOIX a vu le jour le 14 septembre 2006 au sein de la section LOISIRS de la Saint Médard de Doulon.
            Yannick JOSSE a souhaité, après dix-neuf années comme choriste puis chef de pupitre, tenter l'expérience de devenir chef de choeur.Une  grosse trentaine de volontaires s'est très vite manifestée pour fonder les premières bases de cette nouvelle chorale.
            Parmi ceux-ci, majoritairement des femmes comme il est de tradition dans beaucoup de chorales, très peu d'anciens choristes  expérimentés. Ainsi, le groupe s'est vite retrouvé à l'unisson entre un chef découvrant ses toutes nouvelles fonctions et des chanteurs cherchant leur voix.
            Construite sur cette envie collective de découverte A PORTEE DE VOIX  souhaite avant tout être un groupe de personnes venant apprendre à chanter ensemble dans la bonne humeur et le respect de l'autre et cherchant avec ses moyens à interpréter du mieux possible un répertoire varié sans pour autant chercher à se prendre au sérieux.",
            'historical' => "",
        ],
        self::DANSE => [
            'name' => 'Section Danse',
            'motto' => '',
            'adress' => self::ADRESS,
            'postalCode' => self::POSTAL_CODE,
            'city' => self::CITY,
            'phone' => '0643827046',
            'mail' => 'danse@saintmedard-nantes.fr',
            'manageConvocation' => false,
            'presentation' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Diam quam nulla porttitor massa. Elementum tempus egestas sed sed. Quis commodo odio aenean sed. Amet volutpat consequat mauris nunc. Quam pellentesque nec nam aliquam sem et tortor consequat id. Vel orci porta non pulvinar. Nam at lectus urna duis. Sit amet nisl purus in mollis. In ante metus dictum at tempor commodo ullamcorper a. Nec ultrices dui sapien eget mi. Quam id leo in vitae turpis massa sed.
            Mi ipsum faucibus vitae aliquet. Cursus in hac habitasse platea dictumst. Ultrices vitae auctor eu augue ut lectus arcu bibendum. Dignissim convallis aenean et tortor at risus. Risus quis varius quam quisque id diam vel quam elementum. Sagittis purus sit amet volutpat consequat mauris nunc congue nisi. Odio facilisis mauris sit amet massa vitae. Sollicitudin tempor id eu nisl. Consectetur purus ut faucibus pulvinar. Enim eu turpis egestas pretium aenean pharetra. Urna duis convallis convallis tellus.
            Sollicitudin aliquam ultrices sagittis orci. Id leo in vitae turpis massa sed. At volutpat diam ut venenatis tellus in metus vulputate eu. Rhoncus mattis rhoncus urna neque viverra justo nec ultrices. Convallis convallis tellus id interdum. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Malesuada fames ac turpis egestas maecenas pharetra convallis. At consectetur lorem donec massa. Tellus orci ac auctor augue mauris. Lacus luctus accumsan tortor posuere ac ut consequat. Quam nulla porttitor massa id neque aliquam vestibulum morbi blandit. Luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor purus.",
            'historical' => "",
        ],
        self::FOOTBALL => [
            'name' => 'Section Football',
            'motto' => 'Plaisir, Convivialité et Formation',
            'adress' => self::ADRESS,
            'postalCode' => self::POSTAL_CODE,
            'city' => self::CITY,
            'phone' => '0240493177',
            'mail' => 'football@saintmedard-nantes.fr',
            'manageConvocation' => true,
            'presentation' => "Fondée en 1963, la section FOOTBALL de l’ASC Saint Médard, club du quartier NANTES EST, est un des clubs phares de l’agglomération nantaise. La section Football de l’ASC St Médard de Doulon est composée sur la saison 2021 / 2022 de 470 licenciés dont 50 filles, 80 dirigeants et dirigeantes, 2 arbitres, 2 salariés (un en CDI à temps complet et un en CDD à temps partiel).  Ce qui place le club dans les plus gros clubs de NANTES en termes d’effectifs. Le premier club en Loire Atlantique a avoir pérennisé en CDI le 1er emploi-jeune (emploi aidé) en activité football. Aujourd’hui un salarié en CDI (éducateur diplômé BMF) et un salarié en CDD –(diplômé BPJEPS).
            Précurseur dans le développement du FOOTBALL FEMININ en groupement avec le RACC depuis 2012 / 2013, rejoint par la St Pierre de Nantes en 2015  et depuis 2017 avec Le pin Sec. Le 22 novembre 2014 le club obtient son premier LABEL d’OR pour son Ecole de Football. Le 16 juillet 2021, le club obtient le LABEL EXCELLENCE FFF 2021-2024.
            L’équipe Seniors A évolue au niveau REGIONAL 2,  ce qui en fait le 3ème club de Nantes en terme de niveau après le FC Nantes en L1 et Bellevue en R1.
            Reconnu pour une formation de qualité pour tous, l’ADN du club est le JEU AVANT L’ENJEU. Notre priorité est l’épanouissement individuel des joueurs dans un collectif grâce à des éducateurs diplômés et une approche pédagogique bienveillante.
            Dans le cadre du projet Club SMD sur les 3 prochaines années, les membres du club s’engagent au quotidien pour faire vivre le club avec nos valeurs Plaisir-Convivialité-Formation. Toutes les actions sont menées dans le projet associatif, éducatif, sportif, encadrement et formation de la Saint Médard Doulon Nantes. Pour réaliser ces nombreuses missions nécessaires au bon fonctionnement du club et dans le respect du projet Club SMD, nous avons la chance de compter sur la participation des membres impliqués dans les différentes commissions du club, au bureau et au comité directeur.",
            'historical' => "",
        ],
        self::GYM_SPORTIVE => [
            'name' => 'Section Gym Sportive',
            'motto' => '',
            'adress' => self::ADRESS,
            'postalCode' => self::POSTAL_CODE,
            'city' => self::CITY,
            'phone' => '0681314457',
            'mail' => 'gym-sportive@saintmedard-nantes.fr',
            'manageConvocation' => true,
            'presentation' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Diam quam nulla porttitor massa. Elementum tempus egestas sed sed. Quis commodo odio aenean sed. Amet volutpat consequat mauris nunc. Quam pellentesque nec nam aliquam sem et tortor consequat id. Vel orci porta non pulvinar. Nam at lectus urna duis. Sit amet nisl purus in mollis. In ante metus dictum at tempor commodo ullamcorper a. Nec ultrices dui sapien eget mi. Quam id leo in vitae turpis massa sed.
            Mi ipsum faucibus vitae aliquet. Cursus in hac habitasse platea dictumst. Ultrices vitae auctor eu augue ut lectus arcu bibendum. Dignissim convallis aenean et tortor at risus. Risus quis varius quam quisque id diam vel quam elementum. Sagittis purus sit amet volutpat consequat mauris nunc congue nisi. Odio facilisis mauris sit amet massa vitae. Sollicitudin tempor id eu nisl. Consectetur purus ut faucibus pulvinar. Enim eu turpis egestas pretium aenean pharetra. Urna duis convallis convallis tellus.
            Sollicitudin aliquam ultrices sagittis orci. Id leo in vitae turpis massa sed. At volutpat diam ut venenatis tellus in metus vulputate eu. Rhoncus mattis rhoncus urna neque viverra justo nec ultrices. Convallis convallis tellus id interdum. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Malesuada fames ac turpis egestas maecenas pharetra convallis. At consectetur lorem donec massa. Tellus orci ac auctor augue mauris. Lacus luctus accumsan tortor posuere ac ut consequat. Quam nulla porttitor massa id neque aliquam vestibulum morbi blandit. Luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor purus.",
            'historical' => "",
        ],
        self::GYM_TONIQUE => [
            'name' => 'Section Gym Tonique, Pilates, Yoga',
            'motto' => '',
            'adress' => self::ADRESS,
            'postalCode' => self::POSTAL_CODE,
            'city' => self::CITY,
            'phone' => '0663813495',
            'mail' => 'gym-tonique@saintmedard-nantes.fr',
            'manageConvocation' => false,
            'presentation' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Diam quam nulla porttitor massa. Elementum tempus egestas sed sed. Quis commodo odio aenean sed. Amet volutpat consequat mauris nunc. Quam pellentesque nec nam aliquam sem et tortor consequat id. Vel orci porta non pulvinar. Nam at lectus urna duis. Sit amet nisl purus in mollis. In ante metus dictum at tempor commodo ullamcorper a. Nec ultrices dui sapien eget mi. Quam id leo in vitae turpis massa sed.
            Mi ipsum faucibus vitae aliquet. Cursus in hac habitasse platea dictumst. Ultrices vitae auctor eu augue ut lectus arcu bibendum. Dignissim convallis aenean et tortor at risus. Risus quis varius quam quisque id diam vel quam elementum. Sagittis purus sit amet volutpat consequat mauris nunc congue nisi. Odio facilisis mauris sit amet massa vitae. Sollicitudin tempor id eu nisl. Consectetur purus ut faucibus pulvinar. Enim eu turpis egestas pretium aenean pharetra. Urna duis convallis convallis tellus.
            Sollicitudin aliquam ultrices sagittis orci. Id leo in vitae turpis massa sed. At volutpat diam ut venenatis tellus in metus vulputate eu. Rhoncus mattis rhoncus urna neque viverra justo nec ultrices. Convallis convallis tellus id interdum. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Malesuada fames ac turpis egestas maecenas pharetra convallis. At consectetur lorem donec massa. Tellus orci ac auctor augue mauris. Lacus luctus accumsan tortor posuere ac ut consequat. Quam nulla porttitor massa id neque aliquam vestibulum morbi blandit. Luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor purus.",
            'historical' => "",
        ],
        self::LOISIRS => [
            'name' => 'Section Loisirs',
            'motto' => '',
            'adress' => self::ADRESS,
            'postalCode' => self::POSTAL_CODE,
            'city' => self::CITY,
            'phone' => '0616936391',
            'mail' => 'loisirs@saintmedard-nantes.fr',
            'manageConvocation' => false,
            'presentation' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Diam quam nulla porttitor massa. Elementum tempus egestas sed sed. Quis commodo odio aenean sed. Amet volutpat consequat mauris nunc. Quam pellentesque nec nam aliquam sem et tortor consequat id. Vel orci porta non pulvinar. Nam at lectus urna duis. Sit amet nisl purus in mollis. In ante metus dictum at tempor commodo ullamcorper a. Nec ultrices dui sapien eget mi. Quam id leo in vitae turpis massa sed.
            Mi ipsum faucibus vitae aliquet. Cursus in hac habitasse platea dictumst. Ultrices vitae auctor eu augue ut lectus arcu bibendum. Dignissim convallis aenean et tortor at risus. Risus quis varius quam quisque id diam vel quam elementum. Sagittis purus sit amet volutpat consequat mauris nunc congue nisi. Odio facilisis mauris sit amet massa vitae. Sollicitudin tempor id eu nisl. Consectetur purus ut faucibus pulvinar. Enim eu turpis egestas pretium aenean pharetra. Urna duis convallis convallis tellus.
            Sollicitudin aliquam ultrices sagittis orci. Id leo in vitae turpis massa sed. At volutpat diam ut venenatis tellus in metus vulputate eu. Rhoncus mattis rhoncus urna neque viverra justo nec ultrices. Convallis convallis tellus id interdum. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Malesuada fames ac turpis egestas maecenas pharetra convallis. At consectetur lorem donec massa. Tellus orci ac auctor augue mauris. Lacus luctus accumsan tortor posuere ac ut consequat. Quam nulla porttitor massa id neque aliquam vestibulum morbi blandit. Luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor purus.",
            'historical' => "",
        ],
        self::PETANQUE => [
            'name' => 'Section Pétanque',
            'motto' => '',
            'adress' => self::ADRESS,
            'postalCode' => self::POSTAL_CODE,
            'city' => self::CITY,
            'phone' => '0650478720',
            'mail' => 'petanque@saintmedard-nantes.fr',
            'manageConvocation' => false,
            'presentation' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Diam quam nulla porttitor massa. Elementum tempus egestas sed sed. Quis commodo odio aenean sed. Amet volutpat consequat mauris nunc. Quam pellentesque nec nam aliquam sem et tortor consequat id. Vel orci porta non pulvinar. Nam at lectus urna duis. Sit amet nisl purus in mollis. In ante metus dictum at tempor commodo ullamcorper a. Nec ultrices dui sapien eget mi. Quam id leo in vitae turpis massa sed.
            Mi ipsum faucibus vitae aliquet. Cursus in hac habitasse platea dictumst. Ultrices vitae auctor eu augue ut lectus arcu bibendum. Dignissim convallis aenean et tortor at risus. Risus quis varius quam quisque id diam vel quam elementum. Sagittis purus sit amet volutpat consequat mauris nunc congue nisi. Odio facilisis mauris sit amet massa vitae. Sollicitudin tempor id eu nisl. Consectetur purus ut faucibus pulvinar. Enim eu turpis egestas pretium aenean pharetra. Urna duis convallis convallis tellus.
            Sollicitudin aliquam ultrices sagittis orci. Id leo in vitae turpis massa sed. At volutpat diam ut venenatis tellus in metus vulputate eu. Rhoncus mattis rhoncus urna neque viverra justo nec ultrices. Convallis convallis tellus id interdum. Cursus eget nunc scelerisque viverra mauris in aliquam sem. Malesuada fames ac turpis egestas maecenas pharetra convallis. At consectetur lorem donec massa. Tellus orci ac auctor augue mauris. Lacus luctus accumsan tortor posuere ac ut consequat. Quam nulla porttitor massa id neque aliquam vestibulum morbi blandit. Luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor purus.",
            'historical' => "",
        ],
        self::TENNIS_DE_TABLE => [
            'name' => 'Section Tennis de Table',
            'motto' => '',
            'adress' => self::ADRESS,
            'postalCode' => self::POSTAL_CODE,
            'city' => self::CITY,
            'phone' => '0611962890',
            'mail' => 'secretariattt@saintmedard-nantes.fr',
            'manageConvocation' => false,
            'presentation' => "La section Tennis de Table de l'ASC Saint-Médard de Doulon :
            C'est 13 équipesen championnat :
            - 1 Nationale 2 Garçons
            - 1 Nationale 3 Garçons
            - 1 Nationale 3 Filles
            - 1 Pré Nationale Garçons
            - 1 Régionale 1 Garçons
            - 1 Régionale 3 Garçons
            - 1 Pré Régionale Filles
            - 1 Départementale 0
            - 1 Départementale 1 
            - 1 Départementales 2
            - 1 Départementale 4
            - 2 Equipes jeunes
            C'est encore​...
            Une salle spécifique avec 9 tables pouvant accueillir toutes personnes désirant faire du tennis de table en loisir comme en compétition.
            Plusieurs groupes d'entrainements de niveaux variés, une section sportive, des créneaux baby ping, loisirs adultes et jeunes permettent à chacun et chacune de vivre sa passion à sa manière.
            Un club house où l'on peut se détendre et refaire le monde après ou avant les matchs !!!
            Jeunes, très jeunes, moins jeunes, garçons comme filles vous serez accueillis dans un club familial, convivial où il fait bon jouer au tennis de table !!
            C'est une équipe dirigeante et d'entraineurs à votre écoute !
            La présence de 2 éducateurs sportifs, d'un service civique et de nombreux bénévoles (entraîneurs, administratifs, arbitres) contribuent à la bonne progression des jeunes joueuses et joueurs du club.
            Ils ont également permis de hisser « la Saint-Méd» au rang desmeilleurs clubs formateurs de la région,avec à la clé un beau palmarès auréolé de quelques titres de champions de France.
            C'est pour finir 5 partenaires qui​font confiance au club de Nantes Saint Médard de Doulon.
            - Soprema
            - Re/Max
            - Super U
            - Butterfly
            - La ville de Nantes",
            'historical' => "",
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
