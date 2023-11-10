<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

abstract class AbstractModel
{
    public function hydrate($data): void
    {
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}