<?php

namespace App\DataFixtures;

use App\Entity\NavBarLink;
use Cocur\Slugify\Slugify;
use App\Entity\NavBarDdLink;
use Doctrine\Persistence\ObjectManager;
use App\DataFixtures\AssoSectionsFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NavBarSectionLoisirsFixtures extends Fixture implements DependentFixtureInterface
{
    private $slugify;

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        ##### Entités "NavBarLink" #####

        // NavBarLink "Section Loisirs"

        $accueil_loisirs = new NavBarLink();

        $accueil_loisirs->setName("Loisirs - Accueil");
        $accueil_loisirs->setTitle("Accueil");
        $accueil_loisirs->setSlug("section-loisirs");
        $accueil_loisirs->setPath("section-loisirs");
        $accueil_loisirs->setRanking(1);
        $accueil_loisirs->setSection($this->getReference(AssoSectionsFixtures::LOISIRS));
        $accueil_loisirs->setCreatedAtValue();

        $manager->persist($accueil_loisirs);

        $presentation_loisirs = new NavBarLink();

        $presentation_loisirs->setName("Loisirs - Présentation");
        $presentation_loisirs->setTitle("Présentation");
        $presentation_loisirs->setSlug($this->slugify->slugify($presentation_loisirs->getTitle()));
        $presentation_loisirs->setPath($this->getReference(AssoSectionsFixtures::LOISIRS)->getSlug() . "/" . $this->slugify->slugify($presentation_loisirs->getTitle()));
        $presentation_loisirs->setRanking(2);
        $presentation_loisirs->setSection($this->getReference(AssoSectionsFixtures::LOISIRS));
        $presentation_loisirs->setCreatedAtValue();

        $manager->persist($presentation_loisirs);

        $infos_pratiques_loisirs = new NavBarLink();

        $infos_pratiques_loisirs->setName("Loisirs - Infos Pratiques");
        $infos_pratiques_loisirs->setTitle("Infos Pratiques");
        $infos_pratiques_loisirs->setSlug($this->slugify->slugify($infos_pratiques_loisirs->getTitle()));
        $infos_pratiques_loisirs->setPath($this->getReference(AssoSectionsFixtures::LOISIRS)->getSlug() . "/" . $this->slugify->slugify($infos_pratiques_loisirs->getTitle()));
        $infos_pratiques_loisirs->setRanking(3);
        $infos_pratiques_loisirs->setSection($this->getReference(AssoSectionsFixtures::LOISIRS));
        $infos_pratiques_loisirs->setCreatedAtValue();

        $manager->persist($infos_pratiques_loisirs);

        $acces_membres_loisirs = new NavBarLink();

        $acces_membres_loisirs->setName("Loisirs - Accès Membres");
        $acces_membres_loisirs->setTitle("Accès Membres");
        $acces_membres_loisirs->setSlug($this->slugify->slugify($acces_membres_loisirs->getTitle()));
        $acces_membres_loisirs->setPath($this->getReference(AssoSectionsFixtures::LOISIRS)->getSlug() . "/" . $this->slugify->slugify($acces_membres_loisirs->getTitle()));
        $acces_membres_loisirs->setRanking(4);
        $acces_membres_loisirs->setSection($this->getReference(AssoSectionsFixtures::LOISIRS));
        $acces_membres_loisirs->setCreatedAtValue();

        $manager->persist($acces_membres_loisirs);

        $retour_loisirs = new NavBarLink();

        $retour_loisirs->setName("Loisirs - Retour");
        $retour_loisirs->setTitle("Retour");
        $retour_loisirs->setSlug($this->slugify->slugify($retour_loisirs->getTitle()));
        $retour_loisirs->setPath("/");
        $retour_loisirs->setRanking(5);
        $retour_loisirs->setSection($this->getReference(AssoSectionsFixtures::LOISIRS));
        $retour_loisirs->setCreatedAtValue();

        $manager->persist($retour_loisirs);

        $manager->flush();

        ##### Entités "NavBarDdLink" #####

        // NavBarDdLink "Accueil_Loisirs"

        $actualites_accueil_loisirs = new NavBarDdLink();

        $actualites_accueil_loisirs->setName("Actualités / Evènements");
        $actualites_accueil_loisirs->setSlug($this->slugify->slugify($actualites_accueil_loisirs->getName()));
        $actualites_accueil_loisirs->setPath($accueil_loisirs->getPath() . "/" . $this->slugify->slugify($actualites_accueil_loisirs->getName()));
        $actualites_accueil_loisirs->setRanking(1);
        $actualites_accueil_loisirs->setNavBarLink($accueil_loisirs);
        $actualites_accueil_loisirs->setCreatedAtValue();

        $manager->persist($actualites_accueil_loisirs);

        // NavBarDdLink "Accès_Membres_Loisirs"

        $compte_acces_membres_loisirs = new NavBarDdLink();

        $compte_acces_membres_loisirs->setName("Compte");
        $compte_acces_membres_loisirs->setSlug($this->slugify->slugify($compte_acces_membres_loisirs->getName()));
        $compte_acces_membres_loisirs->setPath($acces_membres_loisirs->getPath() . "/" . $this->slugify->slugify($compte_acces_membres_loisirs->getName()));
        $compte_acces_membres_loisirs->setRanking(1);
        $compte_acces_membres_loisirs->setNavBarLink($acces_membres_loisirs);
        $compte_acces_membres_loisirs->setCreatedAtValue();

        $manager->persist($compte_acces_membres_loisirs);

        $se_deconnecter_acces_membres_loisirs = new NavBarDdLink();

        $se_deconnecter_acces_membres_loisirs->setName("Se Déconnecter");
        $se_deconnecter_acces_membres_loisirs->setSlug($this->slugify->slugify($se_deconnecter_acces_membres_loisirs->getName()));
        $se_deconnecter_acces_membres_loisirs->setPath($acces_membres_loisirs->getPath() . "/" . $this->slugify->slugify($se_deconnecter_acces_membres_loisirs->getName()));
        $se_deconnecter_acces_membres_loisirs->setRanking(3);
        $se_deconnecter_acces_membres_loisirs->setNavBarLink($acces_membres_loisirs);
        $se_deconnecter_acces_membres_loisirs->setCreatedAtValue();

        $manager->persist($se_deconnecter_acces_membres_loisirs);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
