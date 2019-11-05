<?php

namespace App\Service;

use App\Entity\Trip;

/**
 * Class TripService.
 */
class TripService extends AbstractCrudService
{
    /**
     * @inheritDoc
     */
    public function getClassName(): string
    {
        return Trip::class;
    }
}
