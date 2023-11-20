<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

class ProductVariant extends AbstractModel
{
    public $_id;

    public $stock;

    public $state;

    public $name;

    public $title;

    public $price_ht;

    public $reference;

    public $visible;

    public function __construct($data = [])
    {
        $this->hydrate($data);
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getStockQty()
    {
        return $this->getStock()->nb_stock;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getPriceHt()
    {
        return $this->price_ht;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function getVariantValues()
    {
        return explode('/', $this->title);
    }

    public function isVisible()
    {
        return $this->visible;
    }
}