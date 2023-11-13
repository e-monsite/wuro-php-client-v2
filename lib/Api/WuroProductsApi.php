<?php

declare(strict_types=1);

namespace WuroClient\Api\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use WuroClient\Api\Configuration;
use WuroClient\Api\HeaderFactory;
use WuroClient\Api\Model\Product;
use WuroClient\Api\WuroApiException;

class WuroProductsApi
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

    /**
     * Get list of products
     * @param array $queryParams
     * @return mixed
     * @throws WuroApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProducts(array $queryParams = [])
    {
        $query = Query::build($queryParams);
        $uri = 'products';

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

        $content = json_decode($response->getBody()->getContents());

        foreach ($content->products as $product) {
            $products[$product->_id] = new Product($product);
        }

        return $products;
    }

    /**
     * Get one product
     * @param string $productId
     * @param array $queryParams
     * @return mixed
     * @throws WuroApiException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getProduct(string $productId, array $queryParams = [])
    {
        $products = [];
        $query = Query::build($queryParams);
        $uri = 'product/' . $productId;

        try {
            $response = $this->client->send(
                new Request(
                    'GET',
                    $this->config->getHost() . $uri .  ($query ? "?{$query}" : ''),
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