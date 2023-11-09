<?php

declare(strict_types=1);

namespace WuroClient\Api\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use WuroClient\Api\Configuration;
use WuroClient\Api\HeaderFactory;
use WuroClient\Api\WuroApiException;

class WuroProductCategoriesApi
{
    private $client;
    private $config;

    public function __construct(
        ClientInterface $client,
        Configuration $configuration
    ) {
        $this->client = $client;
        $this->config = $configuration;
    }

    public function getCategories(array $queryParams = [])
    {
        $query = Query::build($queryParams);
        $uri = 'product-categories';

        try {
            $response = $this->client->send(
                new Request(
                    'GET',
                    $this->config->getHost() . $uri . ($query ? "?{$query}" : ''),
                    HeaderFactory::getHeader(
                        $this->config->getApiPublicKey(),
                        $this->config->getApiSecretKey(),
                        'GET',
                        $uri
                    )
                )
            );
        } catch (RequestException $exception) {
            throw new WuroApiException($exception->getMessage(), $exception->getCode());
        }

        return json_decode($response->getBody()->getContents());
    }
}