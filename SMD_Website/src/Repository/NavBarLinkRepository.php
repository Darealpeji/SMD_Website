<?php

namespace App\Repository;

use App\Entity\NavBarLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NavBarLink>
 *
 * @method NavBarLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method NavBarLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method NavBarLink[]    findAll()
 * @method NavBarLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NavBarLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NavBarLink::class);
    }

//    /**
//     * @return NavBarLink[] Returns an array of NavBarLink objects
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

//    public function findOneBySomeField($value): ?NavBarLink
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
