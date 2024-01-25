<?php

namespace App\Repository;

use App\Entity\Section;
use Doctrine\ORM\Query;
use App\Entity\Association;
use App\Entity\PostChartCategory;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<PostChartCategory>
 *
 * @method OrganizationChart|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrganizationChart|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrganizationChart[]    findAll()
 * @method OrganizationChart[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostChartCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostChartCategory::class);
    }

    public function getPostCountByChartCategoriesByAssociation(Association $sassociation)
    {
        return $this->createQueryBuilder('pcc')
            ->select('pcc.label as postChartCategoryName', 'COUNT(DISTINCT p.id) as postsCount', 'COUNT(DISTINCT m.id) as membersCount')
            ->leftJoin('pcc.posts', 'p')
            ->leftJoin('p.members', 'm')
            ->leftJoin('pcc.association', 'a')
            ->where('a = :association')
            ->setParameter('association', $sassociation)
            ->groupBy('a', 'postChartCategoryName')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }

    public function getPostCountByChartCategoriesBySection(Section $section)
    {
        return $this->createQueryBuilder('pcc')
            ->select('pcc.label as postChartCategoryName', 'COUNT(DISTINCT p.id) as postsCount', 'COUNT(DISTINCT m.id) as membersCount')
            ->leftJoin('pcc.posts', 'p')
            ->leftJoin('p.members', 'm')
            ->leftJoin('pcc.sections', 's')
            ->where('s = :section')
            ->setParameter('section', $section)
            ->groupBy('s', 'postChartCategoryName')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }
}
