<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Member;
use App\Entity\Section;
use App\Entity\Association;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\DataFixtures\Constants\RolesConstants;
use App\DataFixtures\Constants\MembersConstants;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\DataFixtures\Constants\OrganizationsConstants;
use App\Entity\Role;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class MembersFixtures extends Fixture implements DependentFixtureInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    private \Symfony\Component\Console\Style\SymfonyStyle $io;

    public function __construct(UserPasswordHasherInterface $passwordHasher, SymfonyStyle $io)
    {
        $this->passwordHasher = $passwordHasher;
        $this->io = $io;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadRole($manager);
        $this->loadMember($manager);
        $this->loadLicensees($manager);
        $this->dumpSummaryFixtures($manager);
    }

    private function loadRole(ObjectManager $manager)
    {
        $rolesData = RolesConstants::ROLES;

        foreach ($rolesData as $roleReference => $roleData) {
            $name = $roleData["name"];
            $label = $roleData["label"];
            $organizations = $roleData["organizations"];

            $role = $this->createRole(
                $name,
                $label,
                $organizations
            );

            $manager->persist($role);
            $this->setReference($roleReference, $role);
        }

        $manager->flush();
    }

    private function loadMember(ObjectManager $manager)
    {
        $membersData = MembersConstants::MEMBERS;
        $membersCount = count($membersData);

        $this->io->newLine();
        $this->io->title("Création des Membres");
        $this->io->progressStart($membersCount);

        foreach ($membersData as $memberReference => $memberData) {
            $firstName = $memberData['firstName'];
            $lastName = $memberData['lastName'];
            $roles = $memberData['roles'];
            $organizations = $memberData['organizations'];

            $member = $this->createMember(
                $firstName,
                $lastName,
                $roles,
                $organizations
            );

            $manager->persist($member);
            $this->setReference($memberReference, $member);
            $this->io->progressAdvance();
        }

        $manager->flush();
        $this->io->progressFinish();
    }

    private function loadLicensees(ObjectManager $manager)
    {
        $faker = Factory::create();

        $organizations = OrganizationsConstants::getSections();

        $this->io->title("Création des Licenciés");
        $this->io->progressStart(90);

        foreach ($organizations as $organization) {
            for ($i = 0; $i < 10; $i++) {
                $firstName = $faker->firstName;
                $lastName = $faker->lastName;
                $roles = [rolesConstants::ROLE_LICENSEE];

                $member = $this->createMember(
                    $firstName,
                    $lastName,
                    $roles,
                    [$organization]
                );

                $manager->persist($member);
                $this->io->progressAdvance();
            }
        }

        $manager->flush();
        $this->io->progressFinish();
    }

    private function createRole(string $name, string $label, array $organizations): Role
    {
        $role = new Role();
        $role
            ->setName($name)
            ->setLabel($label)
            ->setCreatedAtValue();

        $this->addRoleToOrganization($role, $organizations);

        return $role;
    }

    private function createMember(string $firstName, string $lastName, array $roles, array $organizations): Member
    {
        $email = strtolower(str_replace(' ', '_', $firstName) . "_" . str_replace(' ', '_', $lastName) . MembersConstants::DOMAIN_NAME_EMAIL);

        $member = new Member();
        $member
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setEmail($email)
            ->setPassword(MembersConstants::PASSWORD)
            ->setCreatedAtValue();

        $encodedPassword = $this->passwordHasher->hashPassword($member, MembersConstants::PASSWORD);
        $member->setPassword($encodedPassword);

        foreach ($roles as $role) {
            $roleReference = $this->getReference($role);
            $member->addRoles($roleReference);
        }

        $this->addMemberToOrganization($member, $organizations);

        return $member;
    }

    private function addMemberToOrganization(Member $member, array $organizations)
    {
        foreach ($organizations as $organization) {
            $organizationReference = $this->getReference($organization);

            if ($organization === OrganizationsConstants::ASSOCIATION) {
                $member->setAssociation($organizationReference);
            } else {
                $member->addSections($organizationReference);
            }
        }
    }

    private function addRoleToOrganization(Role $role, array $organizations)
    {
        foreach ($organizations as $organization) {
            $organizationReference = $this->getReference($organization);

            if ($organization === OrganizationsConstants::ASSOCIATION) {
                $role->setAssociation($organizationReference);
            } else {
                $role->addSections($organizationReference);
            }
        }
    }

    private function dumpSummaryFixtures(ObjectManager $manager)
    {
        $associationRepository = $manager->getRepository(Association::class);
        $sectionRepository = $manager->getRepository(Section::class);
        $roleRepository = $manager->getRepository(Role::class);

        $this->io->newLine();
        $this->io->title("Nombre d'Utilisateurs pour l'");
        $this->dumpMembersByOrganizations($this->io, $associationRepository);
        $this->io->title("Nombre d'Utilisateurs par Section :");
        $this->dumpMembersByOrganizations($this->io, $sectionRepository);
        $this->dumpMembersByRoles($this->io, $roleRepository);

        $this->io->success("Membre(s) créée(s) - MembersFixtures terminé");
    }

    private function dumpMembersByOrganizations($io, $organizationRepository)
    {
        $organizations = $organizationRepository->findAll();

        foreach ($organizations as $organization) {
            $organizationName = $organization->getName();
            $membersCount = $organization->getMembers()->count();

            $io->text("- $organizationName : " . $membersCount . " utilisateur(s) affecté(s)");
        }
    }

    private function dumpMembersByRoles($io, $roleRepository)
    {
        $io->title("Nombre d'Utilisateurs par Rôles :");

        $dumpMembers = $roleRepository->getMembersByRoles();

        foreach ($dumpMembers as $result) {
            $roleName = $result['roleName'];
            $roleLabel = $result['roleLabel'];
            $membersCount = $result['membersCount'];

            $io->text("- $roleName - $roleLabel : " . $membersCount . " utilisateur(s) affecté(s)");
        }
    }

    public function getDependencies()
    {
        return [
            OrganizationsFixtures::class,
        ];
    }
}
