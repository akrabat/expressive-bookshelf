<?php

namespace App\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router;

class HomePageAction implements ServerMiddlewareInterface
{
    private $router;

    private $template;

    public function __construct(Router\RouterInterface $router)
    {
        $this->router   = $router;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $url = $this->router->generateUri('author.list');
        return new RedirectResponse($url);
    }
}
