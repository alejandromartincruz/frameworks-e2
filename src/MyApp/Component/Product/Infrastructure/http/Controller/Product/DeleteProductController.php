<?php

namespace MyApp\Component\Product\Infrastructure\http\Controller\Product;

use MyApp\Component\Product\Application\Usecase\Product\DeleteProduct;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DeleteProductController extends Controller
{
    private $deleteProductCase;

    public function __construct(
        DeleteProduct $deleteProductCase
    )
    {
        $this->deleteProductCase = $deleteProductCase;
    }

    public function execute($id)
    {
        $this->deleteProductCase->execute($id);

        return new Response('', 200);
    }

}