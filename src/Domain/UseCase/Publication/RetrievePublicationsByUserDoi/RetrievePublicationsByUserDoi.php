<?php

namespace OpenScience\Domain\UseCase\Publication\RetrievePublicationsByUserDoi;

//use OpenScience\Domain\Service;
use OpenScience\Domain\Entity\Publication\Exception\BusinessRulesViolationException;
use OpenScience\Domain\Repository\Publication\RepositoryInterface as PublicationRepositoryInterface;

final class RetrievePublicationsByUserDoi
{
    private PublicationRepositoryInterface $publicationRepository;

    public function __construct(PublicationRepositoryInterface $publicationRepository)
    {
        $this->publicationRepository = $publicationRepository;
    }

    public function retrievePublicationsByUserDoi($doi): array {
        return $this->publicationRepository->getByDoi($doi);
    }

    public function execute(RetrievePublicationsByUserDoiRequest $request, RetrievePublicationsByUserDoiPresentable $presenter): void
    {
        // TODO: Implement execute() method.
        try {
            $presenter->show($request->getPublications());
        } catch (BusinessRulesViolationException $e) {
            $presenter->showBusinessRulesViolation($e);
        }
    }
}

