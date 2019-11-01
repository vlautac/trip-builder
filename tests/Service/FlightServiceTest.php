<?php

namespace App\Tests\Service;

use App\Entity\Flight;
use App\Service\FlightService;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class FlightServiceTest extends TestCase
{
    /**
     * The flight service.
     *
     * @var FlightService
     */
    private $service;

    /**
     * The entity manager mock.
     *
     * @var EntityManager|MockObject
     */
    private $em;

    /**
     * Test getClassName().
     */
    public function testGetClassName()
    {
        $this->assertEquals(Flight::class, $this->service->getClassName());
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->em = $this->createMock(EntityManager::class);
        $this->service = new FlightService($this->em);
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        $this->service = null;
        $this->em = null;

        parent::tearDown();
    }
}
