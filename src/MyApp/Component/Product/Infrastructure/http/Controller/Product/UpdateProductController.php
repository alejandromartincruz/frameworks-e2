<?php

namespace MyApp\Component\Product\Infrastructure\http\Controller\Product;

use MyApp\Component\Product\Application\Usecase\Product\UpdateProduct;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateProductController extends Controller
{
    private $updateProductCase;

    public function __construct(
        UpdateProduct $updateProductCase
    )
    {
        $this->updateProductCase = $updateProductCase;
    }

    public function execute(Request $request, $id)
    {

        $json = json_decode($request->getContent(), true);

        $name = $json['name'];
        $price = $json['price'];
        $description = $json['description'];

        $this->updateProductCase->execute($id, $name, $price, $description);

        return new Response('', 200);

    }

}