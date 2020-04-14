<?php

namespace MyApp\Component\Product\Domain\Interfaces;


use MyApp\Component\Product\Domain\Entity\Owner;

interface OwnerRepository
{
    public function findAllOrderedByName();
    public function findById($id): ?Owner;
    public function save(Owner $owner): void;
}