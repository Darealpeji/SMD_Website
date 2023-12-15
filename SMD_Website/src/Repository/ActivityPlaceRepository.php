<?php

namespace App\Repository;

use App\Entity\ActivityPlace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ActivityPlace>
 *
 * @method ActivityPlace|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActivityPlace|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActivityPlace[]    findAll()
 * @method ActivityPlace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivityPlaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActivityPlace::class);
    }

//    /**
//     * @return ActivityPlace[] Returns an array of ActivityPlace objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ActivityPlace
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
