<?php

namespace App\Repository;

use App\Entity\EditPassword;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EditPassword|null find($id, $lockMode = null, $lockVersion = null)
 * @method EditPassword|null findOneBy(array $criteria, array $orderBy = null)
 * @method EditPassword[]    findAll()
 * @method EditPassword[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EditPasswordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EditPassword::class);
    }

    // /**
    //  * @return EditPassword[] Returns an array of EditPassword objects
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
    public function findOneBySomeField($value): ?EditPassword
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
