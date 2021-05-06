<?php

declare(strict_types=1);

use App\Application\Actions\HelloAction;
use Slim\App;

return function (App $app): void {
    $app->get('/', HelloAction::class);
};
