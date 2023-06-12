<?php

class Singleton
{
    /**
     * Singleton statik bir alanda depolanmalıdır
     * Array tipinde olmasının nedeni alt sınıflara izin verilebilmesi içindir
     */
    public static $instances = [];

    /**
     * new operatorü ile çağırılmaması için protected olmalıdır
     */
    protected function __construct()
    {

    }

    /**
     * Singletons klonlanabilir olmamalı
     * Protected olmalı
     */
    protected function __clone()
    {

    }
    public static function getInstance() :Singleton
    {
        $cls = static::class;

        if(!isset(self::$instances[$cls])){
            self::$instances[$cls] = new static();
        }

        return self::$instances[$cls];
    }

}

function getClient()
{
    $class = Singleton::getInstance();
    var_dump($class);
}

getClient();

getClient();