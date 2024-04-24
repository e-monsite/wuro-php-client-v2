<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

class CompanyType extends AbstractModel
{
    public $_id;
    public $name;
    public $country;
    public $tva;

    public function __construct($data = [])
    {
        $this->hydrate($data);
    }

    public function getId()
    {
        return $this->_id;
    }

    public function setId($id): void
    {
        $this->_id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country): void
    {
        $this->country = $country;
    }

    public function getTva()
    {
        return $this->tva;
    }

    public function setTva($tva): void
    {
        $this->tva = $tva;
    }
}