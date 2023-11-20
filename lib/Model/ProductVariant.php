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

    public $tva_rate;

    public $reference;

    public $visible;

    public $hasStockManagement;

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

    public function getHasStockManagement()
    {
        return $this->hasStockManagement;
    }

    public function setStock($stock): void
    {
        $this->stock = $stock;
    }

    public function setState($state): void
    {
        $this->state = $state;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function setPriceHt($price_ht): void
    {
        $this->price_ht = $price_ht;
    }

    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    public function setVisible($visible): void
    {
        $this->visible = $visible;
    }

    public function setHasStockManagement($hasStockManagement): void
    {
        $this->hasStockManagement = $hasStockManagement;
    }

    public function getTvaRate()
    {
        return $this->tva_rate;
    }

    public function setTvaRate($tva_rate): void
    {
        $this->tva_rate = $tva_rate;
    }
}