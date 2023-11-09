<?php

declare(strict_types=1);

namespace WuroClient\Api\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Request;

class WuroProductsApi
{
    private $client;

    public function __construct(
        ClientInterface $client
    ) {
        $this->client = $client;
    }

    public function getProducts()
    {
        $request = new Request('GET', 'https://wuro.pro/api/v3.2/products');
        $this->client->send($request);
    }
}