<?php

namespace App\Repository;

use App\Entity\Section;
use App\Entity\TeamCategory;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<TeamCategory>
 *
 * @method TeamCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method TeamCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method TeamCategory[]    findAll()
 * @method TeamCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TeamCategory::class);
    }
}
