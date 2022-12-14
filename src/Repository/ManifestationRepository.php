<?php

namespace App\Repository;

use App\Entity\Manifestation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Manifestation>
 *
 * @method Manifestation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Manifestation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Manifestation[]    findAll()
 * @method Manifestation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManifestationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Manifestation::class);
    }

    public function save(Manifestation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Manifestation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findByTitre($value): array
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.manif_titre LIKE :val')
            ->setParameter('val', $value.'%')
            ->orderBy('m.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    public function findByHighest(): array
    {
        return $this->createQueryBuilder('m')
            ->orderBy('m.manif_date', 'ASC')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult()
        ;
    }
}
