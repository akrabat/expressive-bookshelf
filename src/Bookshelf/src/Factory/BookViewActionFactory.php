<?php declare(strict_types=1);

namespace Bookshelf\Factory;

use Bookshelf\Action\BookViewAction;
use Bookshelf\BookEntity;
use Spot\Locator as Spot;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Template\TemplateRendererInterface;

class BookViewActionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $authorMapper = $container->get(Spot::class)->mapper(BookEntity::class);

        return new BookViewAction(
            $container->get(TemplateRendererInterface::class),
            $authorMapper
        );
    }
}
