<?php

namespace OpenScience\Domain\Entity\Publication\Exception;

class BusinessRulesViolationException extends \DomainException
{
    private const UNPROCESSABLE_ENTITY_ERROR_CODE = 422;
    private const CONTEXT = 'open_science.business_rules_violation.publication';

    public function __construct(string $message = '', int $code = self::UNPROCESSABLE_ENTITY_ERROR_CODE, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function getBusinessErrorMessage(): string
    {
        return self::CONTEXT;
    }
}
