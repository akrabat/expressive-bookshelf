<?php declare(strict_types=1);

namespace Bookshelf\Action;

use Bookshelf\AuthorMapper;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class AuthorViewAction implements ServerMiddlewareInterface
{
    private $template;
    private $authorMapper;

    public function __construct(TemplateRendererInterface $template, AuthorMapper $authorMapper)
    {
        $this->template = $template;
        $this->authorMapper = $authorMapper;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = (int)$request->getAttribute('id');
        $data = [
            'author' => $this->authorMapper->loadById($id),
        ];

        return new HtmlResponse($this->template->render('bookshelf::author-view', $data));
    }
}
