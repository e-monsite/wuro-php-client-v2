<?php

declare(strict_types=1);

namespace WuroClient\Api\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Query;
use GuzzleHttp\Psr7\Request;
use WuroClient\Api\ApiFactory;
use WuroClient\Api\Configuration;
use WuroClient\Api\Model\CompanyType;
use WuroClient\Api\WuroApiException;

class WuroCompanyTypeApi
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

    public function getCompanyTypes(array $queryParams = [])
    {
        $query = Query::build($queryParams);
        $uri = 'company-types';

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

        $companyTypes = [];

        foreach ($content->companyTypes as $companyType) {
            $companyTypes[$companyType->_id] = new CompanyType($companyType);
        }

        return $companyTypes;
    }
}