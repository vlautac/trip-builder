<?php

namespace App\Tests\EventSubscriber;

use App\EventSubscriber\PreKernelRequestSubscriber;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\HeaderBag;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

/**
 * Class PreKernelRequestSubscriberTest.
 */
class PreKernelRequestSubscriberTest extends TestCase
{
    /**
     * The pre-kernel request subscriber.
     *
     * @var PreKernelRequestSubscriberTest
     */
    private $subscriber;

    /**
     * The application token.
     *
     * @var string
     */
    private $token;

    public function testGetSubscribedEvents(): void
    {
        $this->assertEquals(
            ['kernel.request' => ['handlePreRequest', 1]],
            PreKernelRequestSubscriber::getSubscribedEvents()
        );
    }

    /**
     * Test handlePreRequest().
     */
    public function testHandlePreRequest()
    {
        $headerBagMock = $this->createMock(HeaderBag::class);
        $headerBagMock
            ->expects($this->at(0))
            ->method('get')
            ->with('Content-Type')
            ->willReturn('application/json');

        $headerBagMock
            ->expects($this->at(1))
            ->method('get')
            ->with('token')
            ->willReturn($this->token);

        $requestMock = $this->createMock(Request::class);
        $requestMock->headers = $headerBagMock;

        $eventMock = $this->createMock(RequestEvent::class);
        $eventMock
            ->expects($this->once())
            ->method('getRequest')
            ->willReturn($requestMock);

        $this->subscriber->handlePreRequest($eventMock);
    }

    /**
     * Test handlePreRequest() will throw acces denied exception.
     */
    public function testHandlePreRequestWillThrowAccessDenied()
    {
        $this->expectException(AccessDeniedException::class);

        $headerBagMock = $this->createMock(HeaderBag::class);
        $headerBagMock
            ->expects($this->at(0))
            ->method('get')
            ->with('Content-Type')
            ->willReturn('application/json');

        $headerBagMock
            ->expects($this->at(1))
            ->method('get')
            ->with('token')
            ->willReturn('foobar');

        $requestMock = $this->createMock(Request::class);
        $requestMock->headers = $headerBagMock;

        $eventMock = $this->createMock(RequestEvent::class);
        $eventMock
            ->expects($this->once())
            ->method('getRequest')
            ->willReturn($requestMock);

        $this->subscriber->handlePreRequest($eventMock);
    }

    /**
     * Test handlePreRequest() should not handle not JSON type.
     */
    public function testHandlePreRequestNoJson()
    {
        $headerBagMock = $this->createMock(HeaderBag::class);
        $headerBagMock
            ->expects($this->once())
            ->method('get')
            ->with('Content-Type')
            ->willReturn('text/html');

        $requestMock = $this->createMock(Request::class);
        $requestMock->headers = $headerBagMock;

        $eventMock = $this->createMock(RequestEvent::class);
        $eventMock
            ->expects($this->once())
            ->method('getRequest')
            ->willReturn($requestMock);

        $this->subscriber->handlePreRequest($eventMock);
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->token = bin2hex(random_bytes(32));
        $this->subscriber = new PreKernelRequestSubscriber($this->token);
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        $this->token = null;
        $this->subscriber = null;

        parent::tearDown();
    }
}
