<?php

namespace App\DataFixtures;

use App\Entity\NavBarLink;
use Cocur\Slugify\Slugify;
use App\Entity\NavBarDdLink;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NavBarAssociationFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entités "NavBarLink" #####

        // NavBarLink "Association"

        $accueil_association = new NavBarLink();

        $accueil_association->setName("Association - Accueil");
        $accueil_association->setTitle("Accueil");
        $accueil_association->setSlug("");
        $accueil_association->setRouteName('home_association');
        $accueil_association->setRanking(1);
        $accueil_association->setAssociation($this->getReference(AssoSectionsFixtures::ASSOCIATION));
        $accueil_association->setCreatedAtValue();

        $manager->persist($accueil_association);

        $l_association_association = new NavBarLink();

        $l_association_association->setName("Association - L'Association");
        $l_association_association->setTitle("L'Association");
        $l_association_association->setSlug($this->slugify->slugify($l_association_association->getTitle()));
        $l_association_association->setRouteName('');
        $l_association_association->setRanking(2);
        $l_association_association->setAssociation($this->getReference(AssoSectionsFixtures::ASSOCIATION));
        $l_association_association->setCreatedAtValue();

        $manager->persist($l_association_association);

        $nos_sections_association = new NavBarLink();

        $nos_sections_association->setName("Association - Nos Sections");
        $nos_sections_association->setTitle("Nos Sections");
        $nos_sections_association->setSlug($this->slugify->slugify($nos_sections_association->getTitle()));
        $nos_sections_association->setRouteName('');
        $nos_sections_association->setRanking(3);
        $nos_sections_association->setAssociation($this->getReference(AssoSectionsFixtures::ASSOCIATION));
        $nos_sections_association->setCreatedAtValue();

        $manager->persist($nos_sections_association);

        $infos_pratiques_association = new NavBarLink();

        $infos_pratiques_association->setName("Association - Infos Pratiques");
        $infos_pratiques_association->setTitle("Infos Pratiques");
        $infos_pratiques_association->setSlug($this->slugify->slugify($infos_pratiques_association->getTitle()));
        $infos_pratiques_association->setRouteName('useful_informations_association');
        $infos_pratiques_association->setRanking(4);
        $infos_pratiques_association->setAssociation($this->getReference(AssoSectionsFixtures::ASSOCIATION));
        $infos_pratiques_association->setCreatedAtValue();

        $manager->persist($infos_pratiques_association);

        $manager->flush();

        ##### Entités "NavBarDdLink" #####

        // NavBarDdLink "Accueil_Association"

        $actualites_accueil_association = new NavBarDdLink();

        $actualites_accueil_association->setName("Actualités");
        $actualites_accueil_association->setSlug($this->slugify->slugify($actualites_accueil_association->getName()));
        $actualites_accueil_association->setRouteName('news_association');
        $actualites_accueil_association->setRanking(1);
        $actualites_accueil_association->setNavBarLink($accueil_association);
        $actualites_accueil_association->setCreatedAtValue();

        $manager->persist($actualites_accueil_association);

        $notre_histoire_l_association_association = new NavBarDdLink();

        $notre_histoire_l_association_association->setName("Notre Histoire");
        $notre_histoire_l_association_association->setSlug($this->slugify->slugify($notre_histoire_l_association_association->getName()));
        $notre_histoire_l_association_association->setRouteName('');
        $notre_histoire_l_association_association->setRanking(1);
        $notre_histoire_l_association_association->setNavBarLink($l_association_association);
        $notre_histoire_l_association_association->setCreatedAtValue();

        $manager->persist($notre_histoire_l_association_association);

        $l_organigramme_l_association_association = new NavBarDdLink();

        $l_organigramme_l_association_association->setName("L'Organigramme");
        $l_organigramme_l_association_association->setSlug($this->slugify->slugify($l_organigramme_l_association_association->getName()));
        $l_organigramme_l_association_association->setRouteName('');
        $l_organigramme_l_association_association->setRanking(2);
        $l_organigramme_l_association_association->setNavBarLink($l_association_association);
        $l_organigramme_l_association_association->setCreatedAtValue();

        $manager->persist($l_organigramme_l_association_association);

        $documents_l_association_association = new NavBarDdLink();

        $documents_l_association_association->setName("Documents");
        $documents_l_association_association->setSlug($this->slugify->slugify($documents_l_association_association->getName()));
        $documents_l_association_association->setRouteName('');
        $documents_l_association_association->setRanking(3);
        $documents_l_association_association->setNavBarLink($l_association_association);
        $documents_l_association_association->setCreatedAtValue();

        $manager->persist($documents_l_association_association);

        $nos_partenaires_l_association_association = new NavBarDdLink();

        $nos_partenaires_l_association_association->setName("Nos Partenaires");
        $nos_partenaires_l_association_association->setSlug($this->slugify->slugify($nos_partenaires_l_association_association->getName()));
        $nos_partenaires_l_association_association->setRouteName('');
        $nos_partenaires_l_association_association->setRanking(4);
        $nos_partenaires_l_association_association->setNavBarLink($l_association_association);
        $nos_partenaires_l_association_association->setCreatedAtValue();

        $manager->persist($nos_partenaires_l_association_association);

        $basket_nos_sections = new NavBarDdLink();

        $basket_nos_sections->setName("Basket");
        $basket_nos_sections->setSlug("section-basket");
        $basket_nos_sections->setRouteName('home_section');
        $basket_nos_sections->setRanking(1);
        $basket_nos_sections->setNavBarLink($nos_sections_association);
        $basket_nos_sections->setCreatedAtValue();

        $manager->persist($basket_nos_sections);

        $chorale_nos_sections = new NavBarDdLink();

        $chorale_nos_sections->setName("Chorale");
        $chorale_nos_sections->setSlug("section-chorale");
        $chorale_nos_sections->setRouteName('home_section');
        $chorale_nos_sections->setRanking(2);
        $chorale_nos_sections->setNavBarLink($nos_sections_association);
        $chorale_nos_sections->setCreatedAtValue();

        $manager->persist($chorale_nos_sections);

        $danse_nos_sections = new NavBarDdLink();

        $danse_nos_sections->setName("Danse");
        $danse_nos_sections->setSlug("section-danse");
        $danse_nos_sections->setRouteName('home_section');
        $danse_nos_sections->setRanking(3);
        $danse_nos_sections->setNavBarLink($nos_sections_association);
        $danse_nos_sections->setCreatedAtValue();

        $manager->persist($danse_nos_sections);

        $football_nos_sections = new NavBarDdLink();

        $football_nos_sections->setName("Football");
        $football_nos_sections->setSlug("section-football");
        $football_nos_sections->setRouteName('home_section');
        $football_nos_sections->setRanking(4);
        $football_nos_sections->setNavBarLink($nos_sections_association);
        $football_nos_sections->setCreatedAtValue();

        $manager->persist($football_nos_sections);

        $gym_sportive_nos_sections = new NavBarDdLink();

        $gym_sportive_nos_sections->setName("Gym Sportive");
        $gym_sportive_nos_sections->setSlug("section-gym-sportive");
        $gym_sportive_nos_sections->setRouteName('home_section');
        $gym_sportive_nos_sections->setRanking(5);
        $gym_sportive_nos_sections->setNavBarLink($nos_sections_association);
        $gym_sportive_nos_sections->setCreatedAtValue();

        $manager->persist($gym_sportive_nos_sections);

        $gym_tonique_nos_sections = new NavBarDdLink();

        $gym_tonique_nos_sections->setName("Gym Tonique Pilates Yoga");
        $gym_tonique_nos_sections->setSlug("section-gym-tonique-pilates-yoga");
        $gym_tonique_nos_sections->setRouteName('home_section');
        $gym_tonique_nos_sections->setRanking(6);
        $gym_tonique_nos_sections->setNavBarLink($nos_sections_association);
        $gym_tonique_nos_sections->setCreatedAtValue();

        $manager->persist($gym_tonique_nos_sections);

        $loisirs_nos_sections = new NavBarDdLink();

        $loisirs_nos_sections->setName("Loisirs");
        $loisirs_nos_sections->setSlug("section-loisirs");
        $loisirs_nos_sections->setRouteName('home_section');
        $loisirs_nos_sections->setRanking(7);
        $loisirs_nos_sections->setNavBarLink($nos_sections_association);
        $loisirs_nos_sections->setCreatedAtValue();

        $manager->persist($loisirs_nos_sections);

        $petanque_nos_sections = new NavBarDdLink();

        $petanque_nos_sections->setName("Pétanque");
        $petanque_nos_sections->setSlug("section-petanque");
        $petanque_nos_sections->setRouteName('home_section');
        $petanque_nos_sections->setRanking(8);
        $petanque_nos_sections->setNavBarLink($nos_sections_association);
        $petanque_nos_sections->setCreatedAtValue();

        $manager->persist($petanque_nos_sections);

        $tennis_de_table_nos_sections = new NavBarDdLink();

        $tennis_de_table_nos_sections->setName("Tennis de Table");
        $tennis_de_table_nos_sections->setSlug("section-tennis-de-table");
        $tennis_de_table_nos_sections->setRouteName('home_section');
        $tennis_de_table_nos_sections->setRanking(9);
        $tennis_de_table_nos_sections->setNavBarLink($nos_sections_association);
        $tennis_de_table_nos_sections->setCreatedAtValue();

        $manager->persist($tennis_de_table_nos_sections);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
