<?php
declare(strict_types=1);

use Composer\Autoload\ClassLoader;
use Skernl\Context\ApplicationContext;
use Skernl\Di\ClassesManager;

$startMemory = memory_get_usage();
$startTime = microtime(true);

$loaders = Composer\Autoload\ClassLoader::getRegisteredLoaders();
/**
 * @var ClassLoader $classLoader ;
 */
$classLoader = reset($loaders);
/** @noinspection PhpUnhandledExceptionInspection */
$manager = new ClassesManager($classLoader);

new ApplicationContext($manager->getContainer());

$endMemory = memory_get_usage();
$endTime = microtime(true);

$memoryUsed = $endMemory - $startMemory;
$time = $endTime - $startTime;

echo 'Time used: ' . $time . PHP_EOL;
echo 'Memory used: ' . $memoryUsed . PHP_EOL;
echo 'Peak memory usage: ' . memory_get_peak_usage() . PHP_EOL;