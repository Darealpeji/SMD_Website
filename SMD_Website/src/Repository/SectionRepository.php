<?php

namespace App\Repository;

use App\Entity\Section;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Section>
 *
 * @method Section|null find($id, $lockMode = null, $lockVersion = null)
 * @method Section|null findOneBy(array $criteria, array $orderBy = null)
 * @method Section[]    findAll()
 * @method Section[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Section::class);
    }

    public function findOneByWithNavBarMenus(array $criteria)
    {
        $queryBuilder = $this->createQueryBuilder('s');
        $queryBuilder->select('s', 'nbm', 'nbsm');
        $queryBuilder->leftJoin('s.navBarMenus', 'nbm');
        $queryBuilder->leftJoin('nbm.navBarSubMenus', 'nbsm');

        foreach ($criteria as $field => $value) {
            $queryBuilder->andWhere('s.' . $field . ' = :' . $field);
            $queryBuilder->setParameter($field, $value);
        }
        $queryBuilder->addOrderBy('nbm.ranking', 'ASC');
        $queryBuilder->addOrderBy('nbsm.ranking', 'ASC');

        return $queryBuilder
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getTeamsBySection(Section $section)
    {
        return $this->createQueryBuilder('s')
            ->select('s', 'ct', 'te', 'tr')
            ->leftJoin('s.teamCategories', 'ct')
            ->leftJoin('ct.teams', 'te')
            ->leftJoin('te.trainings', 'tr')
            ->where('s = :section')
            ->setParameter('section', $section)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
