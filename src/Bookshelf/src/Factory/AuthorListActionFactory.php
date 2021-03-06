<?php declare(strict_types=1);

namespace Bookshelf\Factory;

use Bookshelf\Action\AuthorListAction;
use Bookshelf\AuthorEntity;
use Spot\Locator as Spot;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class AuthorListActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $authorMapper = $container->get(Spot::class)->mapper(AuthorEntity::class);

        return new AuthorListAction(
            $container->get(TemplateRendererInterface::class),
            $authorMapper
        );
    }
}
