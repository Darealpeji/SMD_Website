<?php

namespace App\Service;

use App\Entity\Member;
use App\Entity\Section;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\NavBarSubMenuLoggedInMember;
use Symfony\Bundle\SecurityBundle\Security;
use App\Repository\NavBarSubMenuLoggedInMemberRepository;
use Symfony\Component\VarDumper\VarDumper;

class NavBarService
{
    private $security;
    private $entityManager;
    private $navBarSubMenuLoggedInMemberRepository;

    public function __construct(
        Security $security,
        EntityManagerInterface $entityManager,
        NavBarSubMenuLoggedInMemberRepository $navBarSubMenuLoggedInMemberRepository
    ) {
        $this->security = $security;
        $this->entityManager = $entityManager;
        $this->navBarSubMenuLoggedInMemberRepository = $navBarSubMenuLoggedInMemberRepository;
    }

    public function generateNavBarSubMenusLoggedInMember()
    {
        $menu = [];

        // Récupérer l'utilisateur actuel
        $user = $this->security->getUser();

        // Récupérer les rôles de l'utilisateur
        $userRoles = $user ? $user->getRoles() : [];
        dump($userRoles);

        // Récupérer les sections de l'utilisateur
        $userSections = $user instanceof Member ? $user->getSections()->toArray() : [];

        // Récupérer tous les sous-menus
        $navBarSubMenus = $this->entityManager->getRepository(NavBarSubMenuLoggedInMember::class)->findAll();

        foreach ($navBarSubMenus as $navBarSubMenu) {
            // Filtrer les sous-menus en fonction des conditions
            if ($this->shouldDisplaySubMenu($userRoles, $navBarSubMenu, $userSections)) {
                $menu[] = [
                    'label' => $navBarSubMenu->getLabel(),
                    'routeName' => $navBarSubMenu->getRouteName(),
                ];
            }
        }

        return $menu;
    }

    private function shouldDisplaySubMenu(array $userRoles, NavBarSubMenuLoggedInMember $navBarSubMenu, array $userSections): bool
    {
        // Constantes pour les rôles
        $roleLicensee = 'ROLE_LICENSEE';
        $roleEditorPrefix = 'ROLE_EDITOR_';
        $roleCoachPrefix = 'ROLE_COACH_';
        $roleAdminPrefix = 'ROLE_ADMIN_';
        $roleSuperAdmin = 'ROLE_SUPER_ADMIN';

        // Constantes pour les noms de sous-menus
        $monCompte = 'Mon Compte';
        $seDeconnecter = 'Se Déconnecter';
        $convocation = 'Convocation';
        $gestionArticles = 'Gestion des Articles';
        $gestionConvocations = 'Gestion des Convocations';
        $espaceAdministrateur = 'Espace Administrateur';

        // Conditions simplifiées pour chaque cas
        $isLicensee = in_array($roleLicensee, $userRoles);
        $isEditor = $this->hasAnyRoleWithPrefix($roleEditorPrefix, $userRoles);
        $isCoach = $this->hasAnyRoleWithPrefix($roleCoachPrefix, $userRoles);
        $isAdmin = $this->hasAnyRoleWithPrefix($roleAdminPrefix, $userRoles);
        $isSuperAdmin = in_array($roleSuperAdmin, $userRoles);
        $isInChorale = $this->isInChorale($userSections);
        $hasSectionWithConvocation = $this->hasSectionWithConvocation($userSections);

        switch (true) {
            case $isLicensee && in_array($navBarSubMenu->getLabel(), [$monCompte, $seDeconnecter]):
            case $isLicensee && $hasSectionWithConvocation && $navBarSubMenu->getLabel() === $convocation:
            case $isLicensee && $isInChorale && in_array($navBarSubMenu->getLabel(), ['Echo Raleur', 'Lire une Partition', 'Fichiers MP3', 'PV Bureau']):
            case $isCoach && in_array($navBarSubMenu->getLabel(), [$monCompte, $seDeconnecter]):
            case $isCoach && $hasSectionWithConvocation && $navBarSubMenu->getLabel() === $convocation:
            case $isCoach && $isInChorale && in_array($navBarSubMenu->getLabel(), ['Echo Raleur', 'Lire une Partition', 'Fichiers MP3', 'PV Bureau']):
            case $isEditor && in_array($navBarSubMenu->getLabel(), [$monCompte, $gestionArticles, $seDeconnecter]):
            case $isAdmin && in_array($navBarSubMenu->getLabel(), [$monCompte, $espaceAdministrateur, $seDeconnecter]):
            case $isSuperAdmin && in_array($navBarSubMenu->getLabel(), [$monCompte, $espaceAdministrateur, $seDeconnecter]):
            case $isSuperAdmin && $hasSectionWithConvocation && $navBarSubMenu->getLabel() === $convocation:
            case $isSuperAdmin && $isInChorale && in_array($navBarSubMenu->getLabel(), ['Echo Raleur', 'Lire une Partition', 'Fichiers MP3', 'PV Bureau']):
                return true;

            default:
                return false;
        }
    }

    private function hasAnyRoleWithPrefix(string $prefix, array $roles): bool
    {
        foreach ($roles as $role) {
            if (strpos($role, $prefix) === 0) {
                return true;
            }
        }

        return false;
    }


    private function hasSectionWithConvocation(array $userSections): bool
    {
        foreach ($userSections as $section) {
            if ($section instanceof Section && $section->isManageConvocation() === true) {
                return true;
            }
        }

        return false;
    }

    private function isInChorale(array $userSections): bool
    {
        foreach ($userSections as $section) {
            if ($section instanceof Section && $section->getName() === 'Section Chorale') {
                return true;
            }
        }

        return false;
    }
}
