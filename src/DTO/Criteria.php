<?php

namespace App\DTO;

/**
 * Class Criteria.
 */
class Criteria
{
    /**
     * Indicates the criterias order ascending sort.
     */
    public const ORDER_ASC = 'ASC';

    /**
     * Indicates the criterias order descending sort.
     */
    public const ORDER_DESC = 'DESC';

    /**
     * The criteria filters.
     *
     * @var array
     */
    private $filters;

    /**
     * The criteria sort.
     *
     * @var array
     */
    private $orderBy;

    /**
     * The criteria offset.
     *
     * @var int
     */
    private $offset;

    /**
     * The criteria limit.
     *
     * @var int
     */
    private $limit;

    /**
     * Criteria constructor.
     */
    public function __construct()
    {
        $this->filters = [];
        $this->orderBy = [];
        $this->offset = 0;
        $this->limit = 50;
    }

    /**
     * Get the criteria filters.
     *
     * @return array
     */
    public function getFilters(): array
    {
        return $this->filters;
    }

    /**
     * Set the criteria filters.
     *
     * @param array $filters
     *
     * @return Criteria
     */
    public function setFilters(array $filters): Criteria
    {
        $this->filters = $filters;

        return $this;
    }

    /**
     * @return array
     */
    public function getOrderBy(): array
    {
        return $this->orderBy;
    }

    /**
     * Set the criteria sort.
     *
     * @param string $field
     * @param string $direction
     *
     * @return Criteria
     */
    public function setOrderBy(string $field, string $direction = Criteria::ORDER_ASC): Criteria
    {
        $this->orderBy = [$field => $direction];

        return $this;
    }

    /**
     * Get the criteria offset.
     *
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * Set the criteria offset.
     *
     * @param int $offset
     *
     * @return Criteria
     */
    public function setOffset(int $offset): Criteria
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * Get the criteria limit.
     *
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * Set the criteria limit.
     *
     * @param int $limit
     *
     * @return Criteria
     */
    public function setLimit(int $limit): Criteria
    {
        $this->limit = $limit;

        return $this;
    }
}
