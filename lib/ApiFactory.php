<?php

declare(strict_types=1);

namespace WuroClient\Api;

abstract class ApiFactory
{
    public static function getHeader(string $apiPublicKey, string $apiSecretKey, string $method, string $uri, string $contentType ='application/json'): array
    {
        $dateTime = time();
        $CONCAT = $method . "/" . $uri . $dateTime;

        return [
            'Content-Type' => $contentType,
            'X-ApiKey' => $apiPublicKey,
            'X-Datetime' => $dateTime,
            'X-Signature' => hash_hmac('sha1', $CONCAT, $apiSecretKey)
        ];
    }

    public static function getBody(object $object): array
    {
        $body = [];

        foreach ($object as $key => $data) {
            if ($data !== null) {
                $body[$key] = $data;
            }
        }

        dd($body);

        return $body;
    }
}