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

    public function findOneByWithTeamsData(array $criteria)
    {
        $queryBuilder = $this->createQueryBuilder('ct');
        $queryBuilder->select('ct', 'te', 'tr', 'ap', 'p', 'm');
        $queryBuilder->leftJoin('ct.teams', 'te');
        $queryBuilder->leftJoin('te.trainings', 'tr');
        $queryBuilder->leftJoin('tr.activityPlace', 'ap');
        $queryBuilder->leftJoin('te.posts', 'p');
        $queryBuilder->leftJoin('p.members', 'm');

        foreach ($criteria as $field => $value) {
            $queryBuilder->andWhere('ct.' . $field . ' = :' . $field);
            $queryBuilder->setParameter($field, $value);
        }

        return $queryBuilder
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getTeamCategoriesBySection(Section $section)
    {
        return $this->createQueryBuilder('tc')
            ->select('tc', 'te')
            ->leftJoin('tc.teams', 'te')
            ->where('tc.section = :section')
            ->setParameter('section', $section)
            ->getQuery()
            ->getResult();
    }
}
