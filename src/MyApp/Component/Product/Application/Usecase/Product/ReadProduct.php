<?php


namespace MyApp\Component\Product\Application\Usecase\Product;


use MyApp\Component\Product\Infrastructure\Repository\ProductRepository;

class ReadProduct
{
    private $productRepository;

    public function __construct(
        ProductRepository $productRepository
    )
    {
        $this->productRepository = $productRepository;
    }

    public function execute()
    {
        return $this->productRepository->findAllOrderedByName();
    }
}