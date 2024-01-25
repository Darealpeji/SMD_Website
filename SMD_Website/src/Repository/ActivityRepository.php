<?php

namespace App\Repository;

use App\Entity\Section;
use App\Entity\Activity;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Activity>
 *
 * @method Activity|null find($id, $lockMode = null, $lockVersion = null)
 * @method Activity|null findOneBy(array $criteria, array $orderBy = null)
 * @method Activity[]    findAll()
 * @method Activity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActivityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Activity::class);
    }

    public function findByWithClassesData(array $criteria)
    {
        $queryBuilder = $this->createQueryBuilder('a');
        $queryBuilder->select('a', 'ac', 'tr', 'ap');
        $queryBuilder->leftJoin('a.activityClasses', 'ac');
        $queryBuilder->leftJoin('ac.trainings', 'tr');
        $queryBuilder->leftJoin('tr.activityPlace', 'ap');

        foreach ($criteria as $field => $value) {
            $queryBuilder->andWhere('a.' . $field . ' = :' . $field);
            $queryBuilder->setParameter($field, $value);
        }

        return $queryBuilder
            ->getQuery()
            ->getResult();
    }

    public function getActivitiesBySection(Section $section)
    {
        return $this->createQueryBuilder('a')
            ->select('a', 'ac')
            ->leftJoin('a.activityClasses', 'ac')
            ->where('a.section = :section')
            ->setParameter('section', $section)
            ->getQuery()
            ->getResult();
    }
}
