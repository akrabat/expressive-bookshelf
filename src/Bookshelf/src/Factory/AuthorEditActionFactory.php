<?php declare(strict_types=1);

namespace Bookshelf\Factory;

use Bookshelf\Action\AuthorEditAction;
use Bookshelf\AuthorEntity;
use Interop\Container\ContainerInterface;
use Spot\Locator as Spot;
use Zend\Expressive\Template\TemplateRendererInterface;

class AuthorEditActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $authorMapper = $container->get(Spot::class)->mapper(AuthorEntity::class);

        return new AuthorEditAction(
            $container->get(TemplateRendererInterface::class),
            $authorMapper
        );
    }
}
