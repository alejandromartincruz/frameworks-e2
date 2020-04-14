<?php

namespace MyApp\Component\Product\Infrastructure\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use MyApp\Component\Product\Domain\Entity\Owner;

class OwnerRepository extends EntityRepository
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function findAllOrderedByName()
    {
        return $this->entityManager
            ->createQuery(
                'SELECT o FROM \MyApp\Component\Product\Domain\Entity\Owner o ORDER BY o.name ASC'
            )
            ->getResult();
    }

    public function findById($id): ?Owner
    {
        return $this->entityManager
            ->createQuery(
                'SELECT o FROM \MyApp\Component\Product\Domain\Entity\Owner o WHERE o.id = :id'
            )
            ->setParameter('id', $id)
            ->getOneOrNullResult();;
    }

    public function save(Owner $owner): void
    {
        $em = $this->entityManager;
        $em->persist($owner);
        $em->flush();
    }

}