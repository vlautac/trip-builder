<?php

namespace App\Tests\Controller;

use App\Controller\AirportController;
use App\Entity\Airport;
use App\Service\AirportService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class AirportsControllerTest.
 */
class AirportsControllerTest extends TestCase
{
    /**
     * The airport controller.
     *
     * @var AirportController
     */
    private $controller;

    /**
     * The airport service mock.
     *
     * @var AirportService|MockObject
     */
    private $service;

    /**
     * The serializer mock.
     *
     * @var SerializerInterface|MockObject
     */
    private $serializer;

    /**
     * Test getAirports().
     */
    public function testGetAirports(): void
    {
        $serialized = file_get_contents(__DIR__.'/data/airports.json');

        $airportsMock = [
            $this->createMock(Airport::class),
            $this->createMock(Airport::class),
        ];

        $this->service
            ->expects($this->once())
            ->method('getList')
            ->willReturn($airportsMock);

        $this->serializer
            ->expects($this->once())
            ->method('serialize')
            ->with($airportsMock)
            ->willReturn($serialized);

         $this->controller->getAirports($this->service, $this->serializer);
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->createMock(AirportService::class);
        $this->serializer = $this->createMock(SerializerInterface::class);

        $this->controller = new AirportController();
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
