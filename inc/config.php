<?php


session_start();
ob_start();

error_reporting(E_ERROR | E_PARSE);

require 'vendor/autoload.php';


$config = [
    'host' => 'localhost:3308',
    'driver' => 'mysql',
    'database' => 'car_dealer',
    'username' => 'safa',
    'password' => '1234',
    'charset' => 'utf8',
    'collation' => 'utf8_general_ci',
    'cachedir' => __DIR__ . '/cache/sql/',

    'prefix' => ''
];

$db = new \Buki\Pdox($config);
?>