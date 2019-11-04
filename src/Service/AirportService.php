<?php

namespace App\Service;

use App\Entity\Airport;

/**
 * Class AirportService.
 */
class AirportService extends AbstractCrudService
{
    /**
     * @inheritDoc
     */
    public function getClassName(): string
    {
        return Airport::class;
    }
}
