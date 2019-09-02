<?php

namespace App\Repository;

use App\Entity\AcademicOffer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AcademicOffer|null find($id, $lockMode = null, $lockVersion = null)
 * @method AcademicOffer|null findOneBy(array $criteria, array $orderBy = null)
 * @method AcademicOffer[]    findAll()
 * @method AcademicOffer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AcademicOfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AcademicOffer::class);
    }

    // /**
    //  * @return AcademicOffer[] Returns an array of AcademicOffer objects
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
    public function findOneBySomeField($value): ?AcademicOffer
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
