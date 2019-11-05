<?php

namespace App\Tests\Service;

use App\Entity\Trip;
use App\Service\TripService;
use Doctrine\ORM\EntityManager;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class TripServiceTest.
 */
class TripServiceTest extends TestCase
{
    /**
     * The trip service.
     *
     * @var TripService
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
        $this->assertEquals(Trip::class, $this->service->getClassName());
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->em = $this->createMock(EntityManager::class);
        $this->service = new TripService($this->em);
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
