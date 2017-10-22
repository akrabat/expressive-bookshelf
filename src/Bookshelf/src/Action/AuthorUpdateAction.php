<?php declare(strict_types=1);

namespace Bookshelf\Action;

use Bookshelf\AuthorEntity;
use Bookshelf\AuthorMapper;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\RedirectResponse;
use Zend\Expressive\Router\RouterInterface;

class AuthorUpdateAction implements MiddlewareInterface
{
    private $router;
    private $authorMapper;

    public function __construct(RouterInterface $router, AuthorMapper $authorMapper)
    {
        $this->router = $router;
        $this->authorMapper = $authorMapper;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = (int)$request->getAttribute('id');
        $data = $request->getParsedBody();

        $inputFilter = AuthorEntity::getInputFilter();
        $inputFilter->setData($data);

        if ($inputFilter->isValid()) {
            $data = $inputFilter->getValues();

            $author = $this->authorMapper->loadById($id);
            $author->data($data);
            $result = $this->authorMapper->save($author);

            $flash = $request->getAttribute('flash');
            $flash->addMessage('message', 'Author updated');

            $url = $this->router->generateUri('author.view', ['id' => $id]);
            return new RedirectResponse($url);
        }

        $flash = $request->getAttribute('flash');
        $flash->addMessage('errors', $inputFilter->getMessages());
        $flash->addMessage('submitted-data', $data);

        $url = $this->router->generateUri('author.edit', ['id' => $id]);
        return new RedirectResponse($url);
    }
}
