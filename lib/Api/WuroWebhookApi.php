<?php

declare(strict_types=1);

namespace WuroClient\Api\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use WuroClient\Api\ApiFactory;
use WuroClient\Api\Configuration;
use WuroClient\Api\Model\Product;
use WuroClient\Api\Model\Webhook;
use WuroClient\Api\WuroApiException;

class WuroWebhookApi
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

    public function getWebhooks()
    {
        $uri = 'webhooks';

        try {
            $response = $this->client->send(
                new Request(
                    'GET',
                    $this->config->getHost() . $uri,
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

        $webhooks = [];

        foreach ($content->webhooks as $webhook) {
            $webhooks[$webhook->_id] = new Webhook($webhook);
        }

        return $webhooks;
    }

    public function createWebhook(Webhook $webhook)
    {
        $uri = 'webhook';

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
                    json_encode(ApiFactory::getBody($webhook))
                )
            );
        } catch (RequestException $exception) {
            throw new WuroApiException($exception->getMessage(), $exception->getCode());
        }

        return json_decode($response->getBody()->getContents());
    }

    public function deleteWebhook(Webhook $webhook)
    {
        $uri = 'webhook/' . $webhook->getId();

        try {
            $response = $this->client->send(
                new Request(
                    'DELETE',
                    $this->config->getHost() . $uri,
                    ApiFactory::getHeader(
                        $this->config->getApiPublicKey(),
                        $this->config->getApiSecretKey(),
                        'DELETE',
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