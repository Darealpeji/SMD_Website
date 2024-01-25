<?php

namespace App\Repository;

use App\Entity\Post;
use App\Entity\Section;
use Doctrine\ORM\Query;
use App\Entity\Association;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Post>
 *
 * @method Post|null find($id, $lockMode = null, $lockVersion = null)
 * @method Post|null findOneBy(array $criteria, array $orderBy = null)
 * @method Post[]    findAll()
 * @method Post[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    public function getPostCountByCategoriesByAssociation(Association $sassociation)
    {
        return $this->createQueryBuilder('p')
            ->select('pcc.name as postChartCategoryName', 'ptc.name as postTeamCategoryName', 'COUNT(DISTINCT p.id) as postsCount', 'COUNT(DISTINCT m.id) as membersCount')
            ->leftJoin('p.members', 'm')
            ->leftJoin('p.postChartCategory', 'pcc')
            ->leftJoin('p.postTeamCategory', 'ptc')
            ->leftJoin('pcc.association', 'a')
            ->where('a = :association')
            ->setParameter('association', $sassociation)
            ->groupBy('a', 'postChartCategoryName', 'postTeamCategoryName')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }

    public function getPostCountByCategoriesBySection(Section $section)
    {
        return $this->createQueryBuilder('p')
            ->select('pcc.name as postChartCategoryName', 'ptc.name as postTeamCategoryName', 'COUNT(DISTINCT p.id) as postsCount', 'COUNT(DISTINCT m.id) as membersCount')
            ->leftJoin('p.members', 'm')
            ->leftJoin('p.postChartCategory', 'pcc')
            ->leftJoin('p.postTeamCategory', 'ptc')
            ->leftJoin('pcc.sections', 's')
            ->leftJoin('ptc.sections', 's')
            ->where('s = :section')
            ->setParameter('section', $section)
            ->groupBy('s', 'postChartCategoryName', 'postTeamCategoryName')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }
}
