<?php

declare(strict_types=1);

namespace App\Application\Actions;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HelloAction
{
    public function __invoke(Response $response)
    {
        $response->getBody()->write("Hello world!");
        return $response;
    }
}
