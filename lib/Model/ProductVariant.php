<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

class ProductVariant extends AbstractModel
{
    public $_id;

    public $stock;

    public $state;

    public $title;

    public $price_ht;

    public $reference;

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

    public function getState()
    {
        return $this->state;
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
}