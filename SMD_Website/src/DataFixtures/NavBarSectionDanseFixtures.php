<?php

namespace App\DataFixtures;

use App\Entity\NavBarLink;
use Cocur\Slugify\Slugify;
use App\Entity\NavBarDdLink;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NavBarSectionDanseFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entités "NavBarLink" #####

        // NavBarLink "Section Danse"

        $accueil_danse = new NavBarLink();

        $accueil_danse->setName("Danse - Accueil");
        $accueil_danse->setTitle("Accueil");
        $accueil_danse->setSlug("section-danse");
        $accueil_danse->setPath("section-danse");
        $accueil_danse->setRanking(1);
        $accueil_danse->setSection($this->getReference(AssoSectionsFixtures::DANSE));
        $accueil_danse->setCreatedAtValue();

        $manager->persist($accueil_danse);

        $presentation_danse = new NavBarLink();

        $presentation_danse->setName("Danse - Présentation");
        $presentation_danse->setTitle("Présentation");
        $presentation_danse->setSlug($this->slugify->slugify($presentation_danse->getTitle()));
        $presentation_danse->setPath($this->getReference(AssoSectionsFixtures::DANSE)->getSlug() . "/" . $this->slugify->slugify($presentation_danse->getTitle()));
        $presentation_danse->setRanking(2);
        $presentation_danse->setSection($this->getReference(AssoSectionsFixtures::DANSE));
        $presentation_danse->setCreatedAtValue();

        $manager->persist($presentation_danse);

        $nos_danses_danse = new NavBarLink();

        $nos_danses_danse->setName("Danse - Nos Danses");
        $nos_danses_danse->setTitle("Nos Danses");
        $nos_danses_danse->setSlug($this->slugify->slugify($nos_danses_danse->getTitle()));
        $nos_danses_danse->setPath($this->getReference(AssoSectionsFixtures::DANSE)->getSlug() . "/" . $this->slugify->slugify($nos_danses_danse->getTitle()));
        $nos_danses_danse->setRanking(3);
        $nos_danses_danse->setSection($this->getReference(AssoSectionsFixtures::DANSE));
        $nos_danses_danse->setCreatedAtValue();

        $manager->persist($nos_danses_danse);

        $boutique_danse = new NavBarLink();

        $boutique_danse->setName("Danse - Boutique");
        $boutique_danse->setTitle("Boutique");
        $boutique_danse->setSlug($this->slugify->slugify($boutique_danse->getTitle()));
        $boutique_danse->setPath($this->getReference(AssoSectionsFixtures::DANSE)->getSlug() . "/" . $this->slugify->slugify($boutique_danse->getTitle()));
        $boutique_danse->setRanking(4);
        $boutique_danse->setSection($this->getReference(AssoSectionsFixtures::DANSE));
        $boutique_danse->setCreatedAtValue();

        $manager->persist($boutique_danse);

        $infos_pratiques_danse = new NavBarLink();

        $infos_pratiques_danse->setName("Danse - Infos Pratiques");
        $infos_pratiques_danse->setTitle("Infos Pratiques");
        $infos_pratiques_danse->setSlug($this->slugify->slugify($infos_pratiques_danse->getTitle()));
        $infos_pratiques_danse->setPath($this->getReference(AssoSectionsFixtures::DANSE)->getSlug() . "/" . $this->slugify->slugify($infos_pratiques_danse->getTitle()));
        $infos_pratiques_danse->setRanking(5);
        $infos_pratiques_danse->setSection($this->getReference(AssoSectionsFixtures::DANSE));
        $infos_pratiques_danse->setCreatedAtValue();

        $manager->persist($infos_pratiques_danse);

        $acces_membres_danse = new NavBarLink();

        $acces_membres_danse->setName("Danse - Accès Membres");
        $acces_membres_danse->setTitle("Accès Membres");
        $acces_membres_danse->setSlug($this->slugify->slugify($acces_membres_danse->getTitle()));
        $acces_membres_danse->setPath($this->getReference(AssoSectionsFixtures::DANSE)->getSlug() . "/" . $this->slugify->slugify($acces_membres_danse->getTitle()));
        $acces_membres_danse->setRanking(6);
        $acces_membres_danse->setSection($this->getReference(AssoSectionsFixtures::DANSE));
        $acces_membres_danse->setCreatedAtValue();

        $manager->persist($acces_membres_danse);

        $retour_danse = new NavBarLink();

        $retour_danse->setName("Danse - Retour");
        $retour_danse->setTitle("Retour");
        $retour_danse->setSlug($this->slugify->slugify($retour_danse->getTitle()));
        $retour_danse->setPath("/");
        $retour_danse->setRanking(6);
        $retour_danse->setSection($this->getReference(AssoSectionsFixtures::DANSE));
        $retour_danse->setCreatedAtValue();

        $manager->persist($retour_danse);

        $manager->flush();

        ##### Entités "NavBarDdLink" #####

        // NavBarDdLink "Accueil_Danse"

        $actualites_accueil_danse = new NavBarDdLink();

        $actualites_accueil_danse->setName("Actualités");
        $actualites_accueil_danse->setSlug($this->slugify->slugify($actualites_accueil_danse->getName()));
        $actualites_accueil_danse->setPath($accueil_danse->getPath() . "/" . $this->slugify->slugify($actualites_accueil_danse->getName()));
        $actualites_accueil_danse->setRanking(1);
        $actualites_accueil_danse->setNavBarLink($accueil_danse);
        $actualites_accueil_danse->setCreatedAtValue();

        $manager->persist($actualites_accueil_danse);

        // NavBarDdLink "Nos_Danses_Danse"

        $danse_moderne_jazz_nos_danses_danse = new NavBarDdLink();

        $danse_moderne_jazz_nos_danses_danse->setName("Parents-Bébé");
        $danse_moderne_jazz_nos_danses_danse->setSlug($this->slugify->slugify($danse_moderne_jazz_nos_danses_danse->getName()));
        $danse_moderne_jazz_nos_danses_danse->setPath($nos_danses_danse->getPath() . "/" . $this->slugify->slugify($danse_moderne_jazz_nos_danses_danse->getName()));
        $danse_moderne_jazz_nos_danses_danse->setRanking(1);
        $danse_moderne_jazz_nos_danses_danse->setNavBarLink($nos_danses_danse);
        $danse_moderne_jazz_nos_danses_danse->setCreatedAtValue();

        $manager->persist($danse_moderne_jazz_nos_danses_danse);

        $danse_de_salon_nos_danses_danse = new NavBarDdLink();

        $danse_de_salon_nos_danses_danse->setName("Eveil Gymnique");
        $danse_de_salon_nos_danses_danse->setSlug($this->slugify->slugify($danse_de_salon_nos_danses_danse->getName()));
        $danse_de_salon_nos_danses_danse->setPath($nos_danses_danse->getPath() . "/" . $this->slugify->slugify($danse_de_salon_nos_danses_danse->getName()));
        $danse_de_salon_nos_danses_danse->setRanking(2);
        $danse_de_salon_nos_danses_danse->setNavBarLink($nos_danses_danse);
        $danse_de_salon_nos_danses_danse->setCreatedAtValue();

        $manager->persist($danse_de_salon_nos_danses_danse);

        $danse_bretonne_nos_danses_danse = new NavBarDdLink();

        $danse_bretonne_nos_danses_danse->setName("Loisirs");
        $danse_bretonne_nos_danses_danse->setSlug($this->slugify->slugify($danse_bretonne_nos_danses_danse->getName()));
        $danse_bretonne_nos_danses_danse->setPath($nos_danses_danse->getPath() . "/" . $this->slugify->slugify($danse_bretonne_nos_danses_danse->getName()));
        $danse_bretonne_nos_danses_danse->setRanking(3);
        $danse_bretonne_nos_danses_danse->setNavBarLink($nos_danses_danse);
        $danse_bretonne_nos_danses_danse->setCreatedAtValue();

        $manager->persist($danse_bretonne_nos_danses_danse);

        // NavBarDdLink "Accès_Membres_Danse"

        $compte_acces_membres_danse = new NavBarDdLink();

        $compte_acces_membres_danse->setName("Compte");
        $compte_acces_membres_danse->setSlug($this->slugify->slugify($compte_acces_membres_danse->getName()));
        $compte_acces_membres_danse->setPath($acces_membres_danse->getPath() . "/" . $this->slugify->slugify($compte_acces_membres_danse->getName()));
        $compte_acces_membres_danse->setRanking(1);
        $compte_acces_membres_danse->setNavBarLink($acces_membres_danse);
        $compte_acces_membres_danse->setCreatedAtValue();

        $manager->persist($compte_acces_membres_danse);

        $se_deconnecter_acces_membres_danse = new NavBarDdLink();

        $se_deconnecter_acces_membres_danse->setName("Se Déconnecter");
        $se_deconnecter_acces_membres_danse->setSlug($this->slugify->slugify($se_deconnecter_acces_membres_danse->getName()));
        $se_deconnecter_acces_membres_danse->setPath($acces_membres_danse->getPath() . "/" . $this->slugify->slugify($se_deconnecter_acces_membres_danse->getName()));
        $se_deconnecter_acces_membres_danse->setRanking(2);
        $se_deconnecter_acces_membres_danse->setNavBarLink($acces_membres_danse);
        $se_deconnecter_acces_membres_danse->setCreatedAtValue();

        $manager->persist($se_deconnecter_acces_membres_danse);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
