<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

class DocumentNumber extends AbstractModel
{
    public $_id;
    public $format;
    public $resetOption;
    public $name;
    public $current;

    public function __construct($data = [])
    {
        $this->hydrate($data);
    }

    public function getCurrent()
    {
        return $this->current;
    }

    public function setCurrent($current): void
    {
        $this->current = $current;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getResetOption()
    {
        return $this->resetOption;
    }

    public function setResetOption($resetOption): void
    {
        $this->resetOption = $resetOption;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public function setFormat($format): void
    {
        $this->format = $format;
    }

    public function getId()
    {
        return $this->_id;
    }
}