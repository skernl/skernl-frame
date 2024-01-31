<?php
declare(strict_types=1);

namespace App\Controller;

use App\Service\IndexService;

/**
 * @IndexController
 * @\App\Controller\IndexController
 */
class IndexController
{
    public function __construct(
//        protected IndexService $indexService,
//        protected int          $num
    )
    {
    }

    public function ask()
    {
        return 123;
    }

    public function print()
    {
//        return $this->num;
    }

    public function index(): string
    {
//        return 'Hello, Skernl!' . $this->indexService->enum();
    }
}