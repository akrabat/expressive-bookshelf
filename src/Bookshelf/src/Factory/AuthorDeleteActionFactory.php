<?php declare(strict_types=1);

namespace Bookshelf\Factory;

use Bookshelf\Action\AuthorDeleteAction;
use Bookshelf\AuthorEntity;
use Interop\Container\ContainerInterface;
use Spot\Locator as Spot;
use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class AuthorDeleteActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $authorMapper = $container->get(Spot::class)->mapper(AuthorEntity::class);

        return new AuthorDeleteAction(
            $container->get(RouterInterface::class),
            $container->get(TemplateRendererInterface::class),
            $authorMapper
        );
    }
}
