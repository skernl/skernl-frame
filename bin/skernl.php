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
    Skernl\Container\Proxy\Composer::init();
    return new Psr\Container\Proxy\ProxyHandler();
})()->register();

$endMemory = memory_get_usage();
$endTime = hrtime(true);

echo 'Time used: ' . $endTime - $startTime . PHP_EOL;
echo 'Memory used: ' . $endMemory - $startMemory . PHP_EOL;
echo 'Peak memory usage: ' . memory_get_peak_usage() . PHP_EOL;


//$pm = new Swoole\Process\Manager();
//
//$pm->add(function (Swoole\Process\Pool $pool, int $workerId) {

//    $pool->set([
//        'enable_coroutine' => true,
//        'enable_message_bus' => false,
//        'max_package_size' => 2 * 1024,
//    ]);
//use Swoole\Coroutine;
//use function Swoole\Coroutine\run;
//
//
//$process = new Swoole\Process(function () {
//
//    !defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__));
//
//    require BASE_PATH . '/vendor/autoload.php';
//
////    (function () {
//    Skernl\Container\Composer::init();
//    $container = (new Skernl\Di\Container())->register();
//    return $container->get(
//        Psr\Container\ContainerInterface::class
//    );
////    })()->run();
////    Skernl\Container\Composer::init();
//
////    var_dump(
////        new \App\Controller\IndexController()
////    );
//
////    Swoole\Process::signal(SIGTERM, function () use (&$running) {
////        $running = false;
////        echo "TERM\n";
////    });
//
//});
//$process->start();
//
//$status = Swoole\Process::wait();
//
//var_dump($status);
////echo "Recycled #{$status['pid']}, code={$status['code']}, signal={$status['signal']}" . PHP_EOL;
//
//
////$pm->add(function (Swoole\Process\Pool $pool, int $workerId) {
//
////    $pool->on('Message', function (Swoole\Process\Pool $pool, string $data) {
////        var_dump(strlen($data));
////    });
//
//var_dump(class_exists(\App\Controller\IndexController::class));
//
//
////    $status = Swoole\Process::wait();
////
////    var_dump($status);
//
////});
////
////$pm->start();