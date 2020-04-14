<?php

namespace MyApp\Component\Product\Infrastructure\http\Controller\Owner;

use MyApp\Component\Product\Application\Usecase\Owner\CreateOwner;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateOwnerController extends Controller
{
    private $createOwnerCase;

    public function __construct(
        CreateOwner $createOwnerCase
    )
    {
        $this->createOwnerCase = $createOwnerCase;
    }

    public function execute(Request $request)
    {

        $json = json_decode($request->getContent(), true);
        $name = $json['name'];

        $this->createOwnerCase->execute($name);

        return new Response('', 201);

    }

}