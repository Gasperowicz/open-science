<?php

use Symfony\Component\Console\Application;

require __DIR__.'../../vendor/autoload.php';

$application = new Application();

/*
Register commands
    like: $application->add(new UseCaseCommand)
    e.g.: $application->add(new GenerateAdminCommand());
*/

$application->run();
