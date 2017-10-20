<?php declare(strict_types=1);

namespace App\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\DelegatorFactoryInterface;

class WhoopsPageHandlerDelegatorFactory implements DelegatorFactoryInterface
{
    public function __invoke(ContainerInterface $container, $name, callable $callback, array $options = null)
    {
        $pageHandler = $callback();

        $pageHandler->addResourcePath(__DIR__ . '/../../templates/css');
        $pageHandler->addCustomCss('whoops.css');

        return $pageHandler;
    }
}
