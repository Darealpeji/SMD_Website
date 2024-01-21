<?php

namespace App\EventSubscriber;

use App\Entity\Post;
use App\Entity\Team;
use App\Entity\Member;
use App\Entity\Article;
use App\Entity\Section;
use App\Entity\Activity;
use App\Entity\Training;
use App\Entity\Association;
use App\Entity\TeamCategory;
use App\Entity\ActivityClass;
use App\Entity\ActivityPlace;
use App\Entity\ArticleCategory;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\NavBarSubMenuLoggedInMember;
use App\Entity\Role;
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

        if (method_exists($entityInstance, 'getNavBarMenus')) {

            $navBarMenus = $entityInstance->getNavBarMenus();

            foreach ($navBarMenus as $navBarMenu) {

                $navBarSubMenus = $navBarMenu->getNavBarSubMenus();

                if ($navBarMenu->getCreatedAt() === null) {
                    $navBarMenu->setCreatedAtValue();
                }

                foreach ($navBarSubMenus as $navBarSubMenu) {

                    if ($navBarSubMenu->getCreatedAt() === null) {
                        $navBarSubMenu->setCreatedAtValue();
                    }
                }
            }
        }

        if (method_exists($entityInstance, 'getTeams')) {

            $teams = $entityInstance->getTeams();

            foreach ($teams as $team) {

                if ($team->getCreatedAt() === null) {
                    $team->setCreatedAtValue();
                }
            }
        }

        if (method_exists($entityInstance, 'getActivityClasses')) {

            $activityClasses = $entityInstance->getActivityClasses();

            foreach ($activityClasses as $activityClass) {

                if ($activityClass->getCreatedAt() === null) {
                    $activityClass->setCreatedAtValue();
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

        if (method_exists($entityInstance, 'getNavBarMenus')) {

            $navBarMenus = $entityInstance->getNavBarMenus();

            foreach ($navBarMenus as $navBarMenu) {

                $section = $navBarMenu->getSection();
                $association = $navBarMenu->getAssociation();
                $navBarSubMenus = $navBarMenu->getNavBarSubMenus();

                if ($navBarMenu->getCreatedAt() === null) {
                    $navBarMenu->setCreatedAtValue();

                    if ($section !== null) {
                        $section->setUpdatedAtValue();
                    }

                    if ($association !== null) {
                        $association->setUpdatedAtValue();
                    }
                }

                $originalNavBarMenu = $this->entityManager->getUnitOfWork()->getOriginalEntityData($navBarMenu);

                if ($this->hasChanges($navBarMenu, $originalNavBarMenu)) {
                    $navBarMenu->setUpdatedAtValue();

                    if ($section !== null) {
                        $section->setUpdatedAtValue();
                    }

                    if ($association !== null) {
                        $association->setUpdatedAtValue();
                    }
                }

                foreach ($navBarSubMenus as $navBarSubMenu) {

                    if ($navBarSubMenu->getCreatedAt() === null) {
                        $navBarSubMenu->setCreatedAtValue();

                        if ($section !== null) {
                            $section->setUpdatedAtValue();
                        }

                        if ($association !== null) {
                            $association->setUpdatedAtValue();
                        }

                        $navBarMenu->setUpdatedAtValue();
                    }

                    $originalNavBarSubMenu = $this->entityManager->getUnitOfWork()->getOriginalEntityData($navBarSubMenu);

                    if ($this->hasChanges($navBarSubMenu, $originalNavBarSubMenu)) {
                        $navBarSubMenu->setUpdatedAtValue();

                        if ($section !== null) {
                            $section->setUpdatedAtValue();
                        }

                        if ($association !== null) {
                            $association->setUpdatedAtValue();
                        }

                        $navBarMenu->setUpdatedAtValue();
                    }
                }
            }
        }

        if (method_exists($entityInstance, 'getTeams')) {

            $teams = $entityInstance->getTeams();

            foreach ($teams as $team) {

                $teamCategory = $team->getTeamCategory();

                if ($team->getCreatedAt() === null) {
                    $team->setCreatedAtValue();

                    if ($teamCategory !== null) {
                        $teamCategory->setUpdatedAtValue();
                    }
                }

                $originalTeam = $this->entityManager->getUnitOfWork()->getOriginalEntityData($team);

                if ($this->hasChanges($team, $originalTeam)) {
                    $team->setUpdatedAtValue();

                    if ($teamCategory !== null) {
                        $teamCategory->setUpdatedAtValue();
                    }
                }
            }
        }

        if (method_exists($entityInstance, 'getActivityClasses')) {

            $activityClasses = $entityInstance->getActivityClasses();

            foreach ($activityClasses as $activityClass) {

                $activity = $activityClass->getActivity();

                if ($activityClass->getCreatedAt() === null) {
                    $activityClass->setCreatedAtValue();

                    if ($activity !== null) {
                        $activity->setUpdatedAtValue();
                    }
                }

                $originalActivityClass = $this->entityManager->getUnitOfWork()->getOriginalEntityData($activityClass);

                if ($this->hasChanges($activityClass, $originalActivityClass)) {
                    $activityClass->setUpdatedAtValue();

                    if ($activity !== null) {
                        $activity->setUpdatedAtValue();
                    }
                }
            }
        }
    }

    private function supportsEntity($entity): bool
    {
        return $entity instanceof Association
            || $entity instanceof Section
            || $entity instanceof NavBarSubMenuLoggedInMember
            || $entity instanceof Article
            || $entity instanceof ArticleCategory
            || $entity instanceof ActivityPlace
            || $entity instanceof TeamCategory
            || $entity instanceof Team
            || $entity instanceof Training
            || $entity instanceof Activity
            || $entity instanceof ActivityClass
            || $entity instanceof Post
            || $entity instanceof Role
            || $entity instanceof Member;
    }

    private function hasChanges($entity, $originalData): bool
    {
        foreach ($originalData as $property => $originalValue) {
            $getterMethod = 'get' . ucfirst($property);

            if (method_exists($entity, $getterMethod)) {
                $currentValue = $entity->$getterMethod();

                if ($originalValue !== $currentValue) {
                    return true;
                }
            }
        }

        return false;
    }
}
