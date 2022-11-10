<?php

namespace OpenScience\Shared\Infrastructure\Logger;

final class Singleton
{
    private static Singleton $singleton;

    private function __construct()
    {
    }

    public static function getInstance()
    {

        if (is_null(self::$singleton)) {
            self::$singleton = new Singleton();
        }

        return self::$singleton;
    }
}
