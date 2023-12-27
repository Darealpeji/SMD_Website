<?php

namespace App\DataFixtures;

use App\Entity\NavBarLink;
use Cocur\Slugify\Slugify;
use App\Entity\NavBarDdLink;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NavBarSectionGymSportiveFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entités "NavBarLink" #####

        // NavBarLink "Section Gym Sportive"

        $accueil_gym_sportive = new NavBarLink();

        $accueil_gym_sportive->setName("Gym Sportive - Accueil");
        $accueil_gym_sportive->setTitle("Accueil");
        $accueil_gym_sportive->setSlug("section-gym-sportive");
        $accueil_gym_sportive->setRouteName('home_section');
        $accueil_gym_sportive->setRanking(1);
        $accueil_gym_sportive->setSection($this->getReference(AssoSectionsFixtures::GYM_SPORTIVE));
        $accueil_gym_sportive->setCreatedAtValue();

        $manager->persist($accueil_gym_sportive);

        $presentation_gym_sportive = new NavBarLink();

        $presentation_gym_sportive->setName("Gym Sportive - Présentation");
        $presentation_gym_sportive->setTitle("Présentation");
        $presentation_gym_sportive->setSlug($this->slugify->slugify($presentation_gym_sportive->getTitle()));
        $presentation_gym_sportive->setRouteName('');
        $presentation_gym_sportive->setRanking(2);
        $presentation_gym_sportive->setSection($this->getReference(AssoSectionsFixtures::GYM_SPORTIVE));
        $presentation_gym_sportive->setCreatedAtValue();

        $manager->persist($presentation_gym_sportive);

        $nos_disciplines_gym_sportive = new NavBarLink();

        $nos_disciplines_gym_sportive->setName("Gym Sportive - Nos Disciplines");
        $nos_disciplines_gym_sportive->setTitle("Nos Disciplines");
        $nos_disciplines_gym_sportive->setSlug($this->slugify->slugify($nos_disciplines_gym_sportive->getTitle()));
        $nos_disciplines_gym_sportive->setRouteName('');
        $nos_disciplines_gym_sportive->setRanking(3);
        $nos_disciplines_gym_sportive->setSection($this->getReference(AssoSectionsFixtures::GYM_SPORTIVE));
        $nos_disciplines_gym_sportive->setCreatedAtValue();

        $manager->persist($nos_disciplines_gym_sportive);

        $infos_pratiques_gym_sportive = new NavBarLink();

        $infos_pratiques_gym_sportive->setName("Gym Sportive - Infos Pratiques");
        $infos_pratiques_gym_sportive->setTitle("Infos Pratiques");
        $infos_pratiques_gym_sportive->setSlug($this->slugify->slugify($infos_pratiques_gym_sportive->getTitle()));
        $infos_pratiques_gym_sportive->setRouteName('useful_informations_section');
        $infos_pratiques_gym_sportive->setRanking(4);
        $infos_pratiques_gym_sportive->setSection($this->getReference(AssoSectionsFixtures::GYM_SPORTIVE));
        $infos_pratiques_gym_sportive->setCreatedAtValue();

        $manager->persist($infos_pratiques_gym_sportive);

        $acces_licencies_gym_sportive = new NavBarLink();

        $acces_licencies_gym_sportive->setName("Gym Sportive - Accès Licenciés");
        $acces_licencies_gym_sportive->setTitle("Accès Licenciés");
        $acces_licencies_gym_sportive->setSlug($this->slugify->slugify($acces_licencies_gym_sportive->getTitle()));
        $acces_licencies_gym_sportive->setRouteName('');
        $acces_licencies_gym_sportive->setRanking(5);
        $acces_licencies_gym_sportive->setSection($this->getReference(AssoSectionsFixtures::GYM_SPORTIVE));
        $acces_licencies_gym_sportive->setCreatedAtValue();

        $manager->persist($acces_licencies_gym_sportive);

        $retour_gym_sportive = new NavBarLink();

        $retour_gym_sportive->setName("Gym Sportive - Retour");
        $retour_gym_sportive->setTitle("Retour");
        $retour_gym_sportive->setSlug($this->slugify->slugify($retour_gym_sportive->getTitle()));
        $retour_gym_sportive->setRouteName('home_association');
        $retour_gym_sportive->setRanking(6);
        $retour_gym_sportive->setSection($this->getReference(AssoSectionsFixtures::GYM_SPORTIVE));
        $retour_gym_sportive->setCreatedAtValue();

        $manager->persist($retour_gym_sportive);

        $manager->flush();

        ##### Entités "NavBarDdLink" #####

        // NavBarDdLink "Accueil_Gym Sportive"

        $actualites_accueil_gym_sportive = new NavBarDdLink();

        $actualites_accueil_gym_sportive->setName("Actualités");
        $actualites_accueil_gym_sportive->setSlug($this->slugify->slugify($actualites_accueil_gym_sportive->getName()));
        $actualites_accueil_gym_sportive->setRouteName('news_section');
        $actualites_accueil_gym_sportive->setRanking(1);
        $actualites_accueil_gym_sportive->setNavBarLink($accueil_gym_sportive);
        $actualites_accueil_gym_sportive->setCreatedAtValue();

        $manager->persist($actualites_accueil_gym_sportive);

        // NavBarDdLink "Nos_Disciplines_Gym Sportive"

        $parents_bebe_nos_disciplines_gym_sportive = new NavBarDdLink();

        $parents_bebe_nos_disciplines_gym_sportive->setName("Parents-Bébé");
        $parents_bebe_nos_disciplines_gym_sportive->setSlug($this->slugify->slugify($parents_bebe_nos_disciplines_gym_sportive->getName()));
        $parents_bebe_nos_disciplines_gym_sportive->setRouteName('');
        $parents_bebe_nos_disciplines_gym_sportive->setRanking(1);
        $parents_bebe_nos_disciplines_gym_sportive->setNavBarLink($nos_disciplines_gym_sportive);
        $parents_bebe_nos_disciplines_gym_sportive->setCreatedAtValue();

        $manager->persist($parents_bebe_nos_disciplines_gym_sportive);

        $eveil_gymnique_nos_disciplines_gym_sportive = new NavBarDdLink();

        $eveil_gymnique_nos_disciplines_gym_sportive->setName("Eveil Gymnique");
        $eveil_gymnique_nos_disciplines_gym_sportive->setSlug($this->slugify->slugify($eveil_gymnique_nos_disciplines_gym_sportive->getName()));
        $eveil_gymnique_nos_disciplines_gym_sportive->setRouteName('');
        $eveil_gymnique_nos_disciplines_gym_sportive->setRanking(2);
        $eveil_gymnique_nos_disciplines_gym_sportive->setNavBarLink($nos_disciplines_gym_sportive);
        $eveil_gymnique_nos_disciplines_gym_sportive->setCreatedAtValue();

        $manager->persist($eveil_gymnique_nos_disciplines_gym_sportive);

        $loisirs_nos_disciplines_gym_sportive = new NavBarDdLink();

        $loisirs_nos_disciplines_gym_sportive->setName("Loisirs");
        $loisirs_nos_disciplines_gym_sportive->setSlug($this->slugify->slugify($loisirs_nos_disciplines_gym_sportive->getName()));
        $loisirs_nos_disciplines_gym_sportive->setRouteName('');
        $loisirs_nos_disciplines_gym_sportive->setRanking(3);
        $loisirs_nos_disciplines_gym_sportive->setNavBarLink($nos_disciplines_gym_sportive);
        $loisirs_nos_disciplines_gym_sportive->setCreatedAtValue();

        $manager->persist($loisirs_nos_disciplines_gym_sportive);

        $poussines_nos_disciplines_gym_sportive = new NavBarDdLink();

        $poussines_nos_disciplines_gym_sportive->setName("Poussines");
        $poussines_nos_disciplines_gym_sportive->setSlug($this->slugify->slugify($poussines_nos_disciplines_gym_sportive->getName()));
        $poussines_nos_disciplines_gym_sportive->setRouteName('');
        $poussines_nos_disciplines_gym_sportive->setRanking(4);
        $poussines_nos_disciplines_gym_sportive->setNavBarLink($nos_disciplines_gym_sportive);
        $poussines_nos_disciplines_gym_sportive->setCreatedAtValue();

        $manager->persist($poussines_nos_disciplines_gym_sportive);

        $jeunesses_nos_disciplines_gym_sportive = new NavBarDdLink();

        $jeunesses_nos_disciplines_gym_sportive->setName("Jeunesses");
        $jeunesses_nos_disciplines_gym_sportive->setSlug($this->slugify->slugify($jeunesses_nos_disciplines_gym_sportive->getName()));
        $jeunesses_nos_disciplines_gym_sportive->setRouteName('');
        $jeunesses_nos_disciplines_gym_sportive->setRanking(5);
        $jeunesses_nos_disciplines_gym_sportive->setNavBarLink($nos_disciplines_gym_sportive);
        $jeunesses_nos_disciplines_gym_sportive->setCreatedAtValue();

        $manager->persist($jeunesses_nos_disciplines_gym_sportive);

        $ainees_nos_disciplines_gym_sportive = new NavBarDdLink();

        $ainees_nos_disciplines_gym_sportive->setName("Ainées");
        $ainees_nos_disciplines_gym_sportive->setSlug($this->slugify->slugify($ainees_nos_disciplines_gym_sportive->getName()));
        $ainees_nos_disciplines_gym_sportive->setRouteName('');
        $ainees_nos_disciplines_gym_sportive->setRanking(6);
        $ainees_nos_disciplines_gym_sportive->setNavBarLink($nos_disciplines_gym_sportive);
        $ainees_nos_disciplines_gym_sportive->setCreatedAtValue();

        $manager->persist($ainees_nos_disciplines_gym_sportive);

        // NavBarDdLink "Infos_Pratiques_Gym Sportive"

        $inscriptions_infos_pratiques_gym_sportive = new NavBarDdLink();

        $inscriptions_infos_pratiques_gym_sportive->setName("Inscriptions");
        $inscriptions_infos_pratiques_gym_sportive->setSlug($this->slugify->slugify($inscriptions_infos_pratiques_gym_sportive->getName()));
        $inscriptions_infos_pratiques_gym_sportive->setRouteName('');
        $inscriptions_infos_pratiques_gym_sportive->setRanking(1);
        $inscriptions_infos_pratiques_gym_sportive->setNavBarLink($infos_pratiques_gym_sportive);
        $inscriptions_infos_pratiques_gym_sportive->setCreatedAtValue();

        $manager->persist($inscriptions_infos_pratiques_gym_sportive);

        // NavBarDdLink "Accès_Licenciés_Gym Sportive"

        $compte_acces_licencies_gym_sportive = new NavBarDdLink();

        $compte_acces_licencies_gym_sportive->setName("Compte");
        $compte_acces_licencies_gym_sportive->setSlug($this->slugify->slugify($compte_acces_licencies_gym_sportive->getName()));
        $compte_acces_licencies_gym_sportive->setRouteName('');
        $compte_acces_licencies_gym_sportive->setRanking(1);
        $compte_acces_licencies_gym_sportive->setNavBarLink($acces_licencies_gym_sportive);
        $compte_acces_licencies_gym_sportive->setCreatedAtValue();

        $manager->persist($compte_acces_licencies_gym_sportive);

        $convocations_acces_licencies_gym_sportive = new NavBarDdLink();

        $convocations_acces_licencies_gym_sportive->setName("Convocations");
        $convocations_acces_licencies_gym_sportive->setSlug($this->slugify->slugify($convocations_acces_licencies_gym_sportive->getName()));
        $convocations_acces_licencies_gym_sportive->setRouteName('');
        $convocations_acces_licencies_gym_sportive->setRanking(2);
        $convocations_acces_licencies_gym_sportive->setNavBarLink($acces_licencies_gym_sportive);
        $convocations_acces_licencies_gym_sportive->setCreatedAtValue();

        $manager->persist($convocations_acces_licencies_gym_sportive);

        $se_deconnecter_acces_licencies_gym_sportive = new NavBarDdLink();

        $se_deconnecter_acces_licencies_gym_sportive->setName("Se Déconnecter");
        $se_deconnecter_acces_licencies_gym_sportive->setSlug($this->slugify->slugify($se_deconnecter_acces_licencies_gym_sportive->getName()));
        $se_deconnecter_acces_licencies_gym_sportive->setRouteName('');
        $se_deconnecter_acces_licencies_gym_sportive->setRanking(3);
        $se_deconnecter_acces_licencies_gym_sportive->setNavBarLink($acces_licencies_gym_sportive);
        $se_deconnecter_acces_licencies_gym_sportive->setCreatedAtValue();

        $manager->persist($se_deconnecter_acces_licencies_gym_sportive);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
