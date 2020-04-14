<?php


namespace MyApp\Component\Product\Application\Usecase\Owner;


use MyApp\Component\Product\Infrastructure\Repository\OwnerRepository;

class ReadOwner
{
    private $ownerRepository;

    public function __construct(
        OwnerRepository $ownerRepository
    )
    {
        $this->ownerRepository = $ownerRepository;
    }

    public function execute()
    {
        return $this->ownerRepository->findAllOrderedByName();
    }
}