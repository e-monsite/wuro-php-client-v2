<?php

declare(strict_types=1);

namespace WuroClient\Model;

class Configuration
{
    private string $apiPublicKey;

    private string $apiSecretKey;

    public function __construct(string $apiPublicKey, string $apiSecretKey)
    {
        $this->apiPublicKey = $apiPublicKey;
        $this->apiSecretKey = $apiSecretKey;
    }

    public function getApiPublicKey(): string
    {
        return $this->apiPublicKey;
    }

    public function getApiSecretKey(): string
    {
        return $this->apiSecretKey;
    }
}
