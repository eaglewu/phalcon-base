<?php

return new \Phalcon\Config(array(
    'database'    => array( //多数据库自由切换
        'master' => array(
            'adapter'  => 'Mysql',
            'host'     => 'localhost',
            'username' => 'root',
            'password' => 'root',
            'dbname'   => 'mysql',
            'charset'  => 'utf8',
        ),
        'slave1' => array(
            'adapter'  => 'Mysql',
            'host'     => 'localhost',
            'username' => 'root',
            'password' => 'root',
            'dbname'   => 'mysql',
            'charset'  => 'utf8',
        )
    ),
    'application' => array(
        'controllersDir' => APP_PATH . '/controllers/',
        'modelsDir'      => APP_PATH . '/models/',
        'viewsDir'       => APP_PATH . '/views/',
        'pluginsDir'     => APP_PATH . '/plugins/',
        'libraryDir'     => APP_PATH . '/library/',
        'cacheDir'       => APP_PATH . '/cache/',
        'baseUri'        => '/phalcon-base/',
    )
));
