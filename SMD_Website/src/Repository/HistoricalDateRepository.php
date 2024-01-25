<?php

namespace App\Repository;

use App\Entity\Section;
use App\Entity\HistoricalDate;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<HistoricalDate>
 *
 * @method HistoricalDate|null find($id, $lockMode = null, $lockVersion = null)
 * @method HistoricalDate|null findOneBy(array $criteria, array $orderBy = null)
 * @method HistoricalDate[]    findAll()
 * @method HistoricalDate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HistoricalDateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HistoricalDate::class);
    }

    public function getHistoricalDatesBySection(Section $section)
    {
        return $this->createQueryBuilder('hd')
            ->select('hd')
            ->where('hd.section = :section')
            ->setParameter('section', $section)
            ->addGroupBy('hd.year')
            ->addOrderBy('hd.year', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
