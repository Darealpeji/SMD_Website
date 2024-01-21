<?php

namespace App\Repository;

use App\Entity\Activity;
use App\Entity\ActivityClass;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<ActivityClass>
 *
 * @method ActivityClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActivityClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActivityClass[]    findAll()
 * @method ActivityClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivityClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActivityClass::class);
    }

    public function getActivityClassesByActivity(Activity $activity)
    {
        return $this->createQueryBuilder('ac')
            ->select('ac', 'tr')
            ->leftJoin('ac.trainings', 'tr')
            ->where('ac.activity = :activity')
            ->setParameter('activity', $activity)
            ->getQuery()
            ->getResult();
    }
}
