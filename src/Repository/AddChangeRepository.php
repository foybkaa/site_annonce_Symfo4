<?php

namespace App\Repository;

use App\Entity\AddChange;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AddChange|null find($id, $lockMode = null, $lockVersion = null)
 * @method AddChange|null findOneBy(array $criteria, array $orderBy = null)
 * @method AddChange[]    findAll()
 * @method AddChange[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AddChangeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AddChange::class);
    }

    // /**
    //  * @return AddChange[] Returns an array of AddChange objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AddChange
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
