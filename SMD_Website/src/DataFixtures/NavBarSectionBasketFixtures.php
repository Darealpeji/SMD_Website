<?php

namespace App\DataFixtures;

use App\Entity\NavBarLink;
use Cocur\Slugify\Slugify;
use App\Entity\NavBarDdLink;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NavBarSectionBasketFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entités "NavBarLink" #####

        // NavBarLink "Section Basket"

        $accueil_basket = new NavBarLink();

        $accueil_basket->setName("Basket - Accueil");
        $accueil_basket->setTitle("Accueil");
        $accueil_basket->setSlug("section-basket");
        $accueil_basket->setRouteName('home_section');
        $accueil_basket->setRanking(1);
        $accueil_basket->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $accueil_basket->setCreatedAtValue();

        $manager->persist($accueil_basket);

        $le_club_basket = new NavBarLink();

        $le_club_basket->setName("Basket - Le Club");
        $le_club_basket->setTitle("Le Club");
        $le_club_basket->setSlug($this->slugify->slugify($le_club_basket->getTitle()));
        $le_club_basket->setRouteName('');
        $le_club_basket->setRanking(2);
        $le_club_basket->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $le_club_basket->setCreatedAtValue();

        $manager->persist($le_club_basket);

        $nos_equipes_basket = new NavBarLink();

        $nos_equipes_basket->setName("Basket - Nos Equipes");
        $nos_equipes_basket->setTitle("Nos Equipes");
        $nos_equipes_basket->setSlug($this->slugify->slugify($nos_equipes_basket->getTitle()));
        $nos_equipes_basket->setRouteName('');
        $nos_equipes_basket->setRanking(3);
        $nos_equipes_basket->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $nos_equipes_basket->setCreatedAtValue();

        $manager->persist($nos_equipes_basket);

        $boutique_basket = new NavBarLink();

        $boutique_basket->setName("Basket - Boutique");
        $boutique_basket->setTitle("Boutique");
        $boutique_basket->setSlug($this->slugify->slugify($boutique_basket->getTitle()));
        $boutique_basket->setRouteName('');
        $boutique_basket->setRanking(4);
        $boutique_basket->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $boutique_basket->setCreatedAtValue();

        $manager->persist($boutique_basket);

        $infos_pratiques_basket = new NavBarLink();

        $infos_pratiques_basket->setName("Basket - Infos Pratiques");
        $infos_pratiques_basket->setTitle("Infos Pratiques");
        $infos_pratiques_basket->setSlug($this->slugify->slugify($infos_pratiques_basket->getTitle()));
        $infos_pratiques_basket->setRouteName('useful_informations_section');
        $infos_pratiques_basket->setRanking(6);
        $infos_pratiques_basket->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $infos_pratiques_basket->setCreatedAtValue();

        $manager->persist($infos_pratiques_basket);

        $acces_licencies_basket = new NavBarLink();

        $acces_licencies_basket->setName("Basket - Accès Licenciés");
        $acces_licencies_basket->setTitle("Accès Licenciés");
        $acces_licencies_basket->setSlug($this->slugify->slugify($acces_licencies_basket->getTitle()));
        $acces_licencies_basket->setRouteName('');
        $acces_licencies_basket->setRanking(5);
        $acces_licencies_basket->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $acces_licencies_basket->setCreatedAtValue();

        $manager->persist($acces_licencies_basket);

        $retour_basket = new NavBarLink();

        $retour_basket->setName("Basket - Retour");
        $retour_basket->setTitle("Retour");
        $retour_basket->setSlug($this->slugify->slugify($retour_basket->getTitle()));
        $retour_basket->setRouteName('home_association');
        $retour_basket->setRanking(7);
        $retour_basket->setSection($this->getReference(AssoSectionsFixtures::BASKET));
        $retour_basket->setCreatedAtValue();

        $manager->persist($retour_basket);

        $manager->flush();

        ##### Entités "NavBarDdLink" #####

        // NavBarDdLink "Accueil_Basket"

        $actualites_accueil_basket = new NavBarDdLink();

        $actualites_accueil_basket->setName("Actualités");
        $actualites_accueil_basket->setSlug($this->slugify->slugify($actualites_accueil_basket->getName()));
        $actualites_accueil_basket->setRouteName('news_section');
        $actualites_accueil_basket->setRanking(1);
        $actualites_accueil_basket->setNavBarLink($accueil_basket);
        $actualites_accueil_basket->setCreatedAtValue();

        $manager->persist($actualites_accueil_basket);

        $la_vie_du_club_accueil_basket = new NavBarDdLink();

        $la_vie_du_club_accueil_basket->setName("La Vie du Club");
        $la_vie_du_club_accueil_basket->setSlug($this->slugify->slugify($la_vie_du_club_accueil_basket->getName()));
        $la_vie_du_club_accueil_basket->setRouteName('');
        $la_vie_du_club_accueil_basket->setRanking(2);
        $la_vie_du_club_accueil_basket->setNavBarLink($accueil_basket);
        $la_vie_du_club_accueil_basket->setCreatedAtValue();

        $manager->persist($la_vie_du_club_accueil_basket);

        $les_stages_accueil_basket = new NavBarDdLink();

        $les_stages_accueil_basket->setName("Les Stages");
        $les_stages_accueil_basket->setSlug($this->slugify->slugify($les_stages_accueil_basket->getName()));
        $les_stages_accueil_basket->setRouteName('');
        $les_stages_accueil_basket->setRanking(3);
        $les_stages_accueil_basket->setNavBarLink($accueil_basket);
        $les_stages_accueil_basket->setCreatedAtValue();

        $manager->persist($les_stages_accueil_basket);

        // NavBarDdLink "Le_Club_Basket"

        $notre_histoire_le_club_basket = new NavBarDdLink();

        $notre_histoire_le_club_basket->setName("Notre Histoire");
        $notre_histoire_le_club_basket->setSlug($this->slugify->slugify($notre_histoire_le_club_basket->getName()));
        $notre_histoire_le_club_basket->setRouteName('');
        $notre_histoire_le_club_basket->setRanking(1);
        $notre_histoire_le_club_basket->setNavBarLink($accueil_basket);
        $notre_histoire_le_club_basket->setCreatedAtValue();

        $manager->persist($notre_histoire_le_club_basket);

        $l_organigramme_le_club_basket = new NavBarDdLink();

        $l_organigramme_le_club_basket->setName("L'Organigramme");
        $l_organigramme_le_club_basket->setSlug($this->slugify->slugify($l_organigramme_le_club_basket->getName()));
        $l_organigramme_le_club_basket->setRouteName('');
        $l_organigramme_le_club_basket->setRanking(2);
        $l_organigramme_le_club_basket->setNavBarLink($accueil_basket);
        $l_organigramme_le_club_basket->setCreatedAtValue();

        $manager->persist($l_organigramme_le_club_basket);

        $nos_partenaires_le_club_basket = new NavBarDdLink();

        $nos_partenaires_le_club_basket->setName("Nos Partenaires");
        $nos_partenaires_le_club_basket->setSlug($this->slugify->slugify($nos_partenaires_le_club_basket->getName()));
        $nos_partenaires_le_club_basket->setRouteName('');
        $nos_partenaires_le_club_basket->setRanking(3);
        $nos_partenaires_le_club_basket->setNavBarLink($le_club_basket);
        $nos_partenaires_le_club_basket->setCreatedAtValue();

        $manager->persist($nos_partenaires_le_club_basket);

        // NavBarDdLink "Nos_Equipes_Basket"

        $seniors_nos_equipes_basket = new NavBarDdLink();

        $seniors_nos_equipes_basket->setName("Séniors");
        $seniors_nos_equipes_basket->setSlug($this->slugify->slugify($seniors_nos_equipes_basket->getName()));
        $seniors_nos_equipes_basket->setRouteName('');
        $seniors_nos_equipes_basket->setRanking(1);
        $seniors_nos_equipes_basket->setNavBarLink($nos_equipes_basket);
        $seniors_nos_equipes_basket->setCreatedAtValue();

        $manager->persist($seniors_nos_equipes_basket);

        $u18_nos_equipes_basket = new NavBarDdLink();

        $u18_nos_equipes_basket->setName("U18");
        $u18_nos_equipes_basket->setSlug($this->slugify->slugify($u18_nos_equipes_basket->getName()));
        $u18_nos_equipes_basket->setRouteName('');
        $u18_nos_equipes_basket->setRanking(2);
        $u18_nos_equipes_basket->setNavBarLink($nos_equipes_basket);
        $u18_nos_equipes_basket->setCreatedAtValue();

        $manager->persist($u18_nos_equipes_basket);

        $u15_nos_equipes_basket = new NavBarDdLink();

        $u15_nos_equipes_basket->setName("U15");
        $u15_nos_equipes_basket->setSlug($this->slugify->slugify($u15_nos_equipes_basket->getName()));
        $u15_nos_equipes_basket->setRouteName('');
        $u15_nos_equipes_basket->setRanking(3);
        $u15_nos_equipes_basket->setNavBarLink($nos_equipes_basket);
        $u15_nos_equipes_basket->setCreatedAtValue();

        $manager->persist($u15_nos_equipes_basket);

        $u13_nos_equipes_basket = new NavBarDdLink();

        $u13_nos_equipes_basket->setName("U13");
        $u13_nos_equipes_basket->setSlug($this->slugify->slugify($u13_nos_equipes_basket->getName()));
        $u13_nos_equipes_basket->setRouteName('');
        $u13_nos_equipes_basket->setRanking(4);
        $u13_nos_equipes_basket->setNavBarLink($nos_equipes_basket);
        $u13_nos_equipes_basket->setCreatedAtValue();

        $manager->persist($u13_nos_equipes_basket);

        $u11_nos_equipes_basket = new NavBarDdLink();

        $u11_nos_equipes_basket->setName("U11");
        $u11_nos_equipes_basket->setSlug($this->slugify->slugify($u11_nos_equipes_basket->getName()));
        $u11_nos_equipes_basket->setRouteName('');
        $u11_nos_equipes_basket->setRanking(5);
        $u11_nos_equipes_basket->setNavBarLink($nos_equipes_basket);
        $u11_nos_equipes_basket->setCreatedAtValue();

        $manager->persist($u11_nos_equipes_basket);

        $u9_nos_equipes_basket = new NavBarDdLink();

        $u9_nos_equipes_basket->setName("U9");
        $u9_nos_equipes_basket->setSlug($this->slugify->slugify($u9_nos_equipes_basket->getName()));
        $u9_nos_equipes_basket->setRouteName('');
        $u9_nos_equipes_basket->setRanking(6);
        $u9_nos_equipes_basket->setNavBarLink($nos_equipes_basket);
        $u9_nos_equipes_basket->setCreatedAtValue();

        $manager->persist($u9_nos_equipes_basket);

        $loisirs_nos_equipes_basket = new NavBarDdLink();

        $loisirs_nos_equipes_basket->setName("Loisirs");
        $loisirs_nos_equipes_basket->setSlug($this->slugify->slugify($loisirs_nos_equipes_basket->getName()));
        $loisirs_nos_equipes_basket->setRouteName('');
        $loisirs_nos_equipes_basket->setRanking(7);
        $loisirs_nos_equipes_basket->setNavBarLink($nos_equipes_basket);
        $loisirs_nos_equipes_basket->setCreatedAtValue();

        $manager->persist($loisirs_nos_equipes_basket);

        $ecole_arbitrage_nos_equipes_basket = new NavBarDdLink();

        $ecole_arbitrage_nos_equipes_basket->setName("L'Ecole d'Arbitrage");
        $ecole_arbitrage_nos_equipes_basket->setSlug($this->slugify->slugify($ecole_arbitrage_nos_equipes_basket->getName()));
        $ecole_arbitrage_nos_equipes_basket->setRouteName('');
        $ecole_arbitrage_nos_equipes_basket->setRanking(8);
        $ecole_arbitrage_nos_equipes_basket->setNavBarLink($nos_equipes_basket);
        $ecole_arbitrage_nos_equipes_basket->setCreatedAtValue();

        $manager->persist($ecole_arbitrage_nos_equipes_basket);

        // NavBarDdLink "Infos_Pratiques_Basket"

        $inscriptions_infos_pratiques_basket = new NavBarDdLink();

        $inscriptions_infos_pratiques_basket->setName("Inscriptions");
        $inscriptions_infos_pratiques_basket->setSlug($this->slugify->slugify($inscriptions_infos_pratiques_basket->getName()));
        $inscriptions_infos_pratiques_basket->setRouteName('');
        $inscriptions_infos_pratiques_basket->setRanking(1);
        $inscriptions_infos_pratiques_basket->setNavBarLink($infos_pratiques_basket);
        $inscriptions_infos_pratiques_basket->setCreatedAtValue();

        $manager->persist($inscriptions_infos_pratiques_basket);

        // NavBarDdLink "Accès_Licenciés_Basket"

        $compte_acces_licencies_basket = new NavBarDdLink();

        $compte_acces_licencies_basket->setName("Compte");
        $compte_acces_licencies_basket->setSlug($this->slugify->slugify($compte_acces_licencies_basket->getName()));
        $compte_acces_licencies_basket->setRouteName('');
        $compte_acces_licencies_basket->setRanking(1);
        $compte_acces_licencies_basket->setNavBarLink($acces_licencies_basket);
        $compte_acces_licencies_basket->setCreatedAtValue();

        $manager->persist($compte_acces_licencies_basket);

        $convocations_acces_licencies_basket = new NavBarDdLink();

        $convocations_acces_licencies_basket->setName("Convocations");
        $convocations_acces_licencies_basket->setSlug($this->slugify->slugify($convocations_acces_licencies_basket->getName()));
        $convocations_acces_licencies_basket->setRouteName('');
        $convocations_acces_licencies_basket->setRanking(2);
        $convocations_acces_licencies_basket->setNavBarLink($acces_licencies_basket);
        $convocations_acces_licencies_basket->setCreatedAtValue();

        $manager->persist($convocations_acces_licencies_basket);

        $se_deconnecter_acces_licencies_basket = new NavBarDdLink();

        $se_deconnecter_acces_licencies_basket->setName("Se Déconnecter");
        $se_deconnecter_acces_licencies_basket->setSlug($this->slugify->slugify($se_deconnecter_acces_licencies_basket->getName()));
        $se_deconnecter_acces_licencies_basket->setRouteName('');
        $se_deconnecter_acces_licencies_basket->setRanking(3);
        $se_deconnecter_acces_licencies_basket->setNavBarLink($acces_licencies_basket);
        $se_deconnecter_acces_licencies_basket->setCreatedAtValue();

        $manager->persist($se_deconnecter_acces_licencies_basket);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
