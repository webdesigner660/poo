<?php

namespace App\Middleware;

use App\Controller\AuthController;
use Psr\Http\Message\ServerRequestInterface;
use Closure;
use Laminas\Diactoros\Response\RedirectResponse;
use Symplefony\IMiddleware;

class AdminMiddleware implements IMiddleware
{
    public function handle(ServerRequestInterface $request, Closure $next): mixed
    {
        if (AuthController::isAdmin()) {
            return $next($request);
        }

        return new RedirectResponse('/');
    }
}
