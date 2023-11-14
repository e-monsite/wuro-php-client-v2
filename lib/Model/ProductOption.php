<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

class ProductOption
{
    public $name;

    public $values;

    public function __construct(array $data)
    {
        $this->name = $data->name;
        $this->values = $data->values;
    }
}