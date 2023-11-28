<?php

declare(strict_types=1);

namespace WuroClient\Api\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use WuroClient\Api\Configuration;
use WuroClient\Api\ApiFactory;
use WuroClient\Api\Model\Product;
use WuroClient\Api\Model\ProductVariant;
use WuroClient\Api\WuroApiException;

class WuroProductsApi
{
    private $client;
    private $config;

    private bool $debug;

    public function __construct(
        ClientInterface $client,
        Configuration $configuration,
        bool $debug = false,
    ) {
        $this->client = $client;
        $this->config = $configuration;
        $this->debug = $debug;
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
                    ApiFactory::getHeader(
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

        if ($this->debug === true) {
            return json_decode($response->getBody()->getContents());
        }

        $content = json_decode($response->getBody()->getContents());

        $products = [];

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
                    ApiFactory::getHeader(
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

        return new Product($content->product);
    }

    public function createProduct(Product $product)
    {
        $uri = 'product/';

        try {
            $response = $this->client->send(
                new Request(
                    'POST',
                    $this->config->getHost() . $uri,
                    ApiFactory::getHeader(
                        $this->config->getApiPublicKey(),
                        $this->config->getApiSecretKey(),
                        'POST',
                        $uri
                    ),
                    json_encode(ApiFactory::getBody($product))
                )
            );
        } catch (RequestException $exception) {
            throw new WuroApiException($exception->getMessage(), $exception->getCode());
        }

        return json_decode($response->getBody()->getContents());
    }

    public function updateProduct(Product $product, array $queryParams = []) {
        $query = Query::build($queryParams);
        $uri = 'product/' . $product->getId();

        try {
            $response = $this->client->send(
                new Request(
                    'PATCH',
                    $this->config->getHost() . $uri . ($query ? "?{$query}" : ''),
                    ApiFactory::getHeader(
                        $this->config->getApiPublicKey(),
                        $this->config->getApiSecretKey(),
                        'PATCH',
                        $uri
                    ),
                    json_encode(ApiFactory::getBody($product))
                )
            );
        } catch (RequestException $exception) {
            throw new WuroApiException($exception->getMessage(), $exception->getCode());
        }

        return json_decode($response->getBody()->getContents());
    }

    public function createVariant(ProductVariant $variant, string $productId)
    {
        $uri = 'product/' . $productId . '/variant';

        try {
            $response = $this->client->send(
                new Request(
                    'POST',
                    $this->config->getHost() . $uri,
                    ApiFactory::getHeader(
                        $this->config->getApiPublicKey(),
                        $this->config->getApiSecretKey(),
                        'POST',
                        $uri
                    ),
                    json_encode(ApiFactory::getBody($variant))
                )
            );
        } catch (RequestException $exception) {
            throw new WuroApiException($exception->getMessage(), $exception->getCode());
        }

        return json_decode($response->getBody()->getContents());
    }

    public function updateVariant(ProductVariant $variant, string $productId)
    {
        $uri = 'product/' . $productId . '/variant/' . $variant->getId();

        try {
            $response = $this->client->send(
                new Request(
                    'PATCH',
                    $this->config->getHost() . $uri,
                    ApiFactory::getHeader(
                        $this->config->getApiPublicKey(),
                        $this->config->getApiSecretKey(),
                        'PATCH',
                        $uri
                    ),
                    json_encode(ApiFactory::getBody($variant))
                )
            );
        } catch (RequestException $exception) {
            throw new WuroApiException($exception->getMessage(), $exception->getCode());
        }

        return json_decode($response->getBody()->getContents());
    }
}