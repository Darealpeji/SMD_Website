<?php

namespace App\Repository;

use App\Entity\Section;
use App\Entity\NavBarMenu;
use App\Entity\Association;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<NavBarMenu>
 *
 * @method NavBarMenu|null find($id, $lockMode = null, $lockVersion = null)
 * @method NavBarMenu|null findOneBy(array $criteria, array $orderBy = null)
 * @method NavBarMenu[]    findAll()
 * @method NavBarMenu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NavBarMenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NavBarMenu::class);
    }

    public function getNavBarByAssociation(Association $association)
    {
        return $this->createQueryBuilder('nbl')
            ->select('nbl', 'nbdl')
            ->leftJoin('nbl.navBarSubMenus', 'nbdl')
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
            ->leftJoin('nbl.navBarSubMenus', 'nbdl')
            ->leftJoin('nbl.section', 's')
            ->where('nbl.section = :section')
            ->setParameter('section', $section)
            ->getQuery()
            ->getResult();
    }
}
