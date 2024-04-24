<?php

declare(strict_types=1);

namespace WuroClient\Api\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use WuroClient\Api\ApiFactory;
use WuroClient\Api\Configuration;
use WuroClient\Api\Model\Company;
use WuroClient\Api\Model\Product;
use WuroClient\Api\WuroApiException;


class WuroCompanyApi
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

    public function getCompany()
    {
        $uri = 'company';

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
dd($content);
        return new Company($content->company);
    }

    public function getCompanyById(string $companyId)
    {
        $uri = 'company/' . $companyId;

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

        return new Company($content->company);
    }

    public function createCompany(Company $company)
    {
        $uri = 'company/';

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
                    json_encode(ApiFactory::getBody($company))
                )
            );
        } catch (RequestException $exception) {
            throw new WuroApiException($exception->getMessage(), $exception->getCode());
        }

        return json_decode($response->getBody()->getContents());
    }

    public function updateCompany(Company $company) {
        $uri = 'company/' . $company->getId();

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
                    json_encode(ApiFactory::getBody($company))
                )
            );
        } catch (RequestException $exception) {
            throw new WuroApiException($exception->getMessage(), $exception->getCode());
        }

        return json_decode($response->getBody()->getContents());
    }
}