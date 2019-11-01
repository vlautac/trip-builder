<?php

namespace App\Tests\Entity;

use App\Entity\Flight;
use PHPUnit\Framework\TestCase;

/**
 * Class FlightTest.
 */
class FlightTest extends TestCase
{
    /**
     * The flight.
     *
     * @var Flight
     */
    private $flight;

    /**
     * Test of an Airport instance.
     */
    public function testInstance()
    {
        $expectId = 1;
        $expectAirline = 'XZ';
        $expectNumber = '123';
        $expectDepartureAirport = 'YUL';
        $expectDepartureTime = '07:35';
        $expectArrivalAirport = 'YVR';
        $expectArrivalTime = '10:05';
        $expectPrice = '273.23';

        $this->flight
            ->setId($expectId)
            ->setAirline($expectAirline)
            ->setNumber($expectNumber)
            ->setDepartureAirport($expectDepartureAirport)
            ->setDepartureTime($expectDepartureTime)
            ->setArrivalAirport($expectArrivalAirport)
            ->setArrivalTime($expectArrivalTime)
            ->setPrice($expectPrice);

        $this->assertSame($expectId, $this->flight->getId());
        $this->assertSame($expectAirline, $this->flight->getAirline());
        $this->assertSame($expectNumber, $this->flight->getNumber());
        $this->assertSame($expectDepartureAirport, $this->flight->getDepartureAirport());
        $this->assertSame($expectDepartureTime, $this->flight->getDepartureTime());
        $this->assertSame($expectArrivalAirport, $this->flight->getArrivalAirport());
        $this->assertSame($expectArrivalTime, $this->flight->getArrivalTime());
        $this->assertSame($expectPrice, $this->flight->getPrice());
    }

    /**
     * @inheritDoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->flight = new Flight();
    }

    /**
     * @inheritDoc
     */
    protected function tearDown()
    {
        $this->flight = null;

        parent::tearDown();
    }
}