<?php

namespace App\Tests\Controller;

use App\Controller\FlightController;
use App\Entity\Flight;
use App\Service\FlightService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class FlightControllerTest.
 */
class FlightControllerTest extends TestCase
{
    /**
     * The flight controller.
     *
     * @var FlightController
     */
    private $controller;

    /**
     * The flight service mock.
     *
     * @var FlightService|MockObject
     */
    private $service;

    /**
     * The serializer mock.
     *
     * @var SerializerInterface|MockObject
     */
    private $serializer;

    /**
     * Test getFlights().
     */
    public function testGetFlights(): void
    {
        $serialized = file_get_contents(__DIR__.'/data/flights.json');

        $flightsMock = [
            $this->createMock(Flight::class),
            $this->createMock(Flight::class),
        ];

        $this->service
            ->expects($this->once())
            ->method('getList')
            ->willReturn($flightsMock);

        $this->serializer
            ->expects($this->once())
            ->method('serialize')
            ->with($flightsMock)
            ->willReturn($serialized);

        $this->controller->getFlights($this->service, $this->serializer);
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->createMock(FlightService::class);
        $this->serializer = $this->createMock(SerializerInterface::class);

        $this->controller = new FlightController();
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        $this->service = null;
        $this->serializer = null;
        $this->controller = null;

        parent::tearDown();
    }
}
