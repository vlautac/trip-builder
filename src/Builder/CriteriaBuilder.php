<?php

namespace App\Builder;

use App\DTO\Criteria;

/**
 * Class CriteriaBuilder.
 */
class CriteriaBuilder
{
    /**
     * Indicates the sort query name.
     */
    public const QUERY_SORT = 'sort';

    /**
     * Indicates the sort direction query name.
     */
    public const QUERY_DIRECTION = 'direction';

    /**
     * Indicates the offset query name.
     */
    public const QUERY_OFFSET = 'offset';

    /**
     * Indicates the limit query name.
     */
    public const QUERY_LIMIT = 'limit';

    /**
     * Build a criteria object based on the given data.
     *
     * @param array $data
     *
     * @return Criteria
     */
    public function build(array $data): Criteria
    {
        $criteria = new Criteria();

        if (empty($data)) {
            return $criteria;
        }

        // Extract sort and direction query value
        if (isset($data[CriteriaBuilder::QUERY_SORT])) {
            $sort = $data[CriteriaBuilder::QUERY_SORT];

            $direction = isset($data[CriteriaBuilder::QUERY_DIRECTION])
            && Criteria::ORDER_DESC === $data[CriteriaBuilder::QUERY_DIRECTION] ?
                Criteria::ORDER_DESC :
                Criteria::ORDER_ASC;

            $criteria->setOrderBy($sort, $direction);

            unset($data[CriteriaBuilder::QUERY_SORT]);
            unset($data[CriteriaBuilder::QUERY_DIRECTION]);
        }

        // Extract offset query value
        if (isset($data[CriteriaBuilder::QUERY_OFFSET])) {
            $offset = $data[CriteriaBuilder::QUERY_OFFSET];

            $criteria->setOffset($offset);

            unset($data[CriteriaBuilder::QUERY_OFFSET]);
        }

        // Extract limit query value
        if (isset($data[CriteriaBuilder::QUERY_LIMIT])) {
            $limit = $data[CriteriaBuilder::QUERY_LIMIT];

            $criteria->setLimit($limit);

            unset($data[CriteriaBuilder::QUERY_LIMIT]);
        }

        $criteria->setFilters($data);

        return $criteria;
    }
}
