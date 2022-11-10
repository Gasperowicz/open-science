<?php

namespace OpenScience\Infra\Ui\Adapter\UiAdapter;

abstract class UiAdapter
{
    public abstract function render($data);

    public abstract function renderErrors($data);
}
