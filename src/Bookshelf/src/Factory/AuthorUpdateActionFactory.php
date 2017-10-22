<?php declare(strict_types=1);

namespace Bookshelf\Factory;

use Bookshelf\Action\AuthorUpdateAction;
use Bookshelf\AuthorEntity;
use Interop\Container\ContainerInterface;
use Spot\Locator as Spot;
use Zend\Expressive\Router\RouterInterface;

class AuthorUpdateActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $authorMapper = $container->get(Spot::class)->mapper(AuthorEntity::class);

        return new AuthorUpdateAction(
            $container->get(RouterInterface::class),
            $authorMapper
        );
    }
}
