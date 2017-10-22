<?php declare(strict_types=1);

namespace Bookshelf\Action;

use Bookshelf\AuthorEntity;
use Bookshelf\AuthorMapper;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class AuthorDeleteAction implements MiddlewareInterface
{
    private $router;
    private $authorMapper;

    public function __construct(
        RouterInterface $router,
        TemplateRendererInterface $template,
        AuthorMapper $authorMapper
    ) {
        $this->router = $router;
        $this->template = $template;
        $this->authorMapper = $authorMapper;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $method = $request->getMethod();

        $id = (int)$request->getAttribute('id');
        $author = $this->authorMapper->loadById($id);

        if ($method == 'POST') {
            // delete and redirect
            // $this->authorMapper->delete($author);

            $flash = $request->getAttribute('flash');
            $flash->addMessage('message', 'Author deleted');

            $url = $this->router->generateUri('author.list');
            return new RedirectResponse($url);
        }

        // render confirmation form
        $data = [
            'author' => $author,
        ];

        return new HtmlResponse($this->template->render('bookshelf::author-delete', $data));
    }
}
