<?php

namespace App\DataFixtures;

use App\Entity\NavBarLink;
use Cocur\Slugify\Slugify;
use App\Entity\NavBarDdLink;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NavBarSectionPetanqueFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entités "NavBarLink" #####

        // NavBarLink "Section Pétanque"

        $accueil_petanque = new NavBarLink();

        $accueil_petanque->setName("Pétanque - Accueil");
        $accueil_petanque->setTitle("Accueil");
        $accueil_petanque->setSlug("section-petanque");
        $accueil_petanque->setRouteName('home_section');
        $accueil_petanque->setRanking(1);
        $accueil_petanque->setSection($this->getReference(AssoSectionsFixtures::PETANQUE));
        $accueil_petanque->setCreatedAtValue();

        $manager->persist($accueil_petanque);

        $presentation_petanque = new NavBarLink();

        $presentation_petanque->setName("Pétanque - Présentation");
        $presentation_petanque->setTitle("Présentation");
        $presentation_petanque->setSlug($this->slugify->slugify($presentation_petanque->getTitle()));
        $presentation_petanque->setRouteName('');
        $presentation_petanque->setRanking(2);
        $presentation_petanque->setSection($this->getReference(AssoSectionsFixtures::PETANQUE));
        $presentation_petanque->setCreatedAtValue();

        $manager->persist($presentation_petanque);

        $infos_pratiques_petanque = new NavBarLink();

        $infos_pratiques_petanque->setName("Pétanque - Infos Pratiques");
        $infos_pratiques_petanque->setTitle("Infos Pratiques");
        $infos_pratiques_petanque->setSlug($this->slugify->slugify($infos_pratiques_petanque->getTitle()));
        $infos_pratiques_petanque->setRouteName('useful_informations_section');
        $infos_pratiques_petanque->setRanking(3);
        $infos_pratiques_petanque->setSection($this->getReference(AssoSectionsFixtures::PETANQUE));
        $infos_pratiques_petanque->setCreatedAtValue();

        $manager->persist($infos_pratiques_petanque);

        $acces_membres_petanque = new NavBarLink();

        $acces_membres_petanque->setName("Pétanque - Accès Membres");
        $acces_membres_petanque->setTitle("Accès Membres");
        $acces_membres_petanque->setSlug($this->slugify->slugify($acces_membres_petanque->getTitle()));
        $acces_membres_petanque->setRouteName('');
        $acces_membres_petanque->setRanking(4);
        $acces_membres_petanque->setSection($this->getReference(AssoSectionsFixtures::PETANQUE));
        $acces_membres_petanque->setCreatedAtValue();

        $manager->persist($acces_membres_petanque);

        $retour_petanque = new NavBarLink();

        $retour_petanque->setName("Pétanque - Retour");
        $retour_petanque->setTitle("Retour");
        $retour_petanque->setSlug($this->slugify->slugify($retour_petanque->getTitle()));
        $retour_petanque->setRouteName('home_association');
        $retour_petanque->setRanking(5);
        $retour_petanque->setSection($this->getReference(AssoSectionsFixtures::PETANQUE));
        $retour_petanque->setCreatedAtValue();

        $manager->persist($retour_petanque);

        $manager->flush();

        ##### Entités "NavBarDdLink" #####

        // NavBarDdLink "Accueil_Pétanque"

        $actualites_accueil_petanque = new NavBarDdLink();

        $actualites_accueil_petanque->setName("Actualités");
        $actualites_accueil_petanque->setSlug($this->slugify->slugify($actualites_accueil_petanque->getName()));
        $actualites_accueil_petanque->setRouteName('news_section');
        $actualites_accueil_petanque->setRanking(1);
        $actualites_accueil_petanque->setNavBarLink($accueil_petanque);
        $actualites_accueil_petanque->setCreatedAtValue();

        $manager->persist($actualites_accueil_petanque);

        // NavBarDdLink "Accès_Membres_Pétanque"

        $compte_acces_membres_petanque = new NavBarDdLink();

        $compte_acces_membres_petanque->setName("Compte");
        $compte_acces_membres_petanque->setSlug($this->slugify->slugify($compte_acces_membres_petanque->getName()));
        $compte_acces_membres_petanque->setRouteName('');
        $compte_acces_membres_petanque->setRanking(1);
        $compte_acces_membres_petanque->setNavBarLink($acces_membres_petanque);
        $compte_acces_membres_petanque->setCreatedAtValue();

        $manager->persist($compte_acces_membres_petanque);

        $se_deconnecter_acces_membres_petanque = new NavBarDdLink();

        $se_deconnecter_acces_membres_petanque->setName("Se Déconnecter");
        $se_deconnecter_acces_membres_petanque->setSlug($this->slugify->slugify($se_deconnecter_acces_membres_petanque->getName()));
        $se_deconnecter_acces_membres_petanque->setRouteName('');
        $se_deconnecter_acces_membres_petanque->setRanking(3);
        $se_deconnecter_acces_membres_petanque->setNavBarLink($acces_membres_petanque);
        $se_deconnecter_acces_membres_petanque->setCreatedAtValue();

        $manager->persist($se_deconnecter_acces_membres_petanque);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
