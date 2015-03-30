<?php

$loader = new \Phalcon\Loader();

/**
 * 注册Autoload目录
 */
$loader->registerDirs(array(
    $config->application->controllersDir, // app/controllers/
    $config->application->modelsDir,  //  app/models/
    $config->application->libraryDir, //  app/library/
    $config->application->pluginsDir, //  app/plugins/
));

/**
 * 注册命名空间
 * 按需扩充
 */
$loader->registerNamespaces(array(
    'App\Library' => APP_PATH . "/library/", //公共类库目录
    'App\Plugins' => APP_PATH . "/plugins/" //插件目录
));

$loader->register();