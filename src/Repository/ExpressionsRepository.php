<?php

namespace App\Repository;

use App\Entity\Expressions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Expressions|null find($id, $lockMode = null, $lockVersion = null)
 * @method Expressions|null findOneBy(array $criteria, array $orderBy = null)
 * @method Expressions[]    findAll()
 * @method Expressions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpressionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Expressions::class);
    }

    // /**
    //  * @return Expressions[] Returns an array of Expressions objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Expressions
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
