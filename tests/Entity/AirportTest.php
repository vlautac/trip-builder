<?php

namespace App\Tests\Entity;

use App\Entity\Airport;
use PHPUnit\Framework\TestCase;

/**
 * Class AirportTest.
 */
class AirportTest extends TestCase
{
    /**
     * The airport.
     *
     * @var Airport
     */
    private $airport;

    /**
     * Test of an Airport instance.
     */
    public function testInstance()
    {
        $expectId = 1;
        $expectCode = 'AB';
        $expectName = 'foobar';
        $expectCity = 'Montreal';
        $expectCountryCode = 'CA';
        $expectRegionCode = 'QC';
        $expectLatitude = 45.457714;
        $expectLongitude = -73.749908;
        $expectTimezone = 'America/Montreal';

        $this->airport
            ->setId($expectId)
            ->setCode($expectCode)
            ->setName($expectName)
            ->setCity($expectCity)
            ->setCountryCode($expectCountryCode)
            ->setRegionCode($expectRegionCode)
            ->setLatitude($expectLatitude)
            ->setLongitude($expectLongitude)
            ->setTimezone($expectTimezone);

        $this->assertSame($expectId, $this->airport->getId());
        $this->assertSame($expectCode, $this->airport->getCode());
        $this->assertSame($expectName, $this->airport->getName());
        $this->assertSame($expectCity, $this->airport->getCity());
        $this->assertSame($expectCountryCode, $this->airport->getCountryCode());
        $this->assertSame($expectRegionCode, $this->airport->getRegionCode());
        $this->assertSame($expectLatitude, $this->airport->getLatitude());
        $this->assertSame($expectLongitude, $this->airport->getLongitude());
        $this->assertSame($expectTimezone, $this->airport->getTimezone());
    }

    /**
     * @inheritDoc
     */
    protected function setUp()
    {
        parent::setUp();

        $this->airport = new Airport();
    }

    /**
     * @inheritDoc
     */
    protected function tearDown()
    {
        $this->airport = null;

        parent::tearDown();
    }
}