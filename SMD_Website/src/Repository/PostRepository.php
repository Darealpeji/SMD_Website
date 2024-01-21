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

    public function getPostCountByHierarchicalGroupByAssociation(Association $sassociation)
    {
        return $this->createQueryBuilder('p')
            ->select('p.hierarchicalGroup as hierarchy', 'COUNT(DISTINCT p.id) as postsCount', 'COUNT(DISTINCT m.id) as membersCount')
            ->leftJoin('p.association', 'a')
            ->leftJoin('p.members', 'm')
            ->where('a = :association')
            ->setParameter('association', $sassociation)
            ->groupBy('a', 'hierarchy')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }

    public function getPostCountByHierarchicalGroupBySection(Section $section)
    {
        return $this->createQueryBuilder('p')
            ->select('p.hierarchicalGroup as hierarchy', 'COUNT(DISTINCT p.id) as postsCount', 'COUNT(DISTINCT m.id) as membersCount')
            ->leftJoin('p.section', 's')
            ->leftJoin('p.members', 'm')
            ->where('s = :section')
            ->setParameter('section', $section)
            ->groupBy('s', 'hierarchy')
            ->getQuery()
            ->getResult(Query::HYDRATE_ARRAY);
    }
}
