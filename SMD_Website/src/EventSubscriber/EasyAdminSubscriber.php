<?php

namespace App\EventSubscriber;

use App\Entity\Article;
use App\Entity\Section;
use App\Entity\Association;
use App\Entity\ArticleCategory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setCreatedAtValue'],
            BeforeEntityUpdatedEvent::class => ['setUpdatedAtValue'],
        ];
    }

    public function setCreatedAtValue(BeforeEntityPersistedEvent $event): void
    {
        $entityInstance = $event->getEntityInstance();

        if (!$this->supportsEntity($entityInstance)) {
            return;
        }

        $entityInstance->setCreatedAtValue();

        if (method_exists($entityInstance, 'getNavBarLinks')) {

            $navBarLinks = $entityInstance->getNavBarLinks();
            
            foreach ($navBarLinks as $navBarLink) {

                $navBarDdLinks = $navBarLink->getNavBarDdLinks();
                
                if ($navBarLink->getCreatedAt() === null) {
                    $navBarLink->setCreatedAtValue();
                }

                foreach ($navBarDdLinks as $navBarDdLink) {

                    if ($navBarDdLink->getCreatedAt() === null) {
                        $navBarDdLink->setCreatedAtValue();
                    }
                }
            }
        }
    }

    public function setUpdatedAtValue(BeforeEntityUpdatedEvent $event): void
    {
        $entityInstance = $event->getEntityInstance();

        if (!$this->supportsEntity($entityInstance)) {
            return;
        }

        $originalEntity = $this->entityManager->getUnitOfWork()->getOriginalEntityData($entityInstance);

        if ($this->hasChanges($entityInstance, $originalEntity)) {
            $entityInstance->setUpdatedAtValue();

        }

        if (method_exists($entityInstance, 'getNavBarLinks')) {

            $navBarLinks = $entityInstance->getNavBarLinks();
            
            foreach ($navBarLinks as $navBarLink) {

                $section = $navBarLink->getSection();
                $association = $navBarLink->getAssociation();
                $navBarDdLinks = $navBarLink->getNavBarDdLinks();

                if ($navBarLink->getCreatedAt() === null) {
                    $navBarLink->setCreatedAtValue();

                    if ($section !== null) {
                        $section->setUpdatedAtValue();
                    }

                    if ($association !== null) {
                        $association->setUpdatedAtValue();
                    }
                }

                $originalNavBarLink = $this->entityManager->getUnitOfWork()->getOriginalEntityData($navBarLink);

                if ($this->hasChanges($navBarLink, $originalNavBarLink)) {
                    $navBarLink->setUpdatedAtValue();

                    if ($section !== null) {
                        $section->setUpdatedAtValue();
                    }

                    if ($association !== null) {
                        $association->setUpdatedAtValue();
                    }
                }

                foreach ($navBarDdLinks as $navBarDdLink) {

                    if ($navBarDdLink->getCreatedAt() === null) {
                        $navBarDdLink->setCreatedAtValue();
        
                        if ($section !== null) {
                            $section->setUpdatedAtValue();
                        }
        
                        if ($association !== null) {
                            $association->setUpdatedAtValue();
                        }

                        $navBarLink->setUpdatedAtValue();
                    }

                    $originalNavBarDdLink = $this->entityManager->getUnitOfWork()->getOriginalEntityData($navBarDdLink);

                    if ($this->hasChanges($navBarDdLink, $originalNavBarDdLink)) {
                        $navBarDdLink->setUpdatedAtValue();

                        if ($section !== null) {
                            $section->setUpdatedAtValue();
                        }

                        if ($association !== null) {
                            $association->setUpdatedAtValue();
                        }

                        $navBarLink->setUpdatedAtValue();
                    }
                }
            }
        }
    }

    private function supportsEntity($entity): bool
    {
        return $entity instanceof Association 
            || $entity instanceof Section
            || $entity instanceof Article
            || $entity instanceof ArticleCategory
            || $entity instanceof ActivityPlace;
    }

    private function hasChanges($entity, $originalData): bool
    {
        foreach ($originalData as $property => $originalValue) {
            // Convertir le nom de la propriété en méthode getter
            $getterMethod = 'get' . ucfirst($property);

            // Vérifier si la méthode getter existe
            if (method_exists($entity, $getterMethod)) {
                $currentValue = $entity->$getterMethod();

                // Si la valeur a changé, retourner true
                if ($originalValue !== $currentValue) {
                    return true;
                }
            }
        }

        return false;
    }

}