<?php
declare(strict_types=1);

use Skernl\Contract\ApplicationContextInterface;
use Skernl\Di\Container;
use Skernl\Di\Source\DefinitionSource;

$startMemory = memory_get_usage();
$startTime = hrtime(true);

$container = new Container(new DefinitionSource());

$endMemory = memory_get_usage();
$endTime = hrtime(true);

echo 'Time used: ' . $endTime - $startTime . PHP_EOL;
echo 'Memory used: ' . $endMemory - $startMemory . PHP_EOL;
echo 'Peak memory usage: ' . memory_get_peak_usage() . PHP_EOL;

return $container->get(ApplicationContextInterface::class)->getContainer();