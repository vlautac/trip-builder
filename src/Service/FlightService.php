<?php

namespace App\Service;

use App\Entity\Flight;

/**
 * Class FlightService.
 */
class FlightService extends AbstractCrudService
{
    /**
     * @inheritDoc
     */
    public function getClassName(): string
    {
        return Flight::class;
    }
}
