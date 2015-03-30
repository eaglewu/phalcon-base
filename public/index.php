<?php

error_reporting(E_ALL);

/**
 * Register Base DIR for App (../app/)
 */
define("APP_PATH", realpath(__DIR__ . '/../app/'));

try {

    /**
     * Read the configuration
     */
    $config = include APP_PATH . "/config/config.php";

    /**
     * Read auto-loader
     */
    include APP_PATH . "/config/loader.php";

    /**
     * Read services
     */
    include APP_PATH . "/config/services.php";

    /**
     * Handle the request
     */
    $application = new \Phalcon\Mvc\Application($di);

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage();
}
