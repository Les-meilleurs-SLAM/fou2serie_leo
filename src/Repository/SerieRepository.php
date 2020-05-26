<?php

namespace App\Repository;

use App\Entity\SearchSerie;
use App\Entity\Serie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @method Serie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Serie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Serie[]    findAll()
 * @method Serie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SerieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Serie::class);
    }

    // /**
    //  * @return Serie[] Returns an array of Serie objects
    //  */

    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    public function findOneBySomeField($value): ?Serie
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function getListNews()
    {
        return $this->createQueryBuilder('serie')
            ->orderBy('serie.premiereDiffusion', 'DESC')
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }

    public function findAllSeriesBySearch(SearchSerie $search): Query
    {
        $query = $this->createQueryBuilder('s')->orderBy('s.titre', 'ASC');
        if ($search->getMaxDuree()->getTimestamp() > 0) {
            dump($search->getMaxDuree());
            $query = $query
                ->andWhere('s.duree <= :maxDuree')->setParameter('maxDuree', $search->getMaxDuree()->format('H:i'));
        }
        // on récupère la liste des genres que l'utilisateur a sélectionné dans le formulaire   
        $tabChoixGenres = $search->getGenres();
        // si l'utilisateur a au moins sélectionné un genre
        if ($tabChoixGenres->count() > 0) {
            foreach ($tabChoixGenres as $unItem) {
                // on ajoute un and dans le where de la requête pour chacun des genres
                $query = $query
                    ->andWhere(':genre MEMBER OF s.lesGenres')->setParameter('genre', $unItem);
            }
        }
        return $query->getQuery();
    }
}
