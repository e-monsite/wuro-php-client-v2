<?php

declare(strict_types=1);

namespace WuroClient\Api\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
use WuroClient\Api\ApiFactory;
use WuroClient\Api\Configuration;
use WuroClient\Api\Model\Invitation;
use WuroClient\Api\WuroApiException;

class WuroInvitationApi
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

    public function sendInvitation(Invitation $invitation)
    {
        $uri = 'invitation';

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
                    json_encode(ApiFactory::getBody($invitation))
                )
            );
        } catch (RequestException $exception) {
            throw new WuroApiException($exception->getMessage(), $exception->getCode());
        }

        return json_decode($response->getBody()->getContents());
    }
}