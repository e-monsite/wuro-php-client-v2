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

    public $tva_rate;

    public $category;

    public $images;

    public $options;

    public $variants;

    public function __construct($data = [])
    {
        $this->hydrate($data);

        if (isset($data->options)) {
            foreach ($data->options as $option) {
                $this->options[]=new ProductOption($option);
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
}