<?php

namespace App\Repository;

use App\Entity\Association;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Association>
 *
 * @method Association|null find($id, $lockMode = null, $lockVersion = null)
 * @method Association|null findOneBy(array $criteria, array $orderBy = null)
 * @method Association[]    findAll()
 * @method Association[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssociationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Association::class);
    }

    public function getAssociationData()
    {
        return $this->findOneBy([]);
    }

    public function getAssociationWithNavBarMenus()
    {
        return $this->createQueryBuilder('a')
            ->select('a', 'nbm', 'nbsm')
            ->leftJoin('a.navBarMenus', 'nbm')
            ->leftJoin('nbm.navBarSubMenus', 'nbsm')
            ->where('a.name = :associationName')
            ->setParameter('associationName', "ASC Saint Médard de Doulon - Nantes")
            ->addOrderBy('nbm.ranking', 'ASC')
            ->addOrderBy('nbsm.ranking', 'ASC')
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getAssociationWithHistoricalDates()
    {
        return $this->createQueryBuilder('a')
            ->select('a', 'nbm', 'nbsm', 'hd')
            ->leftJoin('a.historicalDates', 'hd')
            ->leftJoin('a.navBarMenus', 'nbm')
            ->leftJoin('nbm.navBarSubMenus', 'nbsm')
            ->where('a.name = :associationName')
            ->setParameter('associationName', "ASC Saint Médard de Doulon - Nantes")
            ->addOrderBy('nbm.ranking', 'ASC')
            ->addOrderBy('nbsm.ranking', 'ASC')
            ->addOrderBy('hd.year', 'ASC')
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getAssociationWithPostCategories()
    {
        return $this->createQueryBuilder('a')
            ->select('a', 'nbm', 'nbsm', 'pcc', 'p', 'm')
            ->leftJoin('a.navBarMenus', 'nbm')
            ->leftJoin('nbm.navBarSubMenus', 'nbsm')
            ->leftJoin('a.postChartCategories', 'pcc')
            ->leftJoin('pcc.posts', 'p')
            ->leftJoin('p.members', 'm')
            ->where('a.name = :associationName')
            ->setParameter('associationName', "ASC Saint Médard de Doulon - Nantes")
            ->addOrderBy('nbm.ranking', 'ASC')
            ->addOrderBy('nbsm.ranking', 'ASC')
            ->addOrderBy('pcc.ranking', 'ASC')
            ->addOrderBy('p.ranking', 'ASC')
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getAssociationWithPartners()
    {
        return $this->createQueryBuilder('a')
            ->select('a', 'nbm', 'nbsm', 'sp', 'ip')
            ->leftJoin('a.navBarMenus', 'nbm')
            ->leftJoin('nbm.navBarSubMenus', 'nbsm')
            ->leftJoin('a.sponsors', 'sp')
            ->leftJoin('a.institutionalPartners', 'ip')
            ->where('a.name = :associationName')
            ->setParameter('associationName', "ASC Saint Médard de Doulon - Nantes")
            ->addOrderBy('nbm.ranking', 'ASC')
            ->addOrderBy('nbsm.ranking', 'ASC')
            ->addOrderBy('sp.name', 'ASC')
            ->getQuery()
            ->getOneOrNullResult();
    }
}
