#! /usr/bin/php
<?php

use Skernl\Contract\ApplicationContextInterface;
use Skernl\Di\Container;
use Skernl\Di\Source\DefinitionSource;

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');
ini_set('memory_limit', '1G');

error_reporting(E_ALL);

!defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__));

$startMemory = memory_get_usage();
$startTime = hrtime(true);

require BASE_PATH . '/vendor/autoload.php';

(function () {
    Skernl\Di\Source\SourceManager::init();
    /*** @var Psr\Container\ContainerInterface $container */
//    $container = require BASE_PATH . '/config/container.php';
//    $container = new Container(new DefinitionSource());
    $container = (new Container(new DefinitionSource()))->get(
        ApplicationContextInterface::class
    )->getContainer();
    $application = $container->get(Skernl\Contract\ApplicationInterface::class);
    $application->run();
})();

$endMemory = memory_get_usage();
$endTime = hrtime(true);

echo 'Time used: ' . $endTime - $startTime . PHP_EOL;
echo 'Memory used: ' . $endMemory - $startMemory . PHP_EOL;
echo 'Peak memory usage: ' . memory_get_peak_usage() . PHP_EOL;