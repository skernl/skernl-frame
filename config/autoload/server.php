<?php
declare(strict_types=1);

use Skernl\Contract\ServerInterface;

return [
    [
        'name' => 'index',
        'host' => '0.0.0.0',
        'port' => [
            9501,
        ],
        'type' => ServerInterface::SERVER_HTTP,
        'options' => [
            'enable_request_lifecycle' => false,
        ],
    ],
];