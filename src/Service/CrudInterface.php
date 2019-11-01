<?php


namespace App\Service;

use App\Entity\EntityInterface;

/**
 * Interface CrudInterface.
 */
interface CrudInterface
{
    /**
     * Find an entity filtered by the criterias.
     *
     * @param array $criteria
     *
     * @return EntityInterface
     */
    public function get(array $criteria): EntityInterface;

    /**
     * Find a list of entities filtered by the criterias.
     *
     * @param array      $criterias
     * @param array|null $orderBy
     * @param int|null   $limit
     * @param int|null   $offset
     *
     * @return array
     */
    public function getList(array $criterias, array $orderBy = null, ?int $limit = null, ?int $offset = null): array;

    /**
     * Create an entity.
     *
     * @param EntityInterface $entity
     */
    public function create(EntityInterface $entity): void;

    /**
     * Update an entity.
     *
     * @param EntityInterface $entity
     */
    public function update(EntityInterface $entity): void;

    /**
     * Delete an entity.
     *
     * @param EntityInterface $entity
     */
    public function delete(EntityInterface $entity): void;
}
