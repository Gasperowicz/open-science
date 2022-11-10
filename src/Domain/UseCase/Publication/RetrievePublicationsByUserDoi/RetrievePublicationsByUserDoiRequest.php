<?php

namespace OpenScience\Domain\UseCase\Publication\RetrievePublicationsByUserDoi;

final class RetrievePublicationsByUserDoiRequest
{
    private array $publications;

    public function __construct(array $publications)
    {
        $this->publications = $publications;
    }

    public function getPublications(): array
    {
        return $this->publications;
    }
}
