<?php

namespace App\Repository;

use App\Entity\StaticPage;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<StaticPage>
 *
 * @method StaticPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method StaticPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method StaticPage[]    findAll()
 * @method StaticPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StaticPageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StaticPage::class);
    }

    public function findOneByWithContents(array $criteria)
    {
        $queryBuilder = $this->createQueryBuilder('sp');
        $queryBuilder->select('sp', 'spc', 'a');
        $queryBuilder->leftJoin('sp.association', 'a');
        $queryBuilder->leftJoin('sp.section', 's');
        $queryBuilder->leftJoin('sp.staticPageContents', 'spc');

        foreach ($criteria as $field => $value) {
            $queryBuilder->andWhere('sp.' . $field . ' = :' . $field);
            $queryBuilder->setParameter($field, $value);
        }

        return $queryBuilder
            ->getQuery()
            ->getOneOrNullResult();
    }
}
