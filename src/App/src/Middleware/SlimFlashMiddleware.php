<?php declare(strict_types=1);
namespace App\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Flash\Messages;

class SlimFlashMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        // Start the session whenever we use this!
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        return $delegate->process(
            $request->withAttribute('flash', new Messages())
        );
    }
}
