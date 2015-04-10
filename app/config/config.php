<?php

return new \Phalcon\Config(array(
    'database' => array( //多数据库自由切换
        'master' => array(
            'adapter' => 'Mysql',
            'host' => 'localhost',
            'username' => 'root',
            'password' => 'root',
            'dbname' => 'mysql',
            'charset' => 'utf8',
        ),
        'slave1' => array(
            'adapter' => 'Mysql',
            'host' => 'localhost',
            'username' => 'root',
            'password' => 'root',
            'dbname' => 'mysql',
            'charset' => 'utf8',
        )
    ),
    'application' => array(
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir' => APP_PATH . '/models/',
        'viewsDir' => APP_PATH . '/views/',
        'pluginsDir' => APP_PATH . '/plugins/',
        'libraryDir' => APP_PATH . '/library/',
        'cacheDir' => APP_PATH . '/cache/',
        'baseUri' => '/phalcon-base/',
    ),

    'socialLogin' => array(
        'qq' => array(),
        'sina' => array(
            'appid' => '504249136',
            'appkey' => 'de38bacac8c6dfef1c85e5741d3c98b0',
            'callbackUrl' => 'http://api.wudi.in/authorize/sinacallback/'
        )
    ),

    /**
     * Reference:
     * http://docs.phalconphp.com/zh/latest/api/Phalcon_Cache_Backend_Libmemcached.html
     */
    'memcached' => array(
        'servers' => array(
            array(
                "host" => "127.0.0.1",
                "port" => 11222,
                "weight" => "1",
                "prefix" => '',
                "persistent" => true
            )
        ),
        'client' => array(
            Memcached::OPT_HASH => Memcached::HASH_MD5,
            Memcached::OPT_PREFIX_KEY => '',
            // Memcached::OPT_SERIALIZER => Memcached::SERIALIZER_IGBINARY
        )
    )
));
