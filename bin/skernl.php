#! /usr/bin/php
<?php

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');
ini_set('memory_limit', '1G');

error_reporting(E_ALL);

!defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__));

$startMemory = memory_get_usage();
$startTime = hrtime(true);

require BASE_PATH . '/vendor/autoload.php';

(function () {
    return Skernl\Container\Composer::init()();
})()->register();

//(function () {
//    Skernl\Di\Source\DefinitionSource::init();
//    $container = (new Skernl\Di\Container(
//        new Skernl\Di\Source\DefinitionSource()
//    ))()->get(
//        Skernl\Contract\ApplicationContextInterface::class
//    )->getContainer();
//    return $container->get(Skernl\Contract\ApplicationInterface::class);
//})()->run();

$endMemory = memory_get_usage();
$endTime = hrtime(true);

echo 'Time used: ' . $endTime - $startTime . PHP_EOL;
echo 'Memory used: ' . $endMemory - $startMemory . PHP_EOL;
echo 'Peak memory usage: ' . memory_get_peak_usage() . PHP_EOL;