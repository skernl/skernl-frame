<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * @IndexController
 * @\App\Controller\IndexController
 */
class IndexController
{
    public function index(): string
    {
        return 'Hello, Skernl!';
    }
}