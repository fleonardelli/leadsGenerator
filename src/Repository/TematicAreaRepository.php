<?php

namespace App\Repository;

use App\Entity\TematicArea;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TematicArea|null find($id, $lockMode = null, $lockVersion = null)
 * @method TematicArea|null findOneBy(array $criteria, array $orderBy = null)
 * @method TematicArea[]    findAll()
 * @method TematicArea[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TematicAreaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TematicArea::class);
    }

    // /**
    //  * @return TematicArea[] Returns an array of TematicArea objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TematicArea
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
