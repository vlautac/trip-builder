<?php

namespace App\Tests\Service;

use App\Entity\Airline;
use App\Service\AirlineService;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class AirlineServiceTest.
 */
class AirlineServiceTest extends TestCase
{
    /**
     * The airline service.
     *
     * @var AirlineService
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
        $this->assertEquals(Airline::class, $this->service->getClassName());
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->em = $this->createMock(EntityManager::class);
        $this->service = new AirlineService($this->em);
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
