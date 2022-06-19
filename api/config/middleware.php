<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Slim\App;
use Slim\Middleware\ErrorMiddleware;

return static function (App $app, ContainerInterface $container): void {
    $app->add(ErrorMiddleware::class);
};
