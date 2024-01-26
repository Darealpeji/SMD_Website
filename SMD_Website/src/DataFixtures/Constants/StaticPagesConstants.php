<?php

namespace App\DataFixtures\Constants;

use App\DataFixtures\Constants\MembersConstants;

class StaticPagesConstants
{
    public const ORGANIZATIONS = [
        OrganizationsConstants::ASSOCIATION => [
            [
                'name' => 'ASC Saint Médard de Doulon - Nantes - Documents',
                'slug' => 'documents',
                'staticPageContents' => [
                    [
                        'title' => '',
                        'content' =>
                        '<h4>DOCUMENTS A TÉLÉCHARGER</h4><br>
                        Les statuts de l\'association : <br>
                        Le réglement intérieur : <br>
                        Le projet sportf :'
                    ]
                ]
            ]
        ],
        OrganizationsConstants::BASKET => [
            [
                'name' => 'Section Basket - L\'Ecole d\'Arbitrage',
                'slug' => 'l-ecole-d-arbitrage',
                'staticPageContents' => [
                    [
                        'title' => 'CONTACT',
                        'content' =>
                        "Alice Corgnet :<br>
                        06 67 10 55 80<br>
                        alice.devise@gmail.com"
                    ]
                ]
            ]
        ],
        OrganizationsConstants::CHORALE => [
            [
                'name' => 'Section Chorale - Répertoire',
                'slug' => 'repertoire',
                'staticPageContents' => [
                    [
                        'title' => '',
                        'content' =>
                        "Le répertoire d'une chorale est en quelque sorte à la fois sa carte d'identité et son livret de famille. On y lit le style recherché (le plus souvent par le chef de choeur) et l'évolution de celui-ci au fil du temps.<br>
                        A PORTEE DE VOIX n'échappera pas à cette règle.<br>
                        Ce répertoire a vocation à balayer toutes les époques et différents styles musicaux. Par souci de consonance, on peut dire qu'il va de Mozart à Gainsbar, ou de Bach à Louise Attaque ou encore de Vivaldi à Françoise Hardy. La chanson en français y est privilégiée au début, mais une place est faite pour toutes les musiques du monde.<br>
                        Le souhait, tant des choristes que du chef de chœur, est de construire un répertoire de chants  peu ou pas interprétés par les autres chorales des environs de façon à forger une image propre à A PORTEE DE VOIX tout en intégrant des 'incontournables' pour pouvoir les chanter avec d'autres chœurs.​​​<br>
                        ​Le répertoire de la saison 2022/2023 comprendra outre quelques reprises compte tenu de l'arrêt COVID, les chants suivants :<br>
                        <ul>
                        <li>Nous</li>
                        <li>J'y vais</li>
                        <li>Tu es mon autre</li>
                        <li>Couleur menthe à l'eau</li>
                        <li>La complainte de Pablo Néruda</li>
                        <li>Donnez moi</li>
                        <li>Le Turbot de Pornic</li>
                        <li>​Tombé du ciel</li>
                        <li>Amazing Grace</li>
                        </ul>"
                    ]
                ]
            ],
            [
                'name' => 'Section Chorale - Modalités de Travail',
                'slug' => 'modalite-de-travail',
                'staticPageContents' => [
                    [
                        'title' => 'Les Répétitions',
                        'content' =>
                        "La répétition, c'est le temps fort de la vie de toute chorale.<br>
                        <br>
                        Sans répétition, il n'y a pas de chorale possible puisqu'aucune définition commune de l'interprétation d'une oeuvre n'aura pu être mise en place. Dans une chorale sans prétention comme  A PORTEE DE VOIX , la répétition répond à plusieurs besoins:<br>
                        <ul>
                        <li>Permettre aux choristes de mieux se connaître.</li>
                        <li>Apprendre à bien respirer et à mieux poser sa voix.</li>
                        <li>Apprendre la ligne mélodique des nouveaux chants.</li>
                        <li>Définir les nuances et autres expressions pour les chants une fois ceux-ci appris.</li>
                        <li>Travailler la mise en place de ces nuances à 2, 3 ou 4 voix suivant les chants.</li>
                        <li>Chanter pour le seul plaisir de chanter.</li>
                        </ul>
                        <br>
                        Sur ces principes, les répétitions se déroulent chaque jeudi soir de début septembre à juin, à part quelques rares exceptions comme les jours fériés et les absences du chef de choeur, de 20 H 30 à 22 H15. Pour commencer à l'heure, il est nécessaire d'arriver en avance. La salle est ouverte au plus tard à 20 H 15; il faut prendre le temps d'installer celle-ci, tout en conservant un temps précieux pour se saluer et échanger les nouvelles de la semaine écoulée. Le respect des horaires est avec l'assiduité une des rares exigences dans le bon fonctionnement de la chorale. Comme il est inconcevable de démarrer un chant en ordre dispersé, il est très dommage de ne pas tous participer à l'ensemble de la répétition.<br>
                        A 20 H 30, la séance commence par :<br>
                        <ul>
                        <li>L'échauffement: Pendant une quinzaine de minutes se succèdent d'abord les exercices de décontraction physique basés sur les étirements légers et la respiration profonde (le tout dans le calme après le 'léger' brouhaha des retrouvailles), puis le travail sur la prise de note et l'échauffement progressif de la voix et enfin les exercices sur l'articulation et la 'couleur' des sons.<br>
                        Ensuite vient :</li>
                        <li>L'apprentissage: La découverte d'un nouveau chant est à chaque fois le début d'une nouvelle aventure. Cet apprentissage peut se faire en groupe, chaque pupitre découvrant sa propre mélodie et écoutant celle des autres pupitres, ou bien de plus en plus souvent en se séparant, chaque pupitre utilisant le CD de travail guidé par le chef de pupitre qui aura préparé la séance avec le chef de choeur. Tout le monde se retrouve ensuite pour :</li>
                        <li>La mise en place: C'est la phase d'assemblage du travail de chaque pupitre qui permet au chef de choeur de corriger ou d'ajuster certains passages moins bien maîtrisés et petit à petit d'intégrer les nuances de chaque pupitre ou globales du choeur. Ce sont ces trois phases de travail qui permettent :</li>
                        <li>Le chant: La fin de la répétition (de 15 à 30 minutes selon les séances) est consacrée à chanter en choeur. Soit la dernière oeuvre travaillée si elle est suffisamment avancée, soit des morceaux mieux maîtrisés et c'est l'occasion de repréciser les nuances ou de corriger de petites approximations. D'une manière générale, chaque répétition s'achève par un chant bien connu de façon à finir quoiqu'il arrive sur une 'bonne note'.</li>
                        </ul><br>
                        Car, il est alors 22 H 15 et les voix commencent à fatiguer, la séance ayant été bien remplie; c'est donc le moment de se séparer jusqu'à la semaine prochaine, ou parfois jusqu'au mardi suivant. En effet, lorsqu'un jeudi est férié, la répétition est avancée au mardi pour ne pas perdre le rythme d'apprentissage ou bien, à l'approche d'un concert, il peut s'avérer nécessaire d'ajouter une répétition pour assurer les chants et diminuer la charge de travail de la répétition du jeudi."
                    ],
                    [
                        'title' => 'Le Travail Individuel',
                        'content' =>
                        "Le travail individuel du choriste peut être défini sur deux plans: en répétition et hors répétition.<br>
                        <br>
                        En répétition, le choriste est soit en phase active , c'est à dire qu'il chante en suivant les directives orales et gestuelles du chef de choeur, soit en phase d'écoute , c'est à dire que, son pupitre ne chantant pas, il écoute les autres pupitres travailler et/ou le chef donner des indications sur l'interprétation. Pour conserver la mémoire de ces indications, il est très utile d'avoir en permanence un crayon à papier. Cela permet de noter les précisions données et ainsi de palier au besoin les carences de la mémoire défaillante du chef.<br>
                        <br>
                        Hors répétition, le choriste n'a pas d'obligation particulière vu qu'il n'a pas le chef sur le dos . Par contre, s'il veut faire plaisir au chef, le choriste aura à coeur d'apprendre les paroles des différents chants. Ce travail personnel offre l'avantage de ne pas avoir le nez dans la partition et de pouvoir ainsi porter un regard attentif (les regards admiratifs   sont aussi autorisés à condition qu'ils restent attentifs) sur le chef de façon à bien suivre ses indications.<br>
                        <br>
                        De même, tous les matins à l'abri des regards (la meilleure solution étant de s'enfermer dans la salle de bain), le choriste peut (doit?) reprendre les exercices utilisés à l'échauffement le jeudi soir. Prendre l'habitude de bien respirer et de bien placer sa voix se ressentira très rapidement au niveau collectif, mais en plus constitue un apport non négligeable dans la vie quotidienne car cela facilite notamment la prise de parole en public ou aide aussi à se relacher (notamment les exercices de respiration) lorsque des moments de tension se font sentir.<br>
                        <br>
                        Le choriste qui souhaite progresser dans l'apprentissage des chants, ou simplement les réviser, trouve plusieurs possibilités à sa disposition suivant ses connaissances musicales, la disposition d'un instrument (clavier de préférence), ou s'il dispose d'une connexion internet.<br>
                        <br>
                        Toutefois, par souci d'offrir à tous une base de travail commune, chaque choriste recevra le plus tôt possible un lien vers des fichiers MP3 (dit 'de travail', car le chef n'a peur de rien) sur lequel il trouvera pour chacun des chants mis au programme la mélodie de son pupitre chantée avec les paroles par une voix de synthèse ainsi que pour les mêmes chants la mélodie du pupitre accompagnée en fond sonore par les autres voix de façon à trouver les repères avec les autres pupitres.<br>
                        <br>
                        L'espace de ce site réservé aux choristes comprend également des fichiers permettant de travailler les chants au format mp3 de façon à varier les possibilités de révision des chants (au volant, dans le jardin, en vacances ou en déplacement par exemple)."
                    ]
                ]
            ]
        ],
        OrganizationsConstants::FOOTBALL => [
            [
                'name' => 'Section Football - P.E.F.',
                'slug' => 'p-e-f',
                'staticPageContents' => [
                    [
                        'title' => 'Le Programme Éducatif Fédéral (PEF) offre aux éducateurs de nouveaux outils pédagogiques pour forme les jeunes licencié(e)s.',
                        'content' =>
                        "Lancé en 2014 par la FFF, le Programme Éducatif Fédéral (PEF) est un outil pédagogique complet, mis à la disposition des ligues, districts, clubs amateurs et professionnels, dirigeants et éducateurs, pour former les jeunes licencié(e)s U6 à U19 (5 à 18 ans) aux règles de jeux et de vie. Il concerne 800 000 jeunes licencié(e)s et plus de 5 600 clubs l'utilisent déjà.<br>
                        <br>
                        Cette saison, la FFF mets à disposition une nouvelle version de son programme éducatif, enrichie de soixante nouvelles fiches pratiques. Ce classeur a été remis aux clubs ayant assité à la réunion du 20 janvier 2018.<br>
                        <br>
                        Celles-ci se déclinent sur les six thématiques du P.E.F. :<br>
                        <ul>
                        <li>1. Santé</li>
                        <li>2. Engagement citoyen</li>
                        <li>3. Environnement</li>
                        <li>4. Fair-play</li>
                        <li>5. Règles du jeu/arbitrage</li>
                        <li>6. Culture foot</li>
                        </ul>
                        Elles proposent trois types d'actions :<br>
                        <ul>
                        <li>Les 'actions en salle' (indoor)</li>
                        <li>Les 'actions de terrain' (outdoor)</li>
                        <li>Les 'actions d'envergures' qui peuvent mombiliser l'ensemble du club, par exemple autour d'une opération solidaire.</li>
                        </ul>"
                    ],
                    [
                        'title' => 'De  nouveaux quiz associés à l\'animation de ces trois ateliers ont également été ajoutés',
                        'content' =>
                        ""
                    ],
                    [
                        'title' => 'Le nouveau classeur est disponible en version numérique',
                        'content' =>
                        '<a href="https://foot44.fff.fr/simple/le-nouveau-classeur-pef-en-version-numerique/" target="_blank">https://foot44.fff.fr/simple/le-nouveau-classeur-pef-en-version-numerique/</a>'
                    ]
                ]
            ],
            [
                'name' => 'Section Football - Plan Cité Foot',
                'slug' => 'plan-cite-foot',
                'staticPageContents' => [
                    [
                        'title' => 'Plan Cité Foot, l’accompagnement des clubs de football nantais',
                        'content' =>
                        "Le plan Cité Foot est un plan de développement du football dans les quartiers nantais financés par la ville de Nantes.<br>
                        <br>
                        Cette opération vise à promouvoir les valeurs citoyennes et le développement du football pour toutes et tous en améliorant la structuration des clubs : construction de terrains synthétiques, aide à la formation etc.<br>
                        <br>
                        Nantes compte près de 7 000 licenciés de football.<br>
                        <br>
                        Pour permettre à tous ces pratiquants et aux nombreux autres amateurs de faire du foot dans de bonnes conditions, la Ville de Nantes se dote de terrains synthétiques.<br>
                        <br>
                        Mise en œuvre dans tous les quartiers de la ville, la construction de ces terrains s’inscrit dans le plan Cité Foot."
                    ],
                    [
                        'title' => 'LE STADE MARCEL-SAUPIN EST LE THÉÂTRE DU TOURNOI AMICAL CITÉ FOOT',
                        'content' =>
                        "C’est devenu l’un des temps forts du calendrier sportif nantais : Cité Foot, dédié aux U10/U11 ans des clubs nantais, prend possession du stade Marcel Saupin.<br>
                        <br>
                        Pour une grande journée de football «basée sur les valeurs positives du sport : tolérance, intégration, respect des différences, sport sans violence et citoyen» précise la Ville, organisatrice de cet événement, en partenariat avec le District de football de Loire-Atlantique. Et en collaboration étroite avec les clubs de la Saint-Yves et de La Mellinet."
                    ]
                ]
            ],
            [
                'name' => 'Section Football - Réglement et Charte',
                'slug' => 'reglement-et-charte',
                'staticPageContents' => [
                    [
                        'title' => '',
                        'content' =>
                        "Photo de la charte"
                    ]
                ]
            ],
            [
                'name' => 'Section Football - Groupement Féminin',
                'slug' => 'groupement-feminin',
                'staticPageContents' => [
                    [
                        'title' => 'Présentation',
                        'content' =>
                        'Issue du rapprochement des sections féminines des clubs du RACC, de la Saint Médard de Doulon, de La Saint Pierre de Nantes et de Pin Sec, le Groupement Féminin Nantes Est vous accueille.<br>
                        <br>
                        Contact: Jérôme Menard – 06 18 71 74 57<br>
                        <br>
                        Liens internet du Groupement Féminin Nantes Est :<br>
                        <a href="https://gfne.fr/" target="_blank">Site Internet</a><br>
                        <a href="https://www.facebook.com/GFNantesEstOfficiel" target="_blank">Page Officielle Facebook</a>'
                    ]
                ]
            ],
            [
                'name' => 'Section Football - Arbitres',
                'slug' => 'arbitres',
                'staticPageContents' => [
                    [
                        'title' => 'NOS ARBITRES BÉNÉVOLES',
                        'content' =>
                        "Philippe Hervé au club depuis 2013<br>
                        Joan Saladie au club depuis 2015"
                    ],
                    [
                        'title' => 'VOUS SOUHAITEZ REJOINDRE NOTRE ÉQUIPE D’ARBITRES ?',
                        'content' =>
                        "CONTACTEZ-NOUS : SMD.ARBITRAGE@GMAIL.COM"
                    ],
                    [
                        'title' => '',
                        'content' =>
                        'Tu as plus de 13 ans ?<br>
                        Toi aussi deviens arbitre.<br>
                        Tu es sportif? Tu aimes le foot? Participe dans une bonne ambiance entre passionnés de foot !<br>
                        <br>
                        Les candidats reçus à l\'examen recoivent :<br>
                        <ul>
                        <li>L\'écusson d\'arbitre officiel</li>
                        <li>Le maillot d\'échauffement</li>
                        <li>Les cartes d\{arbitrage</li>
                        <li>Le livret lois du jeu</li>
                        <li>Des sifflets</li>
                        <li>Des cartons</li>
                        </ul><br>
                        <br>
                        <a href="https://foot44.fff.fr/simple/devenez-arbitre-officiel-derniere-date-pour-la-formation-initiale" target="_blank">https://foot44.fff.fr/simple/devenez-arbitre-officiel-derniere-date-pour-la-formation-initiale</a><br>
                        Les coûts de formation et de restauration sont pris en charge par ton club.<br>
                        Tel : 07 71 11 51 00'
                    ]
                ]
            ]
        ]
    ];
}
