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
    function getClassName(): string
    {
        return Airport::class;
    }
}
