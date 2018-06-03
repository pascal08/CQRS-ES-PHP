<?php

namespace Example\EventListener;

use Example\Event\RegisterUserCompletedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class SendUserEmailConfirmationListener implements EventSubscriberInterface
{

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            RegisterUserCompletedEvent::class => 'sendUserEmailConfirmation'
        ];
    }

    public function sendUserEmailConfirmation(RegisterUserCompletedEvent $event)
    {
        echo 'Confirmation email send to: ' . $event->getUser()->getEmail() . PHP_EOL;
    }
}