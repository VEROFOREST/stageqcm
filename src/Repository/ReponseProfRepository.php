<?php

namespace App\Repository;

use App\Entity\ReponseProf;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReponseProf|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReponseProf|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReponseProf[]    findAll()
 * @method ReponseProf[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReponseProfRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReponseProf::class);
    }

    // /**
    //  * @return ReponseProf[] Returns an array of ReponseProf objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ReponseProf
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
