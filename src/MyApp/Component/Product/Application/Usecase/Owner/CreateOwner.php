<?php


namespace MyApp\Component\Product\Application\Usecase\Owner;


use MyApp\Component\Product\Domain\Entity\Owner;
use MyApp\Component\Product\Infrastructure\Repository\OwnerRepository;


class CreateOwner
{
    private $ownerRepository;

    public function __construct(
        OwnerRepository $ownerRepository
    )
    {
        $this->ownerRepository = $ownerRepository;
    }

    public function execute(string $name)
    {
        $owner = new Owner($name);
        $this->ownerRepository->save($owner);
    }
}