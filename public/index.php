<?php

declare(strict_types=1);

use DI\Bridge\Slim\Bridge as AppFactory;

require __DIR__ . '/../vendor/autoload.php';

(function () {
    $app = AppFactory::create();
    $app->addRoutingMiddleware();
    $app->addErrorMiddleware(false, true, true);

    (require __DIR__ . '/../config/routes.php')($app);

    $app->run();
})();
