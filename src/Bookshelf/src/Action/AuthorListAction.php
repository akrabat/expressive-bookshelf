<?php declare(strict_types=1);

namespace Bookshelf\Action;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Expressive\Router;
use Zend\Expressive\Template;
use Zend\Expressive\Plates\PlatesRenderer;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\ZendView\ZendViewRenderer;

class AuthorListAction implements ServerMiddlewareInterface
{
    private $template;

    public function __construct(TemplateRendererInterface $template)
    {
        $this->template   = $template;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $data = [];

        return new HtmlResponse($this->template->render('bookshelf::author-list', $data));
    }
}
