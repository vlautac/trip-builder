<?php

namespace App\Service;

use App\Entity\Airline;

/**
 * Class AirlineService.
 */
class AirlineService extends AbstractCrudService
{
    /**
     * @inheritDoc
     */
    function getClassName(): string
    {
        return Airline::class;
    }
}
