<?php

namespace App\Tests\DTO;

use App\DTO\Criteria;
use PHPUnit\Framework\TestCase;

/**
 * Class CriteriaTest.
 */
class CriteriaTest extends TestCase
{
    /**
     * The criteria.
     *
     * @var Criteria
     */
    private $criteria;

    /**
     * Test instance.
     */
    public function testInstance(): void
    {
        $this->assertSame([], $this->criteria->getFilters());
        $this->assertSame([], $this->criteria->getOrderBy());
        $this->assertSame(0, $this->criteria->getOffset());
        $this->assertSame(50, $this->criteria->getLimit());

        $expectFilter = ['foo' => 'bar'];
        $this->criteria->setFilters($expectFilter);
        $this->assertSame($expectFilter, $this->criteria->getFilters());

        $expectOrderBy = ['foo' => 'ASC'];
        $this->criteria->setOrderBy('foo', 'ASC');
        $this->assertSame($expectOrderBy, $this->criteria->getOrderBy());

        $expectOffset = 1;
        $this->criteria->setOffset($expectOffset);
        $this->assertSame($expectOffset, $this->criteria->getOffset());

        $expectLimit = 5;
        $this->criteria->setLimit($expectLimit);
        $this->assertSame(5, $this->criteria->getLimit());
    }

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->criteria = new Criteria();
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        $this->criteria = null;

        parent::tearDown();
    }
}
