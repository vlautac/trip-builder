<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Trip.
 *
 * @ORM\Entity
 */
class Trip implements EntityInterface
{
    /**
     * The trip ID.
     *
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={ "comment": "The trip ID" })
     */
    private $id;

    /**
     * The trip airlines.
     *
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Airline")
     * @ORM\JoinTable(
     *     name="trip__airline",
     *     joinColumns={ @ORM\JoinColumn(name="trip_id", referencedColumnName="id") },
     *     inverseJoinColumns={ @ORM\JoinColumn(name="airline_id", referencedColumnName="id") }
     * )
     */
    private $airlines;

    /**
     * The trip airports.
     *
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Airport")
     * @ORM\JoinTable(
     *     name="trip__airport",
     *     joinColumns={ @ORM\JoinColumn(name="trip_id", referencedColumnName="id") },
     *     inverseJoinColumns={ @ORM\JoinColumn(name="airport_id", referencedColumnName="id") }
     * )
     */
    private $airports;

    /**
     * The trip flights.
     *
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Flight")
     * @ORM\JoinTable(
     *     name="trip__flight",
     *     joinColumns={ @ORM\JoinColumn(name="trip_id", referencedColumnName="id") },
     *     inverseJoinColumns={ @ORM\JoinColumn(name="flight_id", referencedColumnName="id") }
     * )
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
     * Get the trip ID.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the trip ID.
     *
     * @param int $id
     *
     * @return Trip
     */
    public function setId(int $id): Trip
    {
        $this->id = $id;

        return $this;
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
     * Add an airline.
     *
     * @param Airline $airline
     *
     * @return Trip
     */
    public function addAirline(Airline $airline): Trip
    {
        $this->airlines[] = $airline;

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
     * Add an airport.
     *
     * @param Airport $airport
     *
     * @return Trip
     */
    public function addAirport(Airport $airport): Trip
    {
        $this->airports[] = $airport;

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

    /**
     * Add a flight.
     *
     * @param Flight $flight
     *
     * @return Trip
     */
    public function addFlight(Flight $flight): Trip
    {
        $this->flights[] = $flight;

        return $this;
    }
}
