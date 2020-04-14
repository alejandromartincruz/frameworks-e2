<?php


namespace MyApp\Component\Product\Application\Usecase\Product;

use MyApp\Component\Product\Infrastructure\Repository\ProductRepository;

class DeleteProduct
{
    private $productRepository;

    public function __construct(
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function execute(int $id)
    {
        $product = $this->productRepository->findById($id);
        $this->productRepository->delete($product);
    }
}