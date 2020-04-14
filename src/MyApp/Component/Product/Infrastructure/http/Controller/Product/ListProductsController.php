<?php

namespace MyApp\Component\Product\Infrastructure\http\Controller\Product;

use Doctrine\ORM\Query;
use MyApp\Component\Product\Application\Usecase\Product\ReadProduct;
use MyApp\Component\Product\Domain\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ListProductsController extends Controller
{
    private $readProductCase;

    public function __construct(
        ReadProduct $readProductCase
    )
    {
        $this->readProductCase = $readProductCase;
    }

    public function execute()
    {
        $products = $this->readProductCase->execute();

        $productsAsArray = array_map(function (Product $p) {
            return $p->toArray($p);
        }, $products);

        return new JsonResponse($productsAsArray);
    }

}