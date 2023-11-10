<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

class ProductCategory extends AbstractModel
{
    private $_id;

    private $state;

    private $parent_category;

    private $name;

    public function __construct($data = [])
    {
        $this->hydrate($data);
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getParentCategory()
    {
        return $this->parent_category;
    }

    public function getName()
    {
        return $this->name;
    }
}