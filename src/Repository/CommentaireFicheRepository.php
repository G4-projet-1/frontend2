<?php

namespace App\Repository;

use App\Entity\CommentaireFiche;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommentaireFiche|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentaireFiche|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentaireFiche[]    findAll()
 * @method CommentaireFiche[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentaireFicheRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommentaireFiche::class);
    }

    // /**
    //  * @return CommentaireFiche[] Returns an array of CommentaireFiche objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommentaireFiche
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
