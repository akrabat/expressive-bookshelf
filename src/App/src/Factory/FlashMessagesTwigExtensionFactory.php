<?php declare(strict_types=1);

namespace App\Factory;

use \Slim\Flash\Messages;
use App\TwigExtension\FlashMessagesTwigExtension;
use Interop\Container\ContainerInterface;

class FlashMessagesTwigExtensionFactory
{
    public function __invoke(ContainerInterface $container)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        return new FlashMessagesTwigExtension(
            $container->get(Messages::class)
        );
    }
}
