<?php
declare(strict_types=1);

use Composer\Autoload\ClassLoader;
use Skernl\Context\ApplicationContext;
use Skernl\Contract\ApplicationContextInterface;
use Skernl\Di\Container;
use Skernl\Di\Source\SourceManager;

$startMemory = memory_get_usage();
$startTime = hrtime(true);

/**
 * The anonymous function called here will create its own scope and maintain the interaction area from external
 * contamination.
 */
(function () {
    $loaders = Composer\Autoload\ClassLoader::getRegisteredLoaders();
    $container = new Container((new SourceManager(reset($loaders)))());
    $container->get(ApplicationContextInterface::class);
    new ApplicationContext($container);
})();
$endMemory = memory_get_usage();
$endTime = hrtime(true);

echo 'Time used: ' . $endTime - $startTime . PHP_EOL;
echo 'Memory used: ' . $endMemory - $startMemory . PHP_EOL;
echo 'Peak memory usage: ' . memory_get_peak_usage() . PHP_EOL;