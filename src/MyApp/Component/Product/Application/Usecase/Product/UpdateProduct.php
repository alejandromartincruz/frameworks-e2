<?php


namespace MyApp\Component\Product\Application\Usecase\Product;

use MyApp\Component\Product\Infrastructure\Repository\ProductRepository;

class UpdateProduct
{
    private $productRepository;

    public function __construct(
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function execute(int $id, string $name, float $price, string $description)
    {
        $product = $this->productRepository->findById($id);

        $product->setName($name);
        $product->setPrice($price);
        $product->setDescription($description);

        $this->productRepository->save($product);
    }
}