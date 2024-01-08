<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

class Company extends AbstractModel
{
    public $_id;
    public $name;
    public $url;
    public $emails;

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

    public function getEmails()
    {
        return $this->emails;
    }

    public function setEmails($emails): void
    {
        $this->emails = $emails;
    }
}