<?php declare(strict_types=1);

namespace Bookshelf\Factory;

use Bookshelf\Action\AuthorListAction;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class AuthorListActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return new AuthorListAction(
            $container->get(TemplateRendererInterface::class)
        );
    }
}
