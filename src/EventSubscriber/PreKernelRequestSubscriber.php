<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Class PreKernelRequestSubscriber.
 */
class PreKernelRequestSubscriber implements EventSubscriberInterface
{
    /**
     * The application API token.
     *
     * @var string
     */
    private $token;

    /**
     * PreKernelRequestSubscriber constructor.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => ['handlePreRequest', 1],
        ];
    }

    /**
     * Handle the pre request event.
     * Will throw an AccessDenied exception when trying to POST, PUT or DELETE
     * a ressource without sending the authorization token in HTTP header.
     *
     * @param RequestEvent $event
     */
    public function handlePreRequest(RequestEvent $event)
    {
        $request = $event->getRequest();

        if ('application/json' !== $request->headers->get('Content-Type'))
        {
            return;
        }

        $requestToken = $request->headers->get('token');

        if (empty($requestToken) || $requestToken !== $this->token)
        {
            throw new AccessDeniedException('Access denied.');
        }
    }
}
