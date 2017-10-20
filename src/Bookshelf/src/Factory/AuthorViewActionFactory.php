<?php declare(strict_types=1);

namespace Bookshelf\Factory;

use Bookshelf\Action\AuthorViewAction;
use Bookshelf\AuthorEntity;
use Spot\Locator as Spot;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class AuthorViewActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $authorMapper = $container->get(Spot::class)->mapper(AuthorEntity::class);

        return new AuthorViewAction(
            $container->get(TemplateRendererInterface::class),
            $authorMapper
        );
    }
}
