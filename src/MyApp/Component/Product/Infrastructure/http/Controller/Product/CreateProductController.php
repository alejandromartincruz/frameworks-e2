<?php

namespace MyApp\Component\Product\Infrastructure\http\Controller\Product;

use MyApp\Component\Product\Application\Usecase\Product\CreateProduct;
use MyApp\Component\Product\Domain\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateProductController extends Controller
{
    private $createProductCase;

    public function __construct(
        CreateProduct $createProductCase
    )
    {
        $this->createProductCase = $createProductCase;
    }

    public function execute(Request $request)
    {

        $json = json_decode($request->getContent(), true);

        $name = $json['name'];
        $price = $json['price'];
        $description = $json['description'];
        $ownerId = $json['ownerId'];

        $this->createProductCase->execute($name, $price, $description, $ownerId);
        /*
        $owner = $this->getDoctrine()->getRepository('\MyApp\Component\Product\Domain\Entity\Owner')->findOneBy(['id' => $ownerId]);

        $product = new Product((string)$name, (float)$price, (string)$description, $owner);

        $em = $this->getDoctrine()->getManager();

        $em->persist($product);
        $em->flush();
        */
        return new Response('', 201);

    }

}