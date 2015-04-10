<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as MysqlDbAdapter;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Cache\Backend\Libmemcached;
use Phalcon\Mvc\Router;

/**
 * The FactoryDefault Dependency Injector automatically register the right services providing a full stack framework
 */
$di = new FactoryDefault();

$di->set('config', function () use ($config) {
    return $config;
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
}, true);

$di->set('router', function () {

    $router = new Router();
//    $router->notFound(array(
//        'controller' => 'Helper',
//        'action' => 'error404'
//    ));

    return $router;

}, true);

/**
 * 注册视图组件
 */
$di->set('view', function () use ($config) {

    $view = new View();
    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {

            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ));

            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
}, true);

/**
 * 注入数据库连接对象 Model 内可根据 注册名称自由切换数据库连接
 * 按业务扩充，注册并不产生连接，使用时才会真正连接数据库
 * -
 * eg.Master主库
 */
$di->set('dbMaster', function () use ($config) {

    return new MysqlDbAdapter(array(
        'host' => $config->database->master->host,
        'username' => $config->database->master->username,
        'password' => $config->database->master->password,
        'dbname' => $config->database->master->dbname,
        "charset" => $config->database->master->charset
    ));

});

/**
 * eg.Slave1从库
 */
$di->set('dbSlave1', function () use ($config) {

    return new MysqlDbAdapter(array(
        'host' => $config->database->slave1->host,
        'username' => $config->database->slave1->username,
        'password' => $config->database->slave1->password,
        'dbname' => $config->database->slave1->dbname,
        "charset" => $config->database->slave1->charset
    ));

});

/**
 * Memcacached + Igbinary
 */
$frontCache = new Phalcon\Cache\Frontend\Igbinary(array(
    "lifetime" => 172800
));

$di->set('cache', function () use ($config, $frontCache) {
    return new Libmemcached($frontCache, $config->memcached->toArray());
});


/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->set('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * 注册Session组件
 */
$di->set('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});
