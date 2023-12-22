<?php

namespace App\DataFixtures;

use App\Entity\NavBarLink;
use Cocur\Slugify\Slugify;
use App\Entity\NavBarDdLink;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NavBarSectionTennisDeTableFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entités "NavBarLink" #####

        // NavBarLink "Section Tennis de Table"

        $accueil_tennis_de_table = new NavBarLink();

        $accueil_tennis_de_table->setName("Tennis de Table - Accueil");
        $accueil_tennis_de_table->setTitle("Accueil");
        $accueil_tennis_de_table->setSlug("section-tennis_de_table");
        $accueil_tennis_de_table->setPath("section-tennis_de_table");
        $accueil_tennis_de_table->setRanking(1);
        $accueil_tennis_de_table->setSection($this->getReference(AssoSectionsFixtures::TENNIS_DE_TABLE));
        $accueil_tennis_de_table->setCreatedAtValue();

        $manager->persist($accueil_tennis_de_table);

        $le_club_tennis_de_table = new NavBarLink();

        $le_club_tennis_de_table->setName("Tennis de Table - Le Club");
        $le_club_tennis_de_table->setTitle("Le Club");
        $le_club_tennis_de_table->setSlug($this->slugify->slugify($le_club_tennis_de_table->getTitle()));
        $le_club_tennis_de_table->setPath($this->getReference(AssoSectionsFixtures::TENNIS_DE_TABLE)->getSlug() . "/" . $this->slugify->slugify($le_club_tennis_de_table->getTitle()));
        $le_club_tennis_de_table->setRanking(2);
        $le_club_tennis_de_table->setSection($this->getReference(AssoSectionsFixtures::TENNIS_DE_TABLE));
        $le_club_tennis_de_table->setCreatedAtValue();

        $manager->persist($le_club_tennis_de_table);

        $nos_equipes_tennis_de_table = new NavBarLink();

        $nos_equipes_tennis_de_table->setName("Tennis de Table - Nos Equipes");
        $nos_equipes_tennis_de_table->setTitle("Nos Equipes");
        $nos_equipes_tennis_de_table->setSlug($this->slugify->slugify($nos_equipes_tennis_de_table->getTitle()));
        $nos_equipes_tennis_de_table->setPath($this->getReference(AssoSectionsFixtures::TENNIS_DE_TABLE)->getSlug() . "/" . $this->slugify->slugify($nos_equipes_tennis_de_table->getTitle()));
        $nos_equipes_tennis_de_table->setRanking(3);
        $nos_equipes_tennis_de_table->setSection($this->getReference(AssoSectionsFixtures::TENNIS_DE_TABLE));
        $nos_equipes_tennis_de_table->setCreatedAtValue();

        $manager->persist($nos_equipes_tennis_de_table);

        $infos_pratiques_tennis_de_table = new NavBarLink();

        $infos_pratiques_tennis_de_table->setName("Tennis de Table - Infos Pratiques");
        $infos_pratiques_tennis_de_table->setTitle("Infos Pratiques");
        $infos_pratiques_tennis_de_table->setSlug($this->slugify->slugify($infos_pratiques_tennis_de_table->getTitle()));
        $infos_pratiques_tennis_de_table->setPath($this->getReference(AssoSectionsFixtures::TENNIS_DE_TABLE)->getSlug() . "/" . $this->slugify->slugify($infos_pratiques_tennis_de_table->getTitle()));
        $infos_pratiques_tennis_de_table->setRanking(4);
        $infos_pratiques_tennis_de_table->setSection($this->getReference(AssoSectionsFixtures::TENNIS_DE_TABLE));
        $infos_pratiques_tennis_de_table->setCreatedAtValue();

        $manager->persist($infos_pratiques_tennis_de_table);

        $acces_licencies_tennis_de_table = new NavBarLink();

        $acces_licencies_tennis_de_table->setName("Tennis de Table - Accès Licenciés");
        $acces_licencies_tennis_de_table->setTitle("Accès Licenciés");
        $acces_licencies_tennis_de_table->setSlug($this->slugify->slugify($acces_licencies_tennis_de_table->getTitle()));
        $acces_licencies_tennis_de_table->setPath($this->getReference(AssoSectionsFixtures::TENNIS_DE_TABLE)->getSlug() . "/" . $this->slugify->slugify($acces_licencies_tennis_de_table->getTitle()));
        $acces_licencies_tennis_de_table->setRanking(5);
        $acces_licencies_tennis_de_table->setSection($this->getReference(AssoSectionsFixtures::TENNIS_DE_TABLE));
        $acces_licencies_tennis_de_table->setCreatedAtValue();

        $manager->persist($acces_licencies_tennis_de_table);

        $retour_tennis_de_table = new NavBarLink();

        $retour_tennis_de_table->setName("Tennis de Table - Retour");
        $retour_tennis_de_table->setTitle("Retour");
        $retour_tennis_de_table->setSlug($this->slugify->slugify($retour_tennis_de_table->getTitle()));
        $retour_tennis_de_table->setPath("/");
        $retour_tennis_de_table->setRanking(6);
        $retour_tennis_de_table->setSection($this->getReference(AssoSectionsFixtures::TENNIS_DE_TABLE));
        $retour_tennis_de_table->setCreatedAtValue();

        $manager->persist($retour_tennis_de_table);

        $manager->flush();

        ##### Entités "NavBarDdLink" #####

        // NavBarDdLink "Accueil_Tennis de Table"

        $actualites_accueil_tennis_de_table = new NavBarDdLink();

        $actualites_accueil_tennis_de_table->setName("Actualités");
        $actualites_accueil_tennis_de_table->setSlug($this->slugify->slugify($actualites_accueil_tennis_de_table->getName()));
        $actualites_accueil_tennis_de_table->setPath($accueil_tennis_de_table->getPath() . "/" . $this->slugify->slugify($actualites_accueil_tennis_de_table->getName()));
        $actualites_accueil_tennis_de_table->setRanking(1);
        $actualites_accueil_tennis_de_table->setNavBarLink($accueil_tennis_de_table);
        $actualites_accueil_tennis_de_table->setCreatedAtValue();

        $manager->persist($actualites_accueil_tennis_de_table);

        // NavBarDdLink "Le_Club_Tennis de Table"

        $notre_histoire_le_club_tennis_de_table = new NavBarDdLink();

        $notre_histoire_le_club_tennis_de_table->setName("Notre Histoire");
        $notre_histoire_le_club_tennis_de_table->setSlug($this->slugify->slugify($notre_histoire_le_club_tennis_de_table->getName()));
        $notre_histoire_le_club_tennis_de_table->setPath($le_club_tennis_de_table->getPath() . "/" . $this->slugify->slugify($notre_histoire_le_club_tennis_de_table->getName()));
        $notre_histoire_le_club_tennis_de_table->setRanking(1);
        $notre_histoire_le_club_tennis_de_table->setNavBarLink($le_club_tennis_de_table);
        $notre_histoire_le_club_tennis_de_table->setCreatedAtValue();

        $manager->persist($notre_histoire_le_club_tennis_de_table);

        $l_organigramme_le_club_tennis_de_table = new NavBarDdLink();

        $l_organigramme_le_club_tennis_de_table->setName("L'Organigramme");
        $l_organigramme_le_club_tennis_de_table->setSlug($this->slugify->slugify($l_organigramme_le_club_tennis_de_table->getName()));
        $l_organigramme_le_club_tennis_de_table->setPath($le_club_tennis_de_table->getPath() . "/" . $this->slugify->slugify($l_organigramme_le_club_tennis_de_table->getName()));
        $l_organigramme_le_club_tennis_de_table->setRanking(2);
        $l_organigramme_le_club_tennis_de_table->setNavBarLink($le_club_tennis_de_table);
        $l_organigramme_le_club_tennis_de_table->setCreatedAtValue();

        $manager->persist($l_organigramme_le_club_tennis_de_table);

        $nos_partenaires_le_club_tennis_de_table = new NavBarDdLink();

        $nos_partenaires_le_club_tennis_de_table->setName("Nos Partenaires");
        $nos_partenaires_le_club_tennis_de_table->setSlug($this->slugify->slugify($nos_partenaires_le_club_tennis_de_table->getName()));
        $nos_partenaires_le_club_tennis_de_table->setPath($le_club_tennis_de_table->getPath() . "/" . $this->slugify->slugify($nos_partenaires_le_club_tennis_de_table->getName()));
        $nos_partenaires_le_club_tennis_de_table->setRanking(3);
        $nos_partenaires_le_club_tennis_de_table->setNavBarLink($le_club_tennis_de_table);
        $nos_partenaires_le_club_tennis_de_table->setCreatedAtValue();

        $manager->persist($nos_partenaires_le_club_tennis_de_table);

        // NavBarDdLink "Nos_Equipes_Tennis de Table"

        $national_2_nos_equipes_tennis_de_table = new NavBarDdLink();

        $national_2_nos_equipes_tennis_de_table->setName("Nationale 2");
        $national_2_nos_equipes_tennis_de_table->setSlug($this->slugify->slugify($national_2_nos_equipes_tennis_de_table->getName()));
        $national_2_nos_equipes_tennis_de_table->setPath($nos_equipes_tennis_de_table->getPath() . "/" . $this->slugify->slugify($national_2_nos_equipes_tennis_de_table->getName()));
        $national_2_nos_equipes_tennis_de_table->setRanking(1);
        $national_2_nos_equipes_tennis_de_table->setNavBarLink($nos_equipes_tennis_de_table);
        $national_2_nos_equipes_tennis_de_table->setCreatedAtValue();

        $manager->persist($national_2_nos_equipes_tennis_de_table);

        $national_3_nos_equipes_tennis_de_table = new NavBarDdLink();

        $national_3_nos_equipes_tennis_de_table->setName("Nationale 3");
        $national_3_nos_equipes_tennis_de_table->setSlug($this->slugify->slugify($national_3_nos_equipes_tennis_de_table->getName()));
        $national_3_nos_equipes_tennis_de_table->setPath($nos_equipes_tennis_de_table->getPath() . "/" . $this->slugify->slugify($national_3_nos_equipes_tennis_de_table->getName()));
        $national_3_nos_equipes_tennis_de_table->setRanking(2);
        $national_3_nos_equipes_tennis_de_table->setNavBarLink($nos_equipes_tennis_de_table);
        $national_3_nos_equipes_tennis_de_table->setCreatedAtValue();

        $manager->persist($national_3_nos_equipes_tennis_de_table);

        $pre_national_nos_equipes_tennis_de_table = new NavBarDdLink();

        $pre_national_nos_equipes_tennis_de_table->setName("Pré-Nationale");
        $pre_national_nos_equipes_tennis_de_table->setSlug($this->slugify->slugify($pre_national_nos_equipes_tennis_de_table->getName()));
        $pre_national_nos_equipes_tennis_de_table->setPath($nos_equipes_tennis_de_table->getPath() . "/" . $this->slugify->slugify($pre_national_nos_equipes_tennis_de_table->getName()));
        $pre_national_nos_equipes_tennis_de_table->setRanking(3);
        $pre_national_nos_equipes_tennis_de_table->setNavBarLink($nos_equipes_tennis_de_table);
        $pre_national_nos_equipes_tennis_de_table->setCreatedAtValue();

        $manager->persist($pre_national_nos_equipes_tennis_de_table);

        $regional_3_nos_equipes_tennis_de_table = new NavBarDdLink();

        $regional_3_nos_equipes_tennis_de_table->setName("Régionale 3");
        $regional_3_nos_equipes_tennis_de_table->setSlug($this->slugify->slugify($regional_3_nos_equipes_tennis_de_table->getName()));
        $regional_3_nos_equipes_tennis_de_table->setPath($nos_equipes_tennis_de_table->getPath() . "/" . $this->slugify->slugify($regional_3_nos_equipes_tennis_de_table->getName()));
        $regional_3_nos_equipes_tennis_de_table->setRanking(4);
        $regional_3_nos_equipes_tennis_de_table->setNavBarLink($nos_equipes_tennis_de_table);
        $regional_3_nos_equipes_tennis_de_table->setCreatedAtValue();

        $manager->persist($regional_3_nos_equipes_tennis_de_table);

        $departementale_1_nos_equipes_tennis_de_table = new NavBarDdLink();

        $departementale_1_nos_equipes_tennis_de_table->setName("Départementale 1");
        $departementale_1_nos_equipes_tennis_de_table->setSlug($this->slugify->slugify($departementale_1_nos_equipes_tennis_de_table->getName()));
        $departementale_1_nos_equipes_tennis_de_table->setPath($nos_equipes_tennis_de_table->getPath() . "/" . $this->slugify->slugify($departementale_1_nos_equipes_tennis_de_table->getName()));
        $departementale_1_nos_equipes_tennis_de_table->setRanking(5);
        $departementale_1_nos_equipes_tennis_de_table->setNavBarLink($nos_equipes_tennis_de_table);
        $departementale_1_nos_equipes_tennis_de_table->setCreatedAtValue();

        $manager->persist($departementale_1_nos_equipes_tennis_de_table);

        $departementale_2_nos_equipes_tennis_de_table = new NavBarDdLink();

        $departementale_2_nos_equipes_tennis_de_table->setName("Départementale 2");
        $departementale_2_nos_equipes_tennis_de_table->setSlug($this->slugify->slugify($departementale_2_nos_equipes_tennis_de_table->getName()));
        $departementale_2_nos_equipes_tennis_de_table->setPath($nos_equipes_tennis_de_table->getPath() . "/" . $this->slugify->slugify($departementale_2_nos_equipes_tennis_de_table->getName()));
        $departementale_2_nos_equipes_tennis_de_table->setRanking(6);
        $departementale_2_nos_equipes_tennis_de_table->setNavBarLink($nos_equipes_tennis_de_table);
        $departementale_2_nos_equipes_tennis_de_table->setCreatedAtValue();

        $manager->persist($departementale_2_nos_equipes_tennis_de_table);

        $departementale_3_nos_equipes_tennis_de_table = new NavBarDdLink();

        $departementale_3_nos_equipes_tennis_de_table->setName("Départementale 3");
        $departementale_3_nos_equipes_tennis_de_table->setSlug($this->slugify->slugify($departementale_3_nos_equipes_tennis_de_table->getName()));
        $departementale_3_nos_equipes_tennis_de_table->setPath($nos_equipes_tennis_de_table->getPath() . "/" . $this->slugify->slugify($departementale_3_nos_equipes_tennis_de_table->getName()));
        $departementale_3_nos_equipes_tennis_de_table->setRanking(7);
        $departementale_3_nos_equipes_tennis_de_table->setNavBarLink($nos_equipes_tennis_de_table);
        $departementale_3_nos_equipes_tennis_de_table->setCreatedAtValue();

        $manager->persist($departementale_3_nos_equipes_tennis_de_table);

        $departementale_4_nos_equipes_tennis_de_table = new NavBarDdLink();

        $departementale_4_nos_equipes_tennis_de_table->setName("Départementale 4");
        $departementale_4_nos_equipes_tennis_de_table->setSlug($this->slugify->slugify($departementale_4_nos_equipes_tennis_de_table->getName()));
        $departementale_4_nos_equipes_tennis_de_table->setPath($nos_equipes_tennis_de_table->getPath() . "/" . $this->slugify->slugify($departementale_4_nos_equipes_tennis_de_table->getName()));
        $departementale_4_nos_equipes_tennis_de_table->setRanking(8);
        $departementale_4_nos_equipes_tennis_de_table->setNavBarLink($nos_equipes_tennis_de_table);
        $departementale_4_nos_equipes_tennis_de_table->setCreatedAtValue();

        $manager->persist($departementale_4_nos_equipes_tennis_de_table);

        // NavBarDdLink "Infos_Pratiques_Tennis de Table"

        $inscriptions_infos_pratiques_tennis_de_table = new NavBarDdLink();

        $inscriptions_infos_pratiques_tennis_de_table->setName("Inscriptions");
        $inscriptions_infos_pratiques_tennis_de_table->setSlug($this->slugify->slugify($inscriptions_infos_pratiques_tennis_de_table->getName()));
        $inscriptions_infos_pratiques_tennis_de_table->setPath($infos_pratiques_tennis_de_table->getPath() . "/" . $this->slugify->slugify($inscriptions_infos_pratiques_tennis_de_table->getName()));
        $inscriptions_infos_pratiques_tennis_de_table->setRanking(1);
        $inscriptions_infos_pratiques_tennis_de_table->setNavBarLink($infos_pratiques_tennis_de_table);
        $inscriptions_infos_pratiques_tennis_de_table->setCreatedAtValue();

        $manager->persist($inscriptions_infos_pratiques_tennis_de_table);

        // NavBarDdLink "Accès_Licenciés_Tennis de Table"

        $compte_acces_licencies_tennis_de_table = new NavBarDdLink();

        $compte_acces_licencies_tennis_de_table->setName("Compte");
        $compte_acces_licencies_tennis_de_table->setSlug($this->slugify->slugify($compte_acces_licencies_tennis_de_table->getName()));
        $compte_acces_licencies_tennis_de_table->setPath($acces_licencies_tennis_de_table->getPath() . "/" . $this->slugify->slugify($compte_acces_licencies_tennis_de_table->getName()));
        $compte_acces_licencies_tennis_de_table->setRanking(1);
        $compte_acces_licencies_tennis_de_table->setNavBarLink($acces_licencies_tennis_de_table);
        $compte_acces_licencies_tennis_de_table->setCreatedAtValue();

        $manager->persist($compte_acces_licencies_tennis_de_table);

        $convocations_acces_licencies_tennis_de_table = new NavBarDdLink();

        $convocations_acces_licencies_tennis_de_table->setName("Convocations");
        $convocations_acces_licencies_tennis_de_table->setSlug($this->slugify->slugify($convocations_acces_licencies_tennis_de_table->getName()));
        $convocations_acces_licencies_tennis_de_table->setPath($acces_licencies_tennis_de_table->getPath() . "/" . $this->slugify->slugify($convocations_acces_licencies_tennis_de_table->getName()));
        $convocations_acces_licencies_tennis_de_table->setRanking(2);
        $convocations_acces_licencies_tennis_de_table->setNavBarLink($acces_licencies_tennis_de_table);
        $convocations_acces_licencies_tennis_de_table->setCreatedAtValue();

        $manager->persist($convocations_acces_licencies_tennis_de_table);

        $se_deconnecter_acces_licencies_tennis_de_table = new NavBarDdLink();

        $se_deconnecter_acces_licencies_tennis_de_table->setName("Se Déconnecter");
        $se_deconnecter_acces_licencies_tennis_de_table->setSlug($this->slugify->slugify($se_deconnecter_acces_licencies_tennis_de_table->getName()));
        $se_deconnecter_acces_licencies_tennis_de_table->setPath($acces_licencies_tennis_de_table->getPath() . "/" . $this->slugify->slugify($se_deconnecter_acces_licencies_tennis_de_table->getName()));
        $se_deconnecter_acces_licencies_tennis_de_table->setRanking(3);
        $se_deconnecter_acces_licencies_tennis_de_table->setNavBarLink($acces_licencies_tennis_de_table);
        $se_deconnecter_acces_licencies_tennis_de_table->setCreatedAtValue();

        $manager->persist($se_deconnecter_acces_licencies_tennis_de_table);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
