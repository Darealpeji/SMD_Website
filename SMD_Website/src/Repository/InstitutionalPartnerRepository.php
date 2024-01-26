<?php

namespace App\Repository;

use App\Entity\InstitutionalPartner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InstitutionalPartner>
 *
 * @method InstitutionalPartner|null find($id, $lockMode = null, $lockVersion = null)
 * @method InstitutionalPartner|null findOneBy(array $criteria, array $orderBy = null)
 * @method InstitutionalPartner[]    findAll()
 * @method InstitutionalPartner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstitutionalPartnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InstitutionalPartner::class);
    }

//    /**
//     * @return InstitutionalPartner[] Returns an array of InstitutionalPartner objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?InstitutionalPartner
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
