<?php declare(strict_types=1);

namespace App\Factory;

use Interop\Container\ContainerInterface;
use Spot\Locator;
use Spot\Config;

class SpotFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $cfg = new \Spot\Config();
        $cfg->addConnection('db', $container->get('config')['db']);

        $spot = new \Spot\Locator($cfg);
        return $spot;
    }
}
