<?php

namespace MyApp\Component\Product\Infrastructure\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use MyApp\Component\Product\Domain\Entity\Product;

class ProductRepository extends EntityRepository
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
                'SELECT p FROM \MyApp\Component\Product\Domain\Entity\Product p ORDER BY p.name ASC'
            )
            ->getResult();
    }

    public function findById($id): ?Product
    {
        return $this->entityManager
            ->createQuery(
                'SELECT p FROM \MyApp\Component\Product\Domain\Entity\Product p WHERE p.id = :id'
            )
            ->setParameter('id', $id)
            ->getOneOrNullResult();;
    }

    public function save(Product $product): void
    {
        $this->entityManager->persist($product);
        $this->entityManager->flush();
    }

    public function delete(Product $product): void
    {
        $this->entityManager->remove($product);
        $this->entityManager->flush();
    }

}