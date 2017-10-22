<?php declare(strict_types=1);

namespace Bookshelf\Action;

use Bookshelf\AuthorMapper;
use Bookshelf\Form\AuthorForm;
use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface as ServerMiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Expressive\Template\TemplateRendererInterface;

class AuthorEditAction implements ServerMiddlewareInterface
{
    private $template;
    private $authorMapper;

    public function __construct(
        TemplateRendererInterface $template,
        AuthorMapper $authorMapper
    ) {
        $this->template = $template;
        $this->authorMapper = $authorMapper;
    }

    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $id = (int)$request->getAttribute('id');

        $flash = $request->getAttribute('flash');
        $errors = $flash->getFirstMessage('errors');
        $submittedData = $flash->getFirstMessage('submitted-data');

        $author = $this->authorMapper->loadById($id);
        if ($submittedData) {
            $author->data($submittedData);
        }

        $data = [
            'author' => $author,
            'errors' => $errors,
        ];

        return new HtmlResponse($this->template->render('bookshelf::author-edit', $data));
    }
}
