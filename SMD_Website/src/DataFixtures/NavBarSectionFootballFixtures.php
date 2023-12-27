<?php

namespace App\DataFixtures;

use App\Entity\NavBarLink;
use Cocur\Slugify\Slugify;
use App\Entity\NavBarDdLink;
use Doctrine\Persistence\ObjectManager;
use App\Repository\NavBarLinkRepository;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NavBarSectionFootballFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entités "NavBarLink" #####

        // NavBarLink "Section Football"

        $accueil_football = new NavBarLink();

        $accueil_football->setName("Football - Accueil");
        $accueil_football->setTitle("Accueil");
        $accueil_football->setSlug("section-football");
        $accueil_football->setRouteName('home_section');
        $accueil_football->setRanking(1);
        $accueil_football->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $accueil_football->setCreatedAtValue();

        $manager->persist($accueil_football);

        $le_club_football = new NavBarLink();

        $le_club_football->setName("Football - Le Club");
        $le_club_football->setTitle("Le Club");
        $le_club_football->setSlug($this->slugify->slugify($le_club_football->getTitle()));
        $le_club_football->setRouteName('');
        $le_club_football->setRanking(2);
        $le_club_football->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $le_club_football->setCreatedAtValue();

        $manager->persist($le_club_football);

        $nos_equipes_football = new NavBarLink();

        $nos_equipes_football->setName("Football - Nos Equipes");
        $nos_equipes_football->setTitle("Nos Equipes");
        $nos_equipes_football->setSlug($this->slugify->slugify($nos_equipes_football->getTitle()));
        $nos_equipes_football->setRouteName('');
        $nos_equipes_football->setRanking(3);
        $nos_equipes_football->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $nos_equipes_football->setCreatedAtValue();

        $manager->persist($nos_equipes_football);

        $boutique_football = new NavBarLink();

        $boutique_football->setName("Football - Boutique");
        $boutique_football->setTitle("Boutique");
        $boutique_football->setSlug($this->slugify->slugify($boutique_football->getTitle()));
        $boutique_football->setRouteName('');
        $boutique_football->setRanking(4);
        $boutique_football->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $boutique_football->setCreatedAtValue();

        $manager->persist($boutique_football);

        $infos_pratiques_football = new NavBarLink();

        $infos_pratiques_football->setName("Football - Infos Pratiques");
        $infos_pratiques_football->setTitle("Infos Pratiques");
        $infos_pratiques_football->setSlug($this->slugify->slugify($infos_pratiques_football->getTitle()));
        $infos_pratiques_football->setRouteName('useful_informations_section');
        $infos_pratiques_football->setRanking(6);
        $infos_pratiques_football->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $infos_pratiques_football->setCreatedAtValue();

        $manager->persist($infos_pratiques_football);

        $acces_licencies_football = new NavBarLink();

        $acces_licencies_football->setName("Football - Accès Licenciés");
        $acces_licencies_football->setTitle("Accès Licenciés");
        $acces_licencies_football->setSlug($this->slugify->slugify($acces_licencies_football->getTitle()));
        $acces_licencies_football->setRouteName('');
        $acces_licencies_football->setRanking(5);
        $acces_licencies_football->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $acces_licencies_football->setCreatedAtValue();

        $manager->persist($acces_licencies_football);

        $retour_football = new NavBarLink();

        $retour_football->setName("Football - Retour");
        $retour_football->setTitle("Retour");
        $retour_football->setSlug($this->slugify->slugify($retour_football->getTitle()));
        $retour_football->setRouteName('home_association');
        $retour_football->setRanking(7);
        $retour_football->setSection($this->getReference(AssoSectionsFixtures::FOOTBALL));
        $retour_football->setCreatedAtValue();

        $manager->persist($retour_football);

        $manager->flush();

        ##### Entités "NavBarDdLink" #####

        // NavBarDdLink "Accueil_Football"

        $actualites_accueil_football = new NavBarDdLink();

        $actualites_accueil_football->setName("Actualités");
        $actualites_accueil_football->setSlug($this->slugify->slugify($actualites_accueil_football->getName()));
        $actualites_accueil_football->setRouteName('news_section');
        $actualites_accueil_football->setRanking(1);
        $actualites_accueil_football->setNavBarLink($accueil_football);
        $actualites_accueil_football->setCreatedAtValue();

        $manager->persist($actualites_accueil_football);

        $tv_smd_accueil_football = new NavBarDdLink();

        $tv_smd_accueil_football->setName("TV SMD");
        $tv_smd_accueil_football->setSlug($this->slugify->slugify($tv_smd_accueil_football->getName()));
        $tv_smd_accueil_football->setRouteName('');
        $tv_smd_accueil_football->setRanking(2);
        $tv_smd_accueil_football->setNavBarLink($accueil_football);
        $tv_smd_accueil_football->setCreatedAtValue();

        $manager->persist($tv_smd_accueil_football);

        // NavBarDdLink "Le_Club_Football"

        $notre_histoire_le_club_football = new NavBarDdLink();

        $notre_histoire_le_club_football->setName("Notre Histoire");
        $notre_histoire_le_club_football->setSlug($this->slugify->slugify($notre_histoire_le_club_football->getName()));
        $notre_histoire_le_club_football->setRouteName('');
        $notre_histoire_le_club_football->setRanking(1);
        $notre_histoire_le_club_football->setNavBarLink($le_club_football);
        $notre_histoire_le_club_football->setCreatedAtValue();

        $manager->persist($notre_histoire_le_club_football);

        $l_organigramme_le_club_football = new NavBarDdLink();

        $l_organigramme_le_club_football->setName("L'Organigramme");
        $l_organigramme_le_club_football->setSlug($this->slugify->slugify($l_organigramme_le_club_football->getName()));
        $l_organigramme_le_club_football->setRouteName('');
        $l_organigramme_le_club_football->setRanking(2);
        $l_organigramme_le_club_football->setNavBarLink($le_club_football);
        $l_organigramme_le_club_football->setCreatedAtValue();

        $manager->persist($l_organigramme_le_club_football);

        $p_e_f_le_club_football = new NavBarDdLink();

        $p_e_f_le_club_football->setName("P.E.F.");
        $p_e_f_le_club_football->setSlug($this->slugify->slugify($p_e_f_le_club_football->getName()));
        $p_e_f_le_club_football->setRouteName('');
        $p_e_f_le_club_football->setRanking(3);
        $p_e_f_le_club_football->setNavBarLink($le_club_football);
        $p_e_f_le_club_football->setCreatedAtValue();

        $manager->persist($p_e_f_le_club_football);

        $plan_cite_foot_le_club_football = new NavBarDdLink();

        $plan_cite_foot_le_club_football->setName("P.E.F.");
        $plan_cite_foot_le_club_football->setSlug($this->slugify->slugify($plan_cite_foot_le_club_football->getName()));
        $plan_cite_foot_le_club_football->setRouteName('');
        $plan_cite_foot_le_club_football->setRanking(4);
        $plan_cite_foot_le_club_football->setNavBarLink($le_club_football);
        $plan_cite_foot_le_club_football->setCreatedAtValue();

        $manager->persist($plan_cite_foot_le_club_football);

        $reglement_charte_le_club_football = new NavBarDdLink();

        $reglement_charte_le_club_football->setName("Règlement et Charte");
        $reglement_charte_le_club_football->setSlug($this->slugify->slugify($reglement_charte_le_club_football->getName()));
        $reglement_charte_le_club_football->setRouteName('');
        $reglement_charte_le_club_football->setRanking(5);
        $reglement_charte_le_club_football->setNavBarLink($le_club_football);
        $reglement_charte_le_club_football->setCreatedAtValue();

        $manager->persist($reglement_charte_le_club_football);
        
        $nos_partenaires_le_club_football = new NavBarDdLink();

        $nos_partenaires_le_club_football->setName("Nos Partenaires");
        $nos_partenaires_le_club_football->setSlug($this->slugify->slugify($nos_partenaires_le_club_football->getName()));
        $nos_partenaires_le_club_football->setRouteName('');
        $nos_partenaires_le_club_football->setRanking(6);
        $nos_partenaires_le_club_football->setNavBarLink($le_club_football);
        $nos_partenaires_le_club_football->setCreatedAtValue();

        $manager->persist($nos_partenaires_le_club_football);

        // NavBarDdLink "Nos_Equipes_Football"

        $seniors_nos_equipes_football = new NavBarDdLink();

        $seniors_nos_equipes_football->setName("Séniors");
        $seniors_nos_equipes_football->setSlug($this->slugify->slugify($seniors_nos_equipes_football->getName()));
        $seniors_nos_equipes_football->setRouteName('');
        $seniors_nos_equipes_football->setRanking(1);
        $seniors_nos_equipes_football->setNavBarLink($nos_equipes_football);
        $seniors_nos_equipes_football->setCreatedAtValue();

        $manager->persist($seniors_nos_equipes_football);

        $u19_nos_equipes_football = new NavBarDdLink();

        $u19_nos_equipes_football->setName("U19");
        $u19_nos_equipes_football->setSlug($this->slugify->slugify($u19_nos_equipes_football->getName()));
        $u19_nos_equipes_football->setRouteName('');
        $u19_nos_equipes_football->setRanking(2);
        $u19_nos_equipes_football->setNavBarLink($nos_equipes_football);
        $u19_nos_equipes_football->setCreatedAtValue();

        $manager->persist($u19_nos_equipes_football);

        $u17_nos_equipes_football = new NavBarDdLink();

        $u17_nos_equipes_football->setName("U17");
        $u17_nos_equipes_football->setSlug($this->slugify->slugify($u17_nos_equipes_football->getName()));
        $u17_nos_equipes_football->setRouteName('');
        $u17_nos_equipes_football->setRanking(3);
        $u17_nos_equipes_football->setNavBarLink($nos_equipes_football);
        $u17_nos_equipes_football->setCreatedAtValue();

        $manager->persist($u17_nos_equipes_football);

        $u15_nos_equipes_football = new NavBarDdLink();

        $u15_nos_equipes_football->setName("U15");
        $u15_nos_equipes_football->setSlug($this->slugify->slugify($u15_nos_equipes_football->getName()));
        $u15_nos_equipes_football->setRouteName('');
        $u15_nos_equipes_football->setRanking(4);
        $u15_nos_equipes_football->setNavBarLink($nos_equipes_football);
        $u15_nos_equipes_football->setCreatedAtValue();

        $manager->persist($u15_nos_equipes_football);

        $u13_nos_equipes_football = new NavBarDdLink();

        $u13_nos_equipes_football->setName("U13");
        $u13_nos_equipes_football->setSlug($this->slugify->slugify($u13_nos_equipes_football->getName()));
        $u13_nos_equipes_football->setRouteName('');
        $u13_nos_equipes_football->setRanking(5);
        $u13_nos_equipes_football->setNavBarLink($nos_equipes_football);
        $u13_nos_equipes_football->setCreatedAtValue();

        $manager->persist($u13_nos_equipes_football);

        $u11_nos_equipes_football = new NavBarDdLink();

        $u11_nos_equipes_football->setName("U11");
        $u11_nos_equipes_football->setSlug($this->slugify->slugify($u11_nos_equipes_football->getName()));
        $u11_nos_equipes_football->setRouteName('');
        $u11_nos_equipes_football->setRanking(6);
        $u11_nos_equipes_football->setNavBarLink($nos_equipes_football);
        $u11_nos_equipes_football->setCreatedAtValue();

        $manager->persist($u11_nos_equipes_football);

        $u9_nos_equipes_football = new NavBarDdLink();

        $u9_nos_equipes_football->setName("U9");
        $u9_nos_equipes_football->setSlug($this->slugify->slugify($u9_nos_equipes_football->getName()));
        $u9_nos_equipes_football->setRouteName('');
        $u9_nos_equipes_football->setRanking(7);
        $u9_nos_equipes_football->setNavBarLink($nos_equipes_football);
        $u9_nos_equipes_football->setCreatedAtValue();

        $manager->persist($u9_nos_equipes_football);

        $u7_nos_equipes_football = new NavBarDdLink();

        $u7_nos_equipes_football->setName("U7");
        $u7_nos_equipes_football->setSlug($this->slugify->slugify($u7_nos_equipes_football->getName()));
        $u7_nos_equipes_football->setRouteName('');
        $u7_nos_equipes_football->setRanking(8);
        $u7_nos_equipes_football->setNavBarLink($nos_equipes_football);
        $u7_nos_equipes_football->setCreatedAtValue();

        $manager->persist($u7_nos_equipes_football);

        $groupement_feminin_nos_equipes_football = new NavBarDdLink();

        $groupement_feminin_nos_equipes_football->setName("Groupement Féminin");
        $groupement_feminin_nos_equipes_football->setSlug($this->slugify->slugify($groupement_feminin_nos_equipes_football->getName()));
        $groupement_feminin_nos_equipes_football->setRouteName('');
        $groupement_feminin_nos_equipes_football->setRanking(9);
        $groupement_feminin_nos_equipes_football->setNavBarLink($nos_equipes_football);
        $groupement_feminin_nos_equipes_football->setCreatedAtValue();

        $manager->persist($groupement_feminin_nos_equipes_football);

        $veterans_nos_equipes_football = new NavBarDdLink();

        $veterans_nos_equipes_football->setName("Vétérans");
        $veterans_nos_equipes_football->setSlug($this->slugify->slugify($veterans_nos_equipes_football->getName()));
        $veterans_nos_equipes_football->setRouteName('');
        $veterans_nos_equipes_football->setRanking(10);
        $veterans_nos_equipes_football->setNavBarLink($nos_equipes_football);
        $veterans_nos_equipes_football->setCreatedAtValue();

        $manager->persist($veterans_nos_equipes_football);

        $loisirs_nos_equipes_football = new NavBarDdLink();

        $loisirs_nos_equipes_football->setName("Loisirs");
        $loisirs_nos_equipes_football->setSlug($this->slugify->slugify($loisirs_nos_equipes_football->getName()));
        $loisirs_nos_equipes_football->setRouteName('');
        $loisirs_nos_equipes_football->setRanking(11);
        $loisirs_nos_equipes_football->setNavBarLink($nos_equipes_football);
        $loisirs_nos_equipes_football->setCreatedAtValue();

        $manager->persist($loisirs_nos_equipes_football);

        $arbitres_nos_equipes_football = new NavBarDdLink();

        $arbitres_nos_equipes_football->setName("Arbitres");
        $arbitres_nos_equipes_football->setSlug($this->slugify->slugify($arbitres_nos_equipes_football->getName()));
        $arbitres_nos_equipes_football->setRouteName('');
        $arbitres_nos_equipes_football->setRanking(12);
        $arbitres_nos_equipes_football->setNavBarLink($nos_equipes_football);
        $arbitres_nos_equipes_football->setCreatedAtValue();

        $manager->persist($arbitres_nos_equipes_football);

        // NavBarDdLink "Infos_Pratiques_Football"

        $inscriptions_infos_pratiques_football = new NavBarDdLink();

        $inscriptions_infos_pratiques_football->setName("Inscriptions");
        $inscriptions_infos_pratiques_football->setSlug($this->slugify->slugify($inscriptions_infos_pratiques_football->getName()));
        $inscriptions_infos_pratiques_football->setRouteName('');
        $inscriptions_infos_pratiques_football->setRanking(1);
        $inscriptions_infos_pratiques_football->setNavBarLink($infos_pratiques_football);
        $inscriptions_infos_pratiques_football->setCreatedAtValue();

        $manager->persist($inscriptions_infos_pratiques_football);

        // NavBarDdLink "Accès_Licenciés_Football"

        $compte_acces_licencies_football = new NavBarDdLink();

        $compte_acces_licencies_football->setName("Compte");
        $compte_acces_licencies_football->setSlug($this->slugify->slugify($compte_acces_licencies_football->getName()));
        $compte_acces_licencies_football->setRouteName('');
        $compte_acces_licencies_football->setRanking(1);
        $compte_acces_licencies_football->setNavBarLink($acces_licencies_football);
        $compte_acces_licencies_football->setCreatedAtValue();

        $manager->persist($compte_acces_licencies_football);

        $convocations_acces_licencies_football = new NavBarDdLink();

        $convocations_acces_licencies_football->setName("Convocations");
        $convocations_acces_licencies_football->setSlug($this->slugify->slugify($convocations_acces_licencies_football->getName()));
        $convocations_acces_licencies_football->setRouteName('');
        $convocations_acces_licencies_football->setRanking(2);
        $convocations_acces_licencies_football->setNavBarLink($acces_licencies_football);
        $convocations_acces_licencies_football->setCreatedAtValue();

        $manager->persist($convocations_acces_licencies_football);

        $se_deconnecter_acces_licencies_football = new NavBarDdLink();

        $se_deconnecter_acces_licencies_football->setName("Se Déconnecter");
        $se_deconnecter_acces_licencies_football->setSlug($this->slugify->slugify($se_deconnecter_acces_licencies_football->getName()));
        $se_deconnecter_acces_licencies_football->setRouteName('');
        $se_deconnecter_acces_licencies_football->setRanking(3);
        $se_deconnecter_acces_licencies_football->setNavBarLink($acces_licencies_football);
        $se_deconnecter_acces_licencies_football->setCreatedAtValue();

        $manager->persist($se_deconnecter_acces_licencies_football);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
