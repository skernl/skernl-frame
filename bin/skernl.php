#! /usr/bin/php
<?php

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');
ini_set('memory_limit', '1G');

error_reporting(E_ALL);
//
!defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__));

$startMemory = memory_get_usage();
$startTime = hrtime(true);

require BASE_PATH . '/vendor/autoload.php';


(function () {
    Skernl\Container\Composer::init();
    return (new Skernl\Container\Container())->get(
        Skernl\Di\DependencyInjection::class
    );
})()->register();

$endMemory = memory_get_usage();
$endTime = hrtime(true);

echo 'Time used: ' . $endTime - $startTime . PHP_EOL;
echo 'Memory used: ' . $endMemory - $startMemory . PHP_EOL;
echo 'Peak memory usage: ' . memory_get_peak_usage() . PHP_EOL;