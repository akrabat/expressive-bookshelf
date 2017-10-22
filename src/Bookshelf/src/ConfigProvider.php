<?php
namespace Bookshelf;

/**
 * The configuration provider for the Author module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     * @return array
     */
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates'    => $this->getTemplates(),
        ];
    }

    public function getDependencies() : array
    {
        return [
            'factories'  => [
                Action\AuthorListAction::class   => Factory\AuthorListActionFactory::class,
                Action\AuthorViewAction::class   => Factory\AuthorViewActionFactory::class,
                Action\AuthorEditAction::class   => Factory\AuthorEditActionFactory::class,
                Action\AuthorUpdateAction::class => Factory\AuthorUpdateActionFactory::class,
            ],
        ];
    }

    /**
     * Returns the templates configuration
     *
     * @return array
     */
    public function getTemplates()
    {
        return [
            'paths' => [
                'bookshelf'    => [__DIR__ . '/../templates/bookshelf'],
            ],
        ];
    }
}
