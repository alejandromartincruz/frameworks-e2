<?php

namespace MyApp\Component\Product\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

class Owner
{

    private $id;
    private $name;
    private $products;

    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getProducts()
    {
        return $this->products;
    }
    public function addFProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->addOwner($this);
        }
        return $this;
    }
    public function removeProduct(Product $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
            $product->removeActor($this);
        }
        return $this;
    }

    public function toArray(Owner $owner)
    {
        return [
            'id' => $owner->getId(),
            'name' => $owner->getName()
        ];
    }

}