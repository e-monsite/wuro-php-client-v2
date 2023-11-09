<?php

declare(strict_types=1);

namespace WuroClient\Api;

abstract class HeaderFactory
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
}