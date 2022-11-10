<?php

namespace OpenScience\Infrastructure\Hal;

use GuzzleHttp\Client as GuzzleClient;
use OpenScience\Shared\Domain\Factory;
use OpenScience\Shared\Domain\Logger;

class ClientFactory implements Factory
{
    /**
     * @return Hal
     */
    public static function create()
    {
        $token = '';

        /** @var Logger $logger */
        $logger = new \StdClass();

        $guzzleConfig = [
            'base_uri' => 'endpoint',
            'headers' => [
                'content-type' => 'application/json;charset=utf-8',
                'authorization' => sprintf('Bearer %s', $token),
            ],
            'timeout' => 120,
            'allow_redirects' => false,
        ];

        return new Hal(new GuzzleClient($guzzleConfig), $logger);
    }
}
