<?php

namespace Zenstruck\Mailer\Test;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Mailer\Event\MessageEvent;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
final class ZenstruckMailerTestBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $container->register('zenstruck_mailer_test.mailer', TestMailer::class)
            ->setPublic(true)
            ->addTag('kernel.event_listener', ['event' => MessageEvent::class, 'method' => 'add'])
        ;
    }

    public function getContainerExtension(): ?ExtensionInterface
    {
        return null;
    }
}
