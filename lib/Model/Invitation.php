<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

class Invitation extends AbstractModel
{
    public $email;

    public function __construct($data = [])
    {
        $this->hydrate($data);
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }
}