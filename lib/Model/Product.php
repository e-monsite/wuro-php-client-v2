<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

class Product extends AbstractModel
{
    public $_id;

    public $stock;

    public $state;

    public $name;

    public $description;

    public $reference;

    public $ecotax;

    public $price_ht;

    public $buying_price;

    public $tva_rate;

    public $category;

    public $images;

    public $options;

    public $hasVariations;

    public $hasStockManagement;

    public $variants;

    public $rawOptions;

    public function __construct($data = [])
    {
        $this->hydrate($data);

        if (isset($data->options)) {
            $this->rawOptions = $data->options;
        }

        if (isset($data->options)) {
            $this->options = [];
            foreach ($data->options as $option) {
                $this->options[]=new ProductOption($option);
            }
        }

        if (isset($data->variants)) {
            $this->variants = [];
            foreach ($data->variants as $variant) {
                $this->variants[]=new ProductVariant($variant);
            }
        }
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

    public function isForceSell()
    {
        return $this->getStock()->forceSell;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function getEcotax()
    {
        return $this->ecotax;
    }

    public function getPriceHt()
    {
        return $this->price_ht;
    }

    public function getTvaRate()
    {
        return $this->tva_rate;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function getOptions()
    {
        return $this->options;
    }

    public function getVariants()
    {
        return $this->variants;
    }

    public function hasVariations()
    {
        return $this->hasVariations;
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

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    public function setEcotax($ecotax): void
    {
        $this->ecotax = $ecotax;
    }

    public function setPriceHt($price_ht): void
    {
        $this->price_ht = $price_ht;
    }

    public function setTvaRate($tva_rate): void
    {
        $this->tva_rate = $tva_rate;
    }

    public function setCategory($category): void
    {
        $this->category = $category;
    }

    public function setImages($images): void
    {
        $this->images = $images;
    }

    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

    public function setHasVariations($hasVariations): void
    {
        $this->hasVariations = $hasVariations;
    }

    public function setHasStockManagement($hasStockManagement): void
    {
        $this->hasStockManagement = $hasStockManagement;
    }

    public function setVariants(array $variants): void
    {
        $this->variants = $variants;
    }

    public function getBuyingPrice()
    {
        return $this->buying_price;
    }

    public function setBuyingPrice($buying_price): void
    {
        $this->buying_price = $buying_price;
    }

    public function getRawOptions()
    {
        return $this->rawOptions;
    }
}