<?php

namespace App\Repository;

use App\Entity\ModificationFiche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ModificationFiche|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModificationFiche|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModificationFiche[]    findAll()
 * @method ModificationFiche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModificationFicheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModificationFiche::class);
    }

    // /**
    //  * @return ModificationFiche[] Returns an array of ModificationFiche objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ModificationFiche
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
