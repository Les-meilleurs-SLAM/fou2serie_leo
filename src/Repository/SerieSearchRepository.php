<?php

namespace App\Repository;

use App\Entity\SerieSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SerieSearch|null find($id, $lockMode = null, $lockVersion = null)
 * @method SerieSearch|null findOneBy(array $criteria, array $orderBy = null)
 * @method SerieSearch[]    findAll()
 * @method SerieSearch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SerieSearchRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SerieSearch::class);
    }

    // /**
    //  * @return SerieSearch[] Returns an array of SerieSearch objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SerieSearch
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
