<?php

namespace App\Repository;

use App\Entity\Role;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Role>
 *
 * @method Role|null find($id, $lockMode = null, $lockVersion = null)
 * @method Role|null findOneBy(array $criteria, array $orderBy = null)
 * @method Role[]    findAll()
 * @method Role[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Role::class);
    }

    public function getMembersByRoles()
    {
        return $this->createQueryBuilder('r')
            ->select('r.name as roleName', 'r.label as roleLabel', 'COUNT(m) as membersCount')
            ->leftJoin('r.members', 'm')
            ->groupBy('roleName')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }
}
