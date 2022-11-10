<?php

namespace OpenScience\Domain\UseCase\Publication\RetrievePublicationsByUserDoi;

use OpenScience\Domain\Entity\Publication\Exception\BusinessRulesViolationException;

interface RetrievePublicationsByUserDoiPresentable
{
    public function show(array $data);

    public function showBusinessRulesViolation(BusinessRulesViolationException $exception);
}
