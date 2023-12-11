<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;


class Webhook extends AbstractModel
{
    public $_id;

    public $action;

    public $hookUrl;

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

    public function getAction()
    {
        return $this->action;
    }

    public function setAction($action): void
    {
        $this->action = $action;
    }

    public function getHookUrl()
    {
        return $this->hookUrl;
    }

    public function setHookUrl($hookUrl): void
    {
        $this->hookUrl = $hookUrl;
    }
}