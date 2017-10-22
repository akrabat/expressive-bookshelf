<?php declare(strict_types=1);

namespace Bookshelf\Action;

use Bookshelf\BookMapper;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class BookListAction implements ServerMiddlewareInterface
{
    private $template;
    private $bookMapper;

    public function __construct(TemplateRendererInterface $template, BookMapper $bookMapper)
    {
        $this->template = $template;
        $this->bookMapper = $bookMapper;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $data = [
            'books' => $this->bookMapper->fetchAll(),
        ];

        return new HtmlResponse($this->template->render('bookshelf::book-list', $data));
    }
}
