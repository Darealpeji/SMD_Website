<?php

namespace App\Repository;

use App\Entity\Article;
use App\Entity\Section;
use App\Entity\Association;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Article>
 *
 * @method Article|null find($id, $lockMode = null, $lockVersion = null)
 * @method Article|null findOneBy(array $criteria, array $orderBy = null)
 * @method Article[]    findAll()
 * @method Article[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Article::class);
    }

    public function getArticlesByAssociation(Association $association)
    {
        return $this->createQueryBuilder('art')
            ->select('art', 'cat')
            ->leftJoin('art.articleCategory', 'cat')
            ->leftJoin('art.association', 'a')
            ->where('art.association = :association')
            ->setParameter('association', $association)
            ->getQuery()
            ->getResult();
    }

    public function getArticlesBySection(Section $section)
    {
        return $this->createQueryBuilder('art')
            ->select('art', 'cat')
            ->leftJoin('art.articleCategory', 'cat')
            ->leftJoin('art.section', 's')
            ->where('art.section = :section')
            ->setParameter('section', $section)
            ->getQuery()
            ->getResult();
    }
}
