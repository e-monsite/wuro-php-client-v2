<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

class ProductOption
{
    public $name;

    public $values;

    public function __construct($data)
    {
        $this->name = $data->name;
        $this->values = $data->values;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getValues()
    {
        return $this->values;
    }
}