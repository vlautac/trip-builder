<?php

namespace App\Tests\Entity;

use App\Entity\Airline;
use PHPUnit\Framework\TestCase;

/**
 * Class AirlineTest.
 */
class AirlineTest extends TestCase
{
    /**
     * The airline.
     *
     * @var Airline
     */
    private $airline;

    /**
     * Test of an Airline instance.
     */
    public function testInstance(): void
    {
        $expectId = 1;
        $expectCode = 'AB';
        $expectName = 'foobar';

        $this->airline
            ->setId($expectId)
            ->setCode($expectCode)
            ->setName($expectName);

        $this->assertSame($expectId, $this->airline->getId());
        $this->assertSame($expectCode, $this->airline->getCode());
        $this->assertSame($expectName, $this->airline->getName());
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->airline = new Airline();
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        $this->airline = null;

        parent::tearDown();
    }
}
