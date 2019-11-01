<?php

namespace App\Tests\Service;

use App\Entity\Airport;
use App\Service\AirportService;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class AirportServiceTest.
 */
class AirportServiceTest extends TestCase
{
    /**
     * The airport service.
     *
     * @var AirportService
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
        $this->assertEquals(Airport::class, $this->service->getClassName());
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->em = $this->createMock(EntityManager::class);
        $this->service = new AirportService($this->em);
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
