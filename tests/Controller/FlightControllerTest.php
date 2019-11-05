<?php

namespace App\Tests\Controller;

use App\Builder\CriteriaBuilder;
use App\Controller\FlightController;
use App\DTO\Criteria;
use App\Entity\Flight;
use App\Service\FlightService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
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
     * The criteria builder mock.
     *
     * @var CriteriaBuilder|MockObject
     */
    private $builder;

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

        $expectedQuery = [];
        $parameterBagMock = $this->createMock(ParameterBag::class);
        $parameterBagMock
            ->expects($this->once())
            ->method('all')
            ->willReturn($expectedQuery);

        $request = $this->createMock(Request::class);
        $request->query = $parameterBagMock;

        $expectFilters = [];
        $expectOrderBy = [];
        $expectLimit = 50;
        $expectOffset = 0;
        $criteriaMock = $this->createMock(Criteria::class);
        $criteriaMock
            ->expects($this->once())
            ->method('getFilters')
            ->willReturn($expectFilters);

        $criteriaMock
            ->expects($this->once())
            ->method('getOrderBy')
            ->willReturn($expectOrderBy);

        $criteriaMock
            ->expects($this->once())
            ->method('getOffset')
            ->willReturn($expectOffset);

        $criteriaMock
            ->expects($this->once())
            ->method('getLimit')
            ->willReturn($expectLimit);

        $this->builder
            ->expects($this->once())
            ->method('build')
            ->willReturn($criteriaMock);

        $this->service
            ->expects($this->once())
            ->method('getList')
            ->with($expectFilters, $expectOrderBy, $expectLimit, $expectOffset)
            ->willReturn($flightsMock);

        $this->serializer
            ->expects($this->once())
            ->method('serialize')
            ->with($flightsMock)
            ->willReturn($serialized);

        $this->controller->getFlights($request, $this->service, $this->serializer, $this->builder);
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->createMock(FlightService::class);
        $this->serializer = $this->createMock(SerializerInterface::class);
        $this->builder = $this->createMock(CriteriaBuilder::class);

        $this->controller = new FlightController();
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        $this->service = null;
        $this->serializer = null;
        $this->builder = null;
        $this->controller = null;

        parent::tearDown();
    }
}
