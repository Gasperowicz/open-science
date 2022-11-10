<?php

final class Singleton
{
    private static Singleton $singleton;

    private function __construct()
    {
    }

    public static function getInstance() {

        if(is_null(self::$singleton)) {
            self::$singleton = new Singleton();
        }

        return self::$singleton;
    }

    private static function setInstance()
    {
        return new Singleton();
    }
}
