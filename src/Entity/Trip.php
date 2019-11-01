<?php

namespace App\Entity;

/**
 * Class Trip.
 */
class Trip
{
    /**
     * The trip airlines.
     *
     * @var array
     */
    private $airlines;

    /**
     * The trip airports.
     *
     * @var array
     */
    private $airports;

    /**
     * The trip flights.
     *
     * @var array
     */
    private $flights;

    /**
     * Trip constructor.
     */
    public function __construct()
    {
        $this->airlines = [];
        $this->airports = [];
        $this->flights = [];
    }

    /**
     * Get the trip airlines.
     *
     * @return array
     */
    public function getAirlines(): array
    {
        return $this->airlines;
    }

    /**
     * Set the trip airlines.
     *
     * @param array $airlines
     *
     * @return Trip
     */
    public function setAirlines(array $airlines): Trip
    {
        $this->airlines = $airlines;

        return $this;
    }

    /**
     * Get the trip airports.
     *
     * @return array
     */
    public function getAirports(): array
    {
        return $this->airports;
    }

    /**
     * Set the trip airports.
     *
     * @param array $airports
     *
     * @return Trip
     */
    public function setAirports(array $airports): Trip
    {
        $this->airports = $airports;

        return $this;
    }

    /**
     * Get the trip flights.
     *
     * @return array
     */
    public function getFlights(): array
    {
        return $this->flights;
    }

    /**
     * Set the trip flights.
     *
     * @param array $flights
     *
     * @return Trip
     */
    public function setFlights(array $flights): Trip
    {
        $this->flights = $flights;

        return $this;
    }
}
