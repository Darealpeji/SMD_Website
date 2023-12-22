<?php

namespace App\Repository;

use App\Entity\NavBarDdLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NavBarDdLink>
 *
 * @method NavBarDdLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method NavBarDdLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method NavBarDdLink[]    findAll()
 * @method NavBarDdLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NavBarDdLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NavBarDdLink::class);
    }

//    /**
//     * @return NavBarDdLink[] Returns an array of NavBarDdLink objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NavBarDdLink
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
