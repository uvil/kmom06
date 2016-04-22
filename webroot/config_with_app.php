<?php
/**
 * Config file for pagecontrollers, creating an instance of $app.
 *
 */

// Get environment & autoloader.
require __DIR__.'/config.php'; 

// Create services and inject into the app. 
$di  = new \Anax\DI\CDIFactoryDefault();


$di->setShared('db', function() {
    $db = new \Mos\Database\CDatabaseBasic();
    $db->setOptions(require ANAX_APP_PATH . 'config/config_mysql.php');
    $db->connect();
    return $db;
});


$app = new \Anax\Kernel\CAnax($di);
