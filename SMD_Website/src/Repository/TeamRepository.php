<?php

namespace App\Repository;

use App\Entity\Team;
use App\Entity\TeamCategory;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Team>
 *
 * @method Team|null find($id, $lockMode = null, $lockVersion = null)
 * @method Team|null findOneBy(array $criteria, array $orderBy = null)
 * @method Team[]    findAll()
 * @method Team[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Team::class);
    }

    public function findTeamsWithTrainingDetails()
    {
        return $this->createQueryBuilder('team')
            ->leftJoin('team.training', 'training')
            ->addSelect('training')
            ->getQuery()
            ->getResult();
    }

    public function getTeamsByTeamCategory(TeamCategory $teamCategory)
    {
        return $this->createQueryBuilder('te')
            ->select('te', 'tr')
            ->leftJoin('te.trainings', 'tr')
            ->where('te.teamCategory = :teamCategory')
            ->setParameter('teamCategory', $teamCategory)
            ->getQuery()
            ->getResult();
    }
}
