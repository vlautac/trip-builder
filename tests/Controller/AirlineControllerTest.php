<?php

namespace App\Tests\Controller;

use App\Controller\AirlineController;
use App\Entity\Airline;
use App\Service\AirlineService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class AirlineControllerTest.
 */
class AirlineControllerTest extends TestCase
{
    /**
     * The airline controller.
     *
     * @var AirlineController
     */
    private $controller;

    /**
     * The airline service mock.
     *
     * @var AirlineService|MockObject
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
    public function testGetAirlines(): void
    {
        $serialized = file_get_contents(__DIR__.'/data/airlines.json');

        $airlinesMock = [
            $this->createMock(Airline::class),
            $this->createMock(Airline::class),
        ];

        $this->service
            ->expects($this->once())
            ->method('getList')
            ->willReturn($airlinesMock);

        $this->serializer
            ->expects($this->once())
            ->method('serialize')
            ->with($airlinesMock)
            ->willReturn($serialized);

        $this->controller->getAirlines($this->service, $this->serializer);
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->createMock(AirlineService::class);
        $this->serializer = $this->createMock(SerializerInterface::class);

        $this->controller = new AirlineController();
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
