<?php

namespace Zenstruck\Mailer\Test\Tests\Fixture;

use Symfony\Component\Mailer\Header\MetadataHeader;
use Symfony\Component\Mailer\Header\TagHeader;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

/**
 * @author Kevin Bond <kevinbond@gmail.com>
 */
final class Email1 extends Email
{
    public function __construct()
    {
        parent::__construct();

        $this
            ->from('webmaster@example.com')
            ->to(new Address('kevin@example.com', 'Kevin'))
            ->cc('cc@example.com')
            ->bcc('bcc@example.com')
            ->replyTo('reply@example.com')
            ->attachFromPath(__DIR__.'/files/attachment.txt')
            ->subject('email subject')
            ->html('html body')
            ->text('text body')
        ;

        if (\class_exists(TagHeader::class)) {
            $this->getHeaders()
                ->add(new TagHeader('foo'))
                ->add(new TagHeader('bar'))
                ->add(new MetadataHeader('color', 'blue'))
                ->add(new MetadataHeader('id', '5'))
            ;
        }
    }
}
