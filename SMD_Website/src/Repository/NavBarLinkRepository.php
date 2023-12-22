<?php

namespace App\Repository;

use App\Entity\Section;
use App\Entity\NavBarLink;
use App\Entity\Association;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<NavBarLink>
 *
 * @method NavBarLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method NavBarLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method NavBarLink[]    findAll()
 * @method NavBarLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NavBarLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NavBarLink::class);
    }

    public function getNavBarByAssociation(Association $association)
    {
        return $this->createQueryBuilder('nbl')
            ->select('nbl', 'nbdl')
            ->leftJoin('nbl.navBarDdLinks', 'nbdl')
            ->leftJoin('nbl.association', 'a')
            ->where('nbl.association = :association')
            ->setParameter('association', $association)
            ->getQuery()
            ->getResult();
    }

    public function getNavBarBySection(Section $section)
    {
        return $this->createQueryBuilder('nbl')
            ->select('nbl', 'nbdl')
            ->leftJoin('nbl.navBarDdLinks', 'nbdl')
            ->leftJoin('nbl.section', 's')
            ->where('nbl.section = :section')
            ->setParameter('section', $section)
            ->getQuery()
            ->getResult();
    }
}
