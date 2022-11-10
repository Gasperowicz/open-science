<?php

namespace OpenScience\Infrastructure\Data\Publication;

use OpenScience\Domain\Repository\Publication\RepositoryInterface;

final class RepositoryMock implements RepositoryInterface
{
    public function __construct()
    {
    }

    public function getByDoi(string $doi): array
    {
        // TODO: Implement getByDoi() method.
        return [];
    }
}
