<?php

namespace App\Repository;

use App\Entity\DaySlot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DaySlot>
 *
 * @method DaySlot|null find($id, $lockMode = null, $lockVersion = null)
 * @method DaySlot|null findOneBy(array $criteria, array $orderBy = null)
 * @method DaySlot[]    findAll()
 * @method DaySlot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DaySlotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DaySlot::class);
    }

    public function save(DaySlot $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DaySlot $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

     /**
     * Show available daySlots
     * @param integer $nbDaySlots
     * @return array
     */
    public function findAvailableDaySlots(?int $nbDaySlots) : array {
        return  $this->createQueryBuilder('d')
                ->where('d.isAvailable = true')
                ->orderBy('d.time', 'ASC')
                ->setMaxResults($nbDaySlots)
                ->getQuery()
                ->getResult();
} 

//    /**
//     * @return DaySlot[] Returns an array of DaySlot objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DaySlot
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
