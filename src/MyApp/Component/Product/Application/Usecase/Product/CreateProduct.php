<?php


namespace MyApp\Component\Product\Application\Usecase\Product;

use MyApp\Component\Product\Domain\Entity\Product;
use MyApp\Component\Product\Infrastructure\Repository\OwnerRepository;
use MyApp\Component\Product\Infrastructure\Repository\ProductRepository;

class CreateProduct
{
    private $productRepository;
    private $ownerRepository;

    public function __construct(
        ProductRepository $productRepository,
        OwnerRepository $ownerRepository
    )
    {
        $this->productRepository = $productRepository;
        $this->ownerRepository = $ownerRepository;
    }

    public function execute(string $name, float $price, string $description, int $ownerId)
    {
        $owner = $this->ownerRepository->findById($ownerId);
        $product = new Product($name, $price, $description, $owner);
        $this->productRepository->save($product);
    }
}