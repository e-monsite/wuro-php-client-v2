<?php

declare(strict_types=1);

namespace WuroClient\Api\Api;

use GuzzleHttp\ClientInterface;
use Wuro\Api\Model\Quote;
use WuroClient\Api\Configuration;

class WuroQuoteApi
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

    public function createQuote(Quote $quote)
    {
        $uri = 'quote';

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
                    json_encode(ApiFactory::getBody($quote))
                )
            );
        } catch (RequestException $exception) {
            throw new WuroApiException($exception->getMessage(), $exception->getCode());
        }

        return json_decode($response->getBody()->getContents());
    }
}