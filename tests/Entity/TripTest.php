<?php

namespace App\Tests\Entity;

use App\Entity\Airline;
use App\Entity\Airport;
use App\Entity\Flight;
use App\Entity\Trip;
use PHPUnit\Framework\TestCase;

/**
 * Class TripTest.
 */
class TripTest extends TestCase
{
    /**
     * The trip.
     *
     * @var Trip
     */
    private $trip;

    public function testInstance()
    {
        $expectId = 1;

        $expectAirline = $this->createMock(Airline::class);

        $expectAirportA = $this->createMock(Airport::class);
        $expectAirportB = $this->createMock(Airport::class);

        $expectFlightA = $this->createMock(Flight::class);
        $expectFlightB = $this->createMock(Flight::class);

        $this->trip
            ->setId($expectId)
            ->setAirlines([$expectAirline])
            ->setAirports([$expectAirportA, $expectAirportB])
            ->setFlights([$expectFlightA, $expectFlightB]);

        $this->assertSame($expectId, $this->trip->getId());
        $this->assertCount(1, $this->trip->getAirlines());
        $this->assertEquals([$expectAirline], $this->trip->getAirlines());
        $this->assertCount(2, $this->trip->getAirports());
        $this->assertEquals([$expectAirportA, $expectAirportB], $this->trip->getAirports());
        $this->assertCount(2, $this->trip->getFlights());
        $this->assertEquals([$expectFlightA, $expectFlightB], $this->trip->getFlights());
    }

    public function testInstanceWithAdd()
    {
        $expectId = 1;

        $expectAirline = $this->createMock(Airline::class);

        $expectAirportA = $this->createMock(Airport::class);
        $expectAirportB = $this->createMock(Airport::class);

        $expectFlightA = $this->createMock(Flight::class);
        $expectFlightB = $this->createMock(Flight::class);

        $this->trip
            ->setId($expectId)
            ->addAirline($expectAirline)
            ->addAirport($expectAirportA)
            ->addAirport($expectAirportB)
            ->addFlight($expectFlightA)
            ->addFlight($expectFlightB);

        $this->assertSame($expectId, $this->trip->getId());
        $this->assertCount(1, $this->trip->getAirlines());
        $this->assertEquals([$expectAirline], $this->trip->getAirlines());
        $this->assertCount(2, $this->trip->getAirports());
        $this->assertEquals([$expectAirportA, $expectAirportB], $this->trip->getAirports());
        $this->assertCount(2, $this->trip->getFlights());
        $this->assertEquals([$expectFlightA, $expectFlightB], $this->trip->getFlights());
    }

    /**
     * @inheritDoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->trip = new Trip();
    }

    /**
     * @inheritDoc
     */
    protected function tearDown()
    {
        $this->trip = null;

        parent::tearDown();
    }
}
