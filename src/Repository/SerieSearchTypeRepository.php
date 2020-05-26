<?php

namespace App\Repository;

use App\Entity\SerieSearchType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SerieSearchType|null find($id, $lockMode = null, $lockVersion = null)
 * @method SerieSearchType|null findOneBy(array $criteria, array $orderBy = null)
 * @method SerieSearchType[]    findAll()
 * @method SerieSearchType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SerieSearchTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SerieSearchType::class);
    }

    // /**
    //  * @return SerieSearchType[] Returns an array of SerieSearchType objects
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
    public function findOneBySomeField($value): ?SerieSearchType
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
