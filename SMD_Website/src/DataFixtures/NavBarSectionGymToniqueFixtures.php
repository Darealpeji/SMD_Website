<?php

namespace App\DataFixtures;

use App\Entity\NavBarLink;
use Cocur\Slugify\Slugify;
use App\Entity\NavBarDdLink;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NavBarSectionGymToniqueFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entités "NavBarLink" #####

        // NavBarLink "Section Gym Tonique"

        $accueil_gym_tonique = new NavBarLink();

        $accueil_gym_tonique->setName("Gym Tonique - Accueil");
        $accueil_gym_tonique->setTitle("Accueil");
        $accueil_gym_tonique->setSlug("section-gym-tonique");
        $accueil_gym_tonique->setRouteName('home_section');
        $accueil_gym_tonique->setRanking(1);
        $accueil_gym_tonique->setSection($this->getReference(AssoSectionsFixtures::GYM_TONIQUE));
        $accueil_gym_tonique->setCreatedAtValue();

        $manager->persist($accueil_gym_tonique);

        $presentation_gym_tonique = new NavBarLink();

        $presentation_gym_tonique->setName("Gym Tonique - Présentation");
        $presentation_gym_tonique->setTitle("Présentation");
        $presentation_gym_tonique->setSlug($this->slugify->slugify($presentation_gym_tonique->getTitle()));
        $presentation_gym_tonique->setRouteName('');
        $presentation_gym_tonique->setRanking(2);
        $presentation_gym_tonique->setSection($this->getReference(AssoSectionsFixtures::GYM_TONIQUE));
        $presentation_gym_tonique->setCreatedAtValue();

        $manager->persist($presentation_gym_tonique);

        $nos_disciplines_gym_tonique = new NavBarLink();

        $nos_disciplines_gym_tonique->setName("Gym Tonique - Nos Disciplines");
        $nos_disciplines_gym_tonique->setTitle("Nos Disciplines");
        $nos_disciplines_gym_tonique->setSlug($this->slugify->slugify($nos_disciplines_gym_tonique->getTitle()));
        $nos_disciplines_gym_tonique->setRouteName('');
        $nos_disciplines_gym_tonique->setRanking(3);
        $nos_disciplines_gym_tonique->setSection($this->getReference(AssoSectionsFixtures::GYM_TONIQUE));
        $nos_disciplines_gym_tonique->setCreatedAtValue();

        $manager->persist($nos_disciplines_gym_tonique);

        $infos_pratiques_gym_tonique = new NavBarLink();

        $infos_pratiques_gym_tonique->setName("Gym Tonique - Infos Pratiques");
        $infos_pratiques_gym_tonique->setTitle("Infos Pratiques");
        $infos_pratiques_gym_tonique->setSlug($this->slugify->slugify($infos_pratiques_gym_tonique->getTitle()));
        $infos_pratiques_gym_tonique->setRouteName('useful_informations_section');
        $infos_pratiques_gym_tonique->setRanking(4);
        $infos_pratiques_gym_tonique->setSection($this->getReference(AssoSectionsFixtures::GYM_TONIQUE));
        $infos_pratiques_gym_tonique->setCreatedAtValue();

        $manager->persist($infos_pratiques_gym_tonique);

        $acces_membres_gym_tonique = new NavBarLink();

        $acces_membres_gym_tonique->setName("Gym Tonique - Accès Membres");
        $acces_membres_gym_tonique->setTitle("Accès Membres");
        $acces_membres_gym_tonique->setSlug($this->slugify->slugify($acces_membres_gym_tonique->getTitle()));
        $acces_membres_gym_tonique->setRouteName('');
        $acces_membres_gym_tonique->setRanking(5);
        $acces_membres_gym_tonique->setSection($this->getReference(AssoSectionsFixtures::GYM_TONIQUE));
        $acces_membres_gym_tonique->setCreatedAtValue();

        $manager->persist($acces_membres_gym_tonique);

        $retour_gym_tonique = new NavBarLink();

        $retour_gym_tonique->setName("Gym Tonique - Retour");
        $retour_gym_tonique->setTitle("Retour");
        $retour_gym_tonique->setSlug($this->slugify->slugify($retour_gym_tonique->getTitle()));
        $retour_gym_tonique->setRouteName('home_association');
        $retour_gym_tonique->setRanking(6);
        $retour_gym_tonique->setSection($this->getReference(AssoSectionsFixtures::GYM_TONIQUE));
        $retour_gym_tonique->setCreatedAtValue();

        $manager->persist($retour_gym_tonique);

        $manager->flush();

        ##### Entités "NavBarDdLink" #####

        // NavBarDdLink "Accueil_Gym Tonique"

        $actualites_accueil_gym_tonique = new NavBarDdLink();

        $actualites_accueil_gym_tonique->setName("Actualités");
        $actualites_accueil_gym_tonique->setSlug($this->slugify->slugify($actualites_accueil_gym_tonique->getName()));
        $actualites_accueil_gym_tonique->setRouteName('news_section');
        $actualites_accueil_gym_tonique->setRanking(1);
        $actualites_accueil_gym_tonique->setNavBarLink($accueil_gym_tonique);
        $actualites_accueil_gym_tonique->setCreatedAtValue();

        $manager->persist($actualites_accueil_gym_tonique);

        // NavBarDdLink "Infos_Pratiques_Gym Tonique"

        $inscriptions_infos_pratiques_gym_tonique = new NavBarDdLink();

        $inscriptions_infos_pratiques_gym_tonique->setName("Inscriptions");
        $inscriptions_infos_pratiques_gym_tonique->setSlug($this->slugify->slugify($inscriptions_infos_pratiques_gym_tonique->getName()));
        $inscriptions_infos_pratiques_gym_tonique->setRouteName('');
        $inscriptions_infos_pratiques_gym_tonique->setRanking(1);
        $inscriptions_infos_pratiques_gym_tonique->setNavBarLink($infos_pratiques_gym_tonique);
        $inscriptions_infos_pratiques_gym_tonique->setCreatedAtValue();

        $manager->persist($inscriptions_infos_pratiques_gym_tonique);

        // NavBarDdLink "Accès_Membres_Gym Tonique"

        $compte_acces_membres_gym_tonique = new NavBarDdLink();

        $compte_acces_membres_gym_tonique->setName("Compte");
        $compte_acces_membres_gym_tonique->setSlug($this->slugify->slugify($compte_acces_membres_gym_tonique->getName()));
        $compte_acces_membres_gym_tonique->setRouteName('');
        $compte_acces_membres_gym_tonique->setRanking(1);
        $compte_acces_membres_gym_tonique->setNavBarLink($acces_membres_gym_tonique);
        $compte_acces_membres_gym_tonique->setCreatedAtValue();

        $manager->persist($compte_acces_membres_gym_tonique);

        $se_deconnecter_acces_membres_gym_tonique = new NavBarDdLink();

        $se_deconnecter_acces_membres_gym_tonique->setName("Se Déconnecter");
        $se_deconnecter_acces_membres_gym_tonique->setSlug($this->slugify->slugify($se_deconnecter_acces_membres_gym_tonique->getName()));
        $se_deconnecter_acces_membres_gym_tonique->setRouteName('');
        $se_deconnecter_acces_membres_gym_tonique->setRanking(3);
        $se_deconnecter_acces_membres_gym_tonique->setNavBarLink($acces_membres_gym_tonique);
        $se_deconnecter_acces_membres_gym_tonique->setCreatedAtValue();

        $manager->persist($se_deconnecter_acces_membres_gym_tonique);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
