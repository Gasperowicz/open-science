<?php

namespace OpenScience\Domain\Repository\Publication;

interface RepositoryInterface
{
    public function getByDoi(string $doi): array;
}
