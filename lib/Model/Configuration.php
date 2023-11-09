<?php

declare(strict_types=1);

namespace WuroClient\Api\Model;

class Configuration
{
    private string $apiPublicKey;

    private string $apiSecretKey;

    private string $host = 'https://wuro.pro/api/v3.2';

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

    public function getHost(): string
    {
        return $this->host;
    }

    public function setHost(string $host): void
    {
        $this->host = $host;
    }
}
