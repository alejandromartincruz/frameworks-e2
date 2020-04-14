<?php

namespace MyApp\Component\Product\Infrastructure\http\Controller\Owner;

use Doctrine\ORM\Query;
use MyApp\Component\Product\Application\Usecase\Owner\ReadOwner;
use MyApp\Component\Product\Domain\Entity\Owner;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListOwnersController extends Controller
{
    private $readOwnerCase;

    public function __construct(
        ReadOwner $readOwnerCase
    )
    {
        $this->readOwnerCase = $readOwnerCase;
    }

    public function execute()
    {
        $owners = $this->readOwnerCase->execute();

        $ownersAsArray = array_map(function (Owner $o) {
             return $o->toArray($o);
        }, $owners);

        return new JsonResponse($ownersAsArray);
    }

}