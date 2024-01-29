#! /usr/bin/php
<?php

use Composer\Autoload\ClassLoader;
use Skernl\Context\ApplicationContext;
use Skernl\Contract\ApplicationContextInterface;
use Skernl\Di\Container;
use Skernl\Di\Source\SourceManager;

ini_set('display_errors', 'on');
ini_set('display_startup_errors', 'on');
ini_set('memory_limit', '1G');

error_reporting(E_ALL);

!defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__));

$startMemory = memory_get_usage();
$startTime = hrtime(true);

require BASE_PATH . '/vendor/autoload.php';

/**
 * The anonymous function called here will create its own scope and maintain the interaction area from external
 * contamination.
 */
(function () {
    $loaders = ClassLoader::getRegisteredLoaders();
//    $container =
    (new SourceManager(reset($loaders)))();
//    $container->get(ApplicationContextInterface::class);
//    new ApplicationContext($container);
    var_dump(spl_classes());
})();
$endMemory = memory_get_usage();
$endTime = hrtime(true);

echo 'Time used: ' . $endTime - $startTime . PHP_EOL;
echo 'Memory used: ' . $endMemory - $startMemory . PHP_EOL;
echo 'Peak memory usage: ' . memory_get_peak_usage() . PHP_EOL;
require BASE_PATH . '/config/container.php';


//$startMemory = memory_get_usage();
//$startTime = hrtime(true);
//
//$loaders = Composer\Autoload\ClassLoader::getRegisteredLoaders();
///**
// * @var ClassLoader $classLoader ;
// */
//$classLoader = reset($loaders);
//
//$map = $classLoader->getClassMap();

//var_dump(class_exists(App\Controller\IndexController::class));
//$indexController = new App\Controller\IndexController((new \App\Service\IndexService), 23);
//
//var_dump(class_exists(\App\Controller\IndexController::class));
//
//print PHP_EOL . $indexController->index() . PHP_EOL;
//print PHP_EOL . $indexController->print() . PHP_EOL;

//spl_autoload_register(function () {
//    eval(<<<EOF
//namespace App\Controller;
//
//use App\Service\IndexService;
//
///**
// * @IndexController
// * @\App\Controller\IndexController
// */
//class IndexController
//{
//    protected int \$num;
//    public function __construct()
//    {
//        \$this->num = 245;
//    }
//    public function print()
//    {
//        return \$this->num;
//    }
//}
//EOF);
//});
//
//var_dump((new App\Controller\IndexController)->print());
//
//
//$table = new Swoole\Table(1024);
//$table->column('fd', Swoole\Table::TYPE_INT);
//$table->create();
//
//$table->set('1', ['fd' => 2]);
//var_dump($table->get(1));
//
//$me = new Swoole\Table(1024);
//
//$me->column('fd', Swoole\Table::TYPE_INT);
//$me->create();
//
//var_dump($me->get('1'));