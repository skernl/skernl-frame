<?php
declare(strict_types=1);

namespace PHPSTORM_META {
    // Reflect
    override(\Psr\Container\ContainerInterface::get(0), map(['' => '@']));
    override(\Skernl\Container\ContainerInterface::get(0), map(['' => '@']));
    override(\Skernl\Di\Container::get(0), map(['' => '@']));
}