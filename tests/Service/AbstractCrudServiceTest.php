<?php

namespace App\Tests\Service;

use App\Entity\EntityInterface;
use App\Service\AbstractCrudService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractCrudServiceTest.
 */
class AbstractCrudServiceTest extends TestCase
{
    /**
     * The abstract crud service.
     *
     * @var AbstractCrudService
     */
    private $service;

    /**
     * The entity manager mock.
     *
     * @var EntityManager|MockObject
     */
    private $em;

    /**
     * The entity class name.
     *
     * @var string
     */
    private $className;

    /**
     * Test get().
     */
    public function testGet(): void
    {
        $entityMock = $this->createMock(EntityInterface::class);

        $this->service
            ->expects($this->once())
            ->method('getClassName')
            ->willReturn($this->className);

        $repositoryMock = $this->createMock(EntityRepository::class);
        $repositoryMock
            ->expects($this->once())
            ->method('find')
            ->with(1)
            ->willReturn($entityMock);

        $this->em
            ->expects($this->once())
            ->method('getRepository')
            ->with($this->className)
            ->willReturn($repositoryMock);

        $criteria = ['id' => 1];

        $result = $this->service->get($criteria);
        $this->assertSame($entityMock, $result);
    }

    /**
     * Test getList().
     */
    public function testGetList(): void
    {
        $criteria = ['foo' => 'bar'];
        $orderBy = ['foo' => 'ASC'];
        $limit = 1;
        $offset = 1;

        $entitiesMock = [
            $this->createMock(EntityInterface::class),
            $this->createMock(EntityInterface::class),
        ];

        $this->service
            ->expects($this->once())
            ->method('getClassName')
            ->willReturn($this->className);

        $repositoryMock = $this->createMock(EntityRepository::class);
        $repositoryMock
            ->expects($this->once())
            ->method('findBy')
            ->with($criteria, $orderBy, $limit, $offset)
            ->willReturn($entitiesMock);

        $this->em
            ->expects($this->once())
            ->method('getRepository')
            ->with($this->className)
            ->willReturn($repositoryMock);

        $result = $this->service->getList($criteria, $orderBy, $limit, $offset);
        $this->assertSame($entitiesMock, $result);
    }

    /**
     * Test create().
     */
    public function testCreate()
    {
        $entityMock = $this->createMock(EntityInterface::class);

        $this->em
            ->expects($this->once())
            ->method('persist')
            ->with($entityMock);

        $this->em
            ->expects($this->once())
            ->method('flush');

        $this->service->create($entityMock);
    }

    /**
     * Test update().
     */
    public function testUpdate()
    {
        $entityMock = $this->createMock(EntityInterface::class);

        $this->em
            ->expects($this->once())
            ->method('persist')
            ->with($entityMock);

        $this->em
            ->expects($this->once())
            ->method('flush');

        $this->service->update($entityMock);
    }

    /**
     * Test delete().
     */
    public function testDelete()
    {
        $entityMock = $this->createMock(EntityInterface::class);

        $this->em
            ->expects($this->once())
            ->method('remove')
            ->with($entityMock);

        $this->em
            ->expects($this->once())
            ->method('flush');

        $this->service->delete($entityMock);
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->className = 'App\\MyEntityClass';
        $this->em = $this->createMock(EntityManager::class);
        $this->service = $this->getMockForAbstractClass(AbstractCrudService::class, [$this->em]);
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
