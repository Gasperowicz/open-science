<?php

namespace OpenScience\Infrastructure\WebOfScience;

use Psr\Http\Message\ResponseInterface;
use OpenScience\Shared\Domain\Logger;
use OpenScience\Shared\Domain\Utils;

class Wos
{
    public function __construct(private $guzzleClient, private Logger $logger)
    {
    }

    public function getPublicationByDoi(string $userDoi)
    {
        try {
            /** @var ResponseInterface $response */
            $response = $this->guzzleClient->get('/publications');

            $this->logger->info('Web Of Science API Client Success', [
                'method' => __FUNCTION__,
                'user_doi' => $userDoi,
            ]);

            return Utils::jsonDecode($response->getBody(), true);
        } catch (\Exception $exception) {
            $this->logger->critical($exception);

            return [];
        }
    }
}
