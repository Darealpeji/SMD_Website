<?php

namespace App\Repository;

use App\Entity\NavBarMenu;
use App\Entity\NavBarSubMenu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NavBarSubMenu>
 *
 * @method NavBarSubMenu|null find($id, $lockMode = null, $lockVersion = null)
 * @method NavBarSubMenu|null findOneBy(array $criteria, array $orderBy = null)
 * @method NavBarSubMenu[]    findAll()
 * @method NavBarSubMenu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NavBarSubMenuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NavBarSubMenu::class);
    }

    public function getSubMenusByNavBarMenu(NavBarMenu $navBarMenu)
    {
        return $this->createQueryBuilder('nbsm')
            ->select('nbsm, nbm')
            ->leftJoin('nbsm.navBarMenu', 'nbm')
            ->where('nbsm.navBarMenu = :navBarMenu')
            ->setParameter('navBarMenu', $navBarMenu)
            ->getQuery()
            ->getResult();
    }
}
