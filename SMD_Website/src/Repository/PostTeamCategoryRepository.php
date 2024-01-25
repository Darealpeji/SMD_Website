<?php

namespace App\Repository;

use App\Entity\Section;
use Doctrine\ORM\Query;
use App\Entity\PostTeamCategory;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<PostTeamCategory>
 *
 * @method PostTeamCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostTeamCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostTeamCategory[]    findAll()
 * @method PostTeamCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostTeamCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostTeamCategory::class);
    }

    public function getPostCountByTeamCategoriesBySection(Section $section)
    {
        return $this->createQueryBuilder('ptc')
            ->select('ptc.labelPlural as postTeamCategoryName', 'COUNT(DISTINCT p.id) as postsCount', 'COUNT(DISTINCT m.id) as membersCount')
            ->leftJoin('ptc.posts', 'p')
            ->leftJoin('p.members', 'm')
            ->leftJoin('ptc.sections', 's')
            ->where('s = :section')
            ->setParameter('section', $section)
            ->groupBy('s', 'postTeamCategoryName')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }
}
