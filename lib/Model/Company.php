<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

class Company extends AbstractModel
{
    public $_id;
    public $name;
    public $url;
    public $address;
    public $siren;
    public $siret;
    public $tva_number;
    public $naf_ape;
    public $nic;
    public $active = true;

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

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url): void
    {
        $this->url = $url;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address): void
    {
        $this->address = $address;
    }

    public function getSiren()
    {
        return $this->siren;
    }

    public function setSiren($siren): void
    {
        $this->siren = $siren;
    }

    public function getSiret()
    {
        return $this->siret;
    }

    public function setSiret($siret): void
    {
        $this->siret = $siret;
    }

    public function getTvaNumber()
    {
        return $this->tva_number;
    }

    public function setTvaNumber($tva_number): void
    {
        $this->tva_number = $tva_number;
    }

    public function isActive()
    {
        return $this->active;
    }

    public function setActive($active): void
    {
        $this->active = $active;
    }

    public function getNafApe()
    {
        return $this->naf_ape;
    }

    public function setNafApe($naf_ape): void
    {
        $this->naf_ape = $naf_ape;
    }

    public function getNic()
    {
        return $this->nic;
    }

    public function setNic($nic): void
    {
        $this->nic = $nic;
    }
}