<?php

namespace App\Repository;

use App\Entity\CourseMode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CourseMode|null find($id, $lockMode = null, $lockVersion = null)
 * @method CourseMode|null findOneBy(array $criteria, array $orderBy = null)
 * @method CourseMode[]    findAll()
 * @method CourseMode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CourseModeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CourseMode::class);
    }

    // /**
    //  * @return CourseMode[] Returns an array of CourseMode objects
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
    public function findOneBySomeField($value): ?CourseMode
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
