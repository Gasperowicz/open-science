<?php

namespace OpenScience\Infra\Ui\Presenter\Publication;

use OpenScience\Domain\Entity\Publication\Exception\BusinessRulesViolationException;
use OpenScience\Domain\UseCase\Publication\RetrievePublicationsByUserDoi\RetrievePublicationsByUserDoiPresentable;

final class RetrievePublicationsByUserDoiPresenter implements RetrievePublicationsByUserDoiPresentable
{
    private object $uiOutputAdapter;

    public function __construct($uiOutputAdapter)
    {
        $this->uiOutputAdapter = $uiOutputAdapter;
    }

    public function show(array $data)
    {
        // TODO: Create/Implement/Use render() method from other file?
        $this->uiOutputAdapter->render($data);
    }

    public function showBusinessRulesViolation(BusinessRulesViolationException $exception)
    {
        // TODO: Create/Implement/Use renderError() method from other file?
        $this->uiOutputAdapter->renderError($exception, $exception->getBusinessErrorMessage());
    }
}
