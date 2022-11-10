<?php

namespace OpenScience\Application\Publication;

use OpenScience\Domain\UseCase\Publication\RetrievePublicationsByUserDoi\RetrievePublicationsByUserDoi as UseCase;
use OpenScience\Domain\UseCase\Publication\RetrievePublicationsByUserDoi\RetrievePublicationsByUserDoiRequest;
use OpenScience\Infrastructure\Data\Publication\RepositoryMock as PublicationsProvider;
use OpenScience\Infrastructure\Ui\Adapter\UiAdapter;
use OpenScience\Infrastructure\Ui\Presenter\Publication\RetrievePublicationsByUserDoiPresenter;

require_once __DIR__ . '../../../vendor/autoload.php';

class RetrievePublicationsByUserDoi
{
    private UseCase $publicationRetrieverUseCase;

    public function __construct()
    {
        $this->publicationRetrieverUseCase = new UseCase(new PublicationsProvider());
    }

    public function __invoke()
    {
        $this->publicationRetrieverUseCase->execute(
            new RetrievePublicationsByUserDoiRequest($this->publicationRetrieverUseCase->retrievePublicationsByUserDoi('')),
            new RetrievePublicationsByUserDoiPresenter(new UiAdapter\TwigAdapter())
        );
    }
}
