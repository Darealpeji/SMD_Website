<?php

namespace App\DataFixtures;

use App\Entity\NavBarLink;
use Cocur\Slugify\Slugify;
use App\Entity\NavBarDdLink;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NavBarSectionChoraleFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entités "NavBarLink" #####

        // NavBarLink "Section Chorale"

        $accueil_chorale = new NavBarLink();

        $accueil_chorale->setName("Chorale - Accueil");
        $accueil_chorale->setTitle("Accueil");
        $accueil_chorale->setSlug("section-chorale");
        $accueil_chorale->setRouteName('home_section');
        $accueil_chorale->setRanking(1);
        $accueil_chorale->setSection($this->getReference(AssoSectionsFixtures::CHORALE));
        $accueil_chorale->setCreatedAtValue();

        $manager->persist($accueil_chorale);

        $presentation_chorale = new NavBarLink();

        $presentation_chorale->setName("Chorale - Présentation");
        $presentation_chorale->setTitle("Présentation");
        $presentation_chorale->setSlug($this->slugify->slugify($presentation_chorale->getTitle()));
        $presentation_chorale->setRouteName('');
        $presentation_chorale->setRanking(2);
        $presentation_chorale->setSection($this->getReference(AssoSectionsFixtures::CHORALE));
        $presentation_chorale->setCreatedAtValue();

        $manager->persist($presentation_chorale);

        $nos_concerts_chorale = new NavBarLink();

        $nos_concerts_chorale->setName("Chorale - Nos Concerts");
        $nos_concerts_chorale->setTitle("Nos Concerts");
        $nos_concerts_chorale->setSlug($this->slugify->slugify($nos_concerts_chorale->getTitle()));
        $nos_concerts_chorale->setRouteName('');
        $nos_concerts_chorale->setRanking(3);
        $nos_concerts_chorale->setSection($this->getReference(AssoSectionsFixtures::CHORALE));
        $nos_concerts_chorale->setCreatedAtValue();

        $manager->persist($nos_concerts_chorale);

        $infos_pratiques_chorale = new NavBarLink();

        $infos_pratiques_chorale->setName("Chorale - Infos Pratiques");
        $infos_pratiques_chorale->setTitle("Infos Pratiques");
        $infos_pratiques_chorale->setSlug($this->slugify->slugify($infos_pratiques_chorale->getTitle()));
        $infos_pratiques_chorale->setRouteName('useful_informations_section');
        $infos_pratiques_chorale->setRanking(4);
        $infos_pratiques_chorale->setSection($this->getReference(AssoSectionsFixtures::CHORALE));
        $infos_pratiques_chorale->setCreatedAtValue();

        $manager->persist($infos_pratiques_chorale);

        $acces_membres_chorale = new NavBarLink();

        $acces_membres_chorale->setName("Chorale - Accès Membres");
        $acces_membres_chorale->setTitle("Accès Membres");
        $acces_membres_chorale->setSlug($this->slugify->slugify($acces_membres_chorale->getTitle()));
        $acces_membres_chorale->setRouteName('');
        $acces_membres_chorale->setRanking(5);
        $acces_membres_chorale->setSection($this->getReference(AssoSectionsFixtures::CHORALE));
        $acces_membres_chorale->setCreatedAtValue();

        $manager->persist($acces_membres_chorale);

        $retour_chorale = new NavBarLink();

        $retour_chorale->setName("Chorale - Retour");
        $retour_chorale->setTitle("Retour");
        $retour_chorale->setSlug($this->slugify->slugify($retour_chorale->getTitle()));
        $retour_chorale->setRouteName('home_association');
        $retour_chorale->setRanking(6);
        $retour_chorale->setSection($this->getReference(AssoSectionsFixtures::CHORALE));
        $retour_chorale->setCreatedAtValue();

        $manager->persist($retour_chorale);

        $manager->flush();

        ##### Entités "NavBarDdLink" #####

        // NavBarDdLink "Accueil_Chorale"

        $actualites_accueil_chorale = new NavBarDdLink();

        $actualites_accueil_chorale->setName("Actualités");
        $actualites_accueil_chorale->setSlug($this->slugify->slugify($actualites_accueil_chorale->getName()));
        $actualites_accueil_chorale->setRouteName('news_section');
        $actualites_accueil_chorale->setRanking(1);
        $actualites_accueil_chorale->setNavBarLink($accueil_chorale);
        $actualites_accueil_chorale->setCreatedAtValue();

        $manager->persist($actualites_accueil_chorale);

        // NavBarDdLink "Présentation_Chorale"

        $repertoire_presentation_chorale = new NavBarDdLink();

        $repertoire_presentation_chorale->setName("Répertoire");
        $repertoire_presentation_chorale->setSlug($this->slugify->slugify($repertoire_presentation_chorale->getName()));
        $repertoire_presentation_chorale->setRouteName('');
        $repertoire_presentation_chorale->setRanking(1);
        $repertoire_presentation_chorale->setNavBarLink($presentation_chorale);
        $repertoire_presentation_chorale->setCreatedAtValue();

        $manager->persist($repertoire_presentation_chorale);

        $modalites_de_travail_presentation_chorale = new NavBarDdLink();

        $modalites_de_travail_presentation_chorale->setName("Modalités de Travail");
        $modalites_de_travail_presentation_chorale->setSlug($this->slugify->slugify($modalites_de_travail_presentation_chorale->getName()));
        $modalites_de_travail_presentation_chorale->setRouteName('');
        $modalites_de_travail_presentation_chorale->setRanking(2);
        $modalites_de_travail_presentation_chorale->setNavBarLink($presentation_chorale);
        $modalites_de_travail_presentation_chorale->setCreatedAtValue();

        $manager->persist($modalites_de_travail_presentation_chorale);

        // NavBarDdLink "Accès_Membres_Chorale"

        $compte_acces_membres_chorale = new NavBarDdLink();

        $compte_acces_membres_chorale->setName("Compte");
        $compte_acces_membres_chorale->setSlug($this->slugify->slugify($compte_acces_membres_chorale->getName()));
        $compte_acces_membres_chorale->setRouteName('');
        $compte_acces_membres_chorale->setRanking(1);
        $compte_acces_membres_chorale->setNavBarLink($acces_membres_chorale);
        $compte_acces_membres_chorale->setCreatedAtValue();

        $manager->persist($compte_acces_membres_chorale);

        $echo_raleur_acces_membres_chorale = new NavBarDdLink();

        $echo_raleur_acces_membres_chorale->setName("Echo Raleur");
        $echo_raleur_acces_membres_chorale->setSlug($this->slugify->slugify($echo_raleur_acces_membres_chorale->getName()));
        $echo_raleur_acces_membres_chorale->setRouteName('');
        $echo_raleur_acces_membres_chorale->setRanking(2);
        $echo_raleur_acces_membres_chorale->setNavBarLink($acces_membres_chorale);
        $echo_raleur_acces_membres_chorale->setCreatedAtValue();

        $manager->persist($echo_raleur_acces_membres_chorale);

        $lire_une_partition_acces_membres_chorale = new NavBarDdLink();

        $lire_une_partition_acces_membres_chorale->setName("Lire une Partition");
        $lire_une_partition_acces_membres_chorale->setSlug($this->slugify->slugify($lire_une_partition_acces_membres_chorale->getName()));
        $lire_une_partition_acces_membres_chorale->setRouteName('');
        $lire_une_partition_acces_membres_chorale->setRanking(3);
        $lire_une_partition_acces_membres_chorale->setNavBarLink($acces_membres_chorale);
        $lire_une_partition_acces_membres_chorale->setCreatedAtValue();

        $manager->persist($lire_une_partition_acces_membres_chorale);

        $fichiers_mp3_acces_membres_chorale = new NavBarDdLink();

        $fichiers_mp3_acces_membres_chorale->setName("Fichiers MP3");
        $fichiers_mp3_acces_membres_chorale->setSlug($this->slugify->slugify($fichiers_mp3_acces_membres_chorale->getName()));
        $fichiers_mp3_acces_membres_chorale->setRouteName('');
        $fichiers_mp3_acces_membres_chorale->setRanking(4);
        $fichiers_mp3_acces_membres_chorale->setNavBarLink($acces_membres_chorale);
        $fichiers_mp3_acces_membres_chorale->setCreatedAtValue();

        $manager->persist($fichiers_mp3_acces_membres_chorale);

        $pv_bureau_acces_membres_chorale = new NavBarDdLink();

        $pv_bureau_acces_membres_chorale->setName("PV Bureau");
        $pv_bureau_acces_membres_chorale->setSlug($this->slugify->slugify($pv_bureau_acces_membres_chorale->getName()));
        $pv_bureau_acces_membres_chorale->setRouteName('');
        $pv_bureau_acces_membres_chorale->setRanking(5);
        $pv_bureau_acces_membres_chorale->setNavBarLink($acces_membres_chorale);
        $pv_bureau_acces_membres_chorale->setCreatedAtValue();

        $manager->persist($pv_bureau_acces_membres_chorale);

        $se_deconnecter_acces_membres_chorale = new NavBarDdLink();

        $se_deconnecter_acces_membres_chorale->setName("Se Déconnecter");
        $se_deconnecter_acces_membres_chorale->setSlug($this->slugify->slugify($se_deconnecter_acces_membres_chorale->getName()));
        $se_deconnecter_acces_membres_chorale->setRouteName('');
        $se_deconnecter_acces_membres_chorale->setRanking(6);
        $se_deconnecter_acces_membres_chorale->setNavBarLink($acces_membres_chorale);
        $se_deconnecter_acces_membres_chorale->setCreatedAtValue();

        $manager->persist($se_deconnecter_acces_membres_chorale);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
