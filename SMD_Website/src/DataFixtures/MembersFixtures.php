<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Member;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class MembersFixtures extends Fixture implements DependentFixtureInterface
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager)
    {
        // ...

        $superAdminCount = 0;
        $adminCount = 0;
        $editorCount = 0;
        $licenseeCounts = [];
        $adminEmails = [];
        $editorEmails = [];

        $this->loadSuperAdmin($manager);
        $superAdminCount++;

        $adminCount += $this->loadRoleMembers($manager, 'ROLE_ADMIN', $adminEmails);

        echo sprintf("Admins créés: %d\n", $adminCount);
        foreach ($adminEmails as $email) {
            echo sprintf("- %s\n", $email);
        }

        $editorCount += $this->loadRoleMembers($manager, 'ROLE_EDITOR', $editorEmails);

        echo sprintf("Éditeurs créés: %d\n", $editorCount);
        foreach ($editorEmails as $email) {
            echo sprintf("- %s\n", $email);
        }

        $licenseeCounts = $this->loadLicensees($manager);

        foreach ($licenseeCounts as $groupType => $count) {
            echo sprintf("Nombre de licenciés pour %s: %d\n", $groupType, $count);
        }

        $manager->flush();
    }

    private function loadSuperAdmin(ObjectManager $manager)
    {
        $superAdmin = new Member();
        $superAdmin
            ->setFirstName('Super')
            ->setLastName('Admin')
            ->setEmail('superadmin@saintmedard-nantes.fr')
            ->setRoles(['ROLE_SUPER_ADMIN'])
            ->setCreatedAtValue();

        $encodedPassword = $this->passwordHasher->hashPassword($superAdmin, 'password123');
        $superAdmin->setPassword($encodedPassword);

        $association = $this->getReference(AssoSectionsFixtures::ASSOCIATION);
        $superAdmin->setAssociation($association);

        $sectionReferences = $this->getSectionReferences();
        foreach ($sectionReferences as $sectionReference) {
            $superAdmin->addSections($this->getReference($sectionReference));
        }

        $manager->persist($superAdmin);
    }

    private function loadRoleMembers(ObjectManager $manager, string $role, array &$emailList)
    {
        $groupTypes = [
            'association', 'basket', 'chorale', 'danse', 'football',
            'gym_sportive', 'gym_tonique', 'loisirs', 'petanque', 'tennis_de_table',
        ];

        $membersCount = 0;

        foreach ($groupTypes as $groupType) {
            $email = $this->loadMember($manager, $role, $groupType);
            if ($email !== null) {
                $emailList[] = $email;
                $membersCount++;
            }
        }

        return $membersCount;
    }

    private function loadMember(ObjectManager $manager, string $role, string $groupType, ?string $firstName = null, ?string $lastName = null, ?string $email = null, ?string $password = null)
    {
        if ($firstName === null) {
            $firstName = ($role === 'ROLE_ADMIN') ? 'Admin' : 'Editeur';
        }

        if ($lastName === null) {
            $lastName = ucwords(str_replace('_', ' ', $groupType));
        }

        if ($email === null) {
            $email = strtolower(str_replace(' ', '_', $firstName) . "_" . str_replace(' ', '_', $lastName) . "@saintmedard-nantes.fr");
        }

        if ($password === null) {
            $password = 'password123';
        }

        $memberData = [
            $firstName,
            $lastName,
            $email,
            [$role],
            $password,
            $groupType,
        ];

        $member = $this->createMember($memberData);

        if ($groupType === 'association') {
            $member->setAssociation($this->getReference(AssoSectionsFixtures::ASSOCIATION));
        } else {
            $member->addSections($this->getReference($groupType));
        }

        $manager->persist($member);

        return $email;
    }

    private function loadLicensees(ObjectManager $manager)
    {
        $faker = Factory::create();
        $licenseeCounts = [];

        $groupTypes = [
            'association', 'basket', 'chorale', 'danse', 'football',
            'gym_sportive', 'gym_tonique', 'loisirs', 'petanque', 'tennis_de_table',
        ];

        foreach ($groupTypes as $groupType) {

            $membersCount = 0;

            for ($i = 0; $i < 10; $i++) {
                $firstName = $faker->firstName;
                $lastName = $faker->lastName;
                $email = strtolower(str_replace(' ', '_', $firstName) . "_" . str_replace(' ', '_', $lastName) . "@saintmedard-nantes.fr");

                $this->loadMember(
                    $manager,
                    'ROLE_LICENSEE',
                    $groupType,
                    $firstName,
                    $lastName,
                    $email,
                    'password123'
                );
                $membersCount++;
            }

            $licenseeCounts[$groupType] = $membersCount;
        }

        return $licenseeCounts;
    }

    private function createMember(array $memberData): Member
    {
        [$firstName, $lastName, $email, $roles, $password] = $memberData;

        $member = new Member();
        $member
            ->setFirstName($firstName)
            ->setLastName($lastName)
            ->setEmail($email)
            ->setRoles($roles)
            ->setCreatedAtValue();

        $encodedPassword = $this->passwordHasher->hashPassword($member, $password);
        $member->setPassword($encodedPassword);

        return $member;
    }

    private function getSectionReferences(): array
    {
        return [
            AssoSectionsFixtures::BASKET,
            AssoSectionsFixtures::CHORALE,
            AssoSectionsFixtures::DANSE,
            AssoSectionsFixtures::FOOTBALL,
            AssoSectionsFixtures::GYM_SPORTIVE,
            AssoSectionsFixtures::GYM_TONIQUE,
            AssoSectionsFixtures::LOISIRS,
            AssoSectionsFixtures::PETANQUE,
            AssoSectionsFixtures::TENNIS_DE_TABLE,
        ];
    }

    public function getDependencies()
    {
        return [
            AssoSectionsFixtures::class,
        ];
    }
}
