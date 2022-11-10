<?php

namespace OpenScience\Infrastructure\Ui\Adapter\UiAdapter;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\TemplateWrapper;

class TwigAdapter extends UiAdapter
{
    private TemplateWrapper $template;

    public function __construct($templateDirToLoad, $templateName)
    {
        $loader = new FilesystemLoader($templateDirToLoad);
        $twig = new Environment($loader);

        $this->template = $twig->load($templateName);
    }

    public function render($data)
    {
        // TODO: Implement render() method.
        $this->template->render($data);
    }

    public function renderErrors($data)
    {
        // TODO: Implement renderErrors() method.
    }
}
