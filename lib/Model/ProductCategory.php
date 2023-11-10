<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

class ProductCategory extends AbstractModel
{
    public $id;

    public $state;

    public $parent_category;

    public $name;

    public function __construct($data = [])
    {
        $this->hydrate($data);
    }
}