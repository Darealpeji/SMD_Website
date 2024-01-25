<?php

namespace App\Repository;

use App\Entity\NavBarSubMenuLoggedInMember;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NavBarSubMenuLoggedInMember>
 *
 * @method NavBarSubMenuLoggedInMember|null find($id, $lockMode = null, $lockVersion = null)
 * @method NavBarSubMenuLoggedInMember|null findOneBy(array $criteria, array $orderBy = null)
 * @method NavBarSubMenuLoggedInMember[]    findAll()
 * @method NavBarSubMenuLoggedInMember[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NavBarSubMenuLoggedInMemberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NavBarSubMenuLoggedInMember::class);
    }

//    /**
//     * @return NavBarSubMenuLoggedInMember[] Returns an array of NavBarSubMenuLoggedInMember objects
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

//    public function findOneBySomeField($value): ?NavBarSubMenuLoggedInMember
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
