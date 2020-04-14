<?php

namespace MyApp\Component\Product\Domain\Interfaces;


use MyApp\Component\Product\Domain\Entity\Product;

interface ProductRepository
{
    public function findAllOrderedByName();
    public function findById($id): ?Product;
    public function save(Product $owner): void;
    public function delete(Product $product): void;
}