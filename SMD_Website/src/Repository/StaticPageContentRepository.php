<?php

namespace App\Repository;

use App\Entity\StaticPageContent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StaticPageContent>
 *
 * @method ContentStaticPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentStaticPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentStaticPage[]    findAll()
 * @method ContentStaticPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StaticPageContentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StaticPageContent::class);
    }

    //    /**
    //     * @return ContentStaticPage[] Returns an array of ContentStaticPage objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('c.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ContentStaticPage
    //    {
    //        return $this->createQueryBuilder('c')
    //            ->andWhere('c.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
