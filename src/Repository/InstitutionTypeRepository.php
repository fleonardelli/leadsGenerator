<?php

namespace App\Repository;

use App\Entity\InstitutionType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method InstitutionType|null find($id, $lockMode = null, $lockVersion = null)
 * @method InstitutionType|null findOneBy(array $criteria, array $orderBy = null)
 * @method InstitutionType[]    findAll()
 * @method InstitutionType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstitutionTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InstitutionType::class);
    }

    // /**
    //  * @return InstitutionType[] Returns an array of InstitutionType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InstitutionType
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
