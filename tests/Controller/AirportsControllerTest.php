<?php

namespace App\Tests\Controller;

use App\Builder\CriteriaBuilder;
use App\Controller\AirportController;
use App\DTO\Criteria;
use App\Entity\Airport;
use App\Service\AirportService;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\ParameterBag;
use Symfony\Component\HttpFoundation\Request;
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
     * The criteria builder mock.
     *
     * @var CriteriaBuilder|MockObject
     */
    private $builder;

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
            ->willReturn($airportsMock);

        $this->serializer
            ->expects($this->once())
            ->method('serialize')
            ->with($airportsMock)
            ->willReturn($serialized);

         $this->controller->getAirports($request, $this->service, $this->serializer, $this->builder);
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->service = $this->createMock(AirportService::class);
        $this->serializer = $this->createMock(SerializerInterface::class);
        $this->builder = $this->createMock(CriteriaBuilder::class);

        $this->controller = new AirportController();
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
