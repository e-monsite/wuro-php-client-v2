<?php

declare(strict_types=1);

namespace WuroClient\Api\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use WuroClient\Api\ApiFactory;
use WuroClient\Api\Configuration;
use GuzzleHttp\Psr7\Request;
use WuroClient\Api\Model\DocumentNumber;
use WuroClient\Api\WuroApiException;

class WuroDocumentNumberApi
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

    public function getDocumentNumber()
    {
        $uri = 'document-numbers';

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

        $content = json_decode($response->getBody()->getContents());

        $documentNumbers = [];

        foreach ($content->documentNumbers as $documentNumber) {
            $documentNumbers[$documentNumber->_id] = new DocumentNumber($documentNumber);
        }

        return $documentNumbers;
    }

    public function updateDocumentNumber(DocumentNumber $documentNumber)
    {
        $uri = 'document-number/' . $documentNumber->getId();

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
                    )
                )
            );
        } catch (RequestException $exception) {
            throw new WuroApiException($exception->getMessage(), $exception->getCode());
        }

        return json_decode($response->getBody()->getContents());
    }
}