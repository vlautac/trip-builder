<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Flight.
 *
 * @ORM\Entity
 */
class Flight implements EntityInterface
{
    /**
     * The flight ID.
     *
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", options={ "comment": "The flight ID" })
     */
    private $id;

    /**
     * The flight airline code.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=2, options={ "comment": "The flight airline code" })
     */
    private $airline;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=3, options={ "comment": "The flight number" })
     */
    private $number;

    /**
     * The flight departure airport.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=3, options={ "comment": "The flight departure airport" })
     */
    private $departureAirport;

    /**
     * The flight departure time.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=5, options={ "comment": "The flight departure time" })
     */
    private $departureTime;

    /**
     * The flight arrival airport.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=3, options={ "comment": "The flight arrival airport" })
     */
    private $arrivalAirport;

    /**
     * The flight arrival time.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=5, options={ "comment": "The flight arrival time" })
     */
    private $arrivalTime;

    /**
     * The flight price.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=20, options={ "comment": "The flight price" })
     */
    private $price;

    /**
     * Get the flight ID.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the flight ID.
     *
     * @param int $id
     *
     * @return Flight
     */
    public function setId(int $id): Flight
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the flight airline code.
     *
     * @return string
     */
    public function getAirline(): string
    {
        return $this->airline;
    }

    /**
     * Set the flight airline code.
     *
     * @param string $airline
     *
     * @return Flight
     */
    public function setAirline(string $airline): Flight
    {
        $this->airline = $airline;

        return $this;
    }

    /**
     * Get the flight number.
     *
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * Set the flight number.
     *
     * @param string $number
     *
     * @return Flight
     */
    public function setNumber(string $number): Flight
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get the flight departure airport.
     *
     * @return string
     */
    public function getDepartureAirport(): string
    {
        return $this->departureAirport;
    }

    /**
     * Set the flight departure airport.
     *
     * @param string $departureAirport
     *
     * @return Flight
     */
    public function setDepartureAirport(string $departureAirport): Flight
    {
        $this->departureAirport = $departureAirport;

        return $this;
    }

    /**
     * Get the flight departure time.
     *
     * @return string
     */
    public function getDepartureTime(): string
    {
        return $this->departureTime;
    }

    /**
     * Set the flight departure time.
     *
     * @param string $departureTime
     *
     * @return Flight
     */
    public function setDepartureTime(string $departureTime): Flight
    {
        $this->departureTime = $departureTime;

        return $this;
    }

    /**
     * Get the flight arrival airport.
     *
     * @return string
     */
    public function getArrivalAirport(): string
    {
        return $this->arrivalAirport;
    }

    /**
     * Set the flight arrival airport.
     *
     * @param string $arrivalAirport
     *
     * @return Flight
     */
    public function setArrivalAirport(string $arrivalAirport): Flight
    {
        $this->arrivalAirport = $arrivalAirport;

        return $this;
    }

    /**
     * Get the flight arrival time.
     *
     * @return string
     */
    public function getArrivalTime(): string
    {
        return $this->arrivalTime;
    }

    /**
     * Set the flight arrival time.
     *
     * @param string $arrivalTime
     *
     * @return Flight
     */
    public function setArrivalTime(string $arrivalTime): Flight
    {
        $this->arrivalTime = $arrivalTime;

        return $this;
    }

    /**
     * Get the flight price.
     *
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * Set the flight price.
     *
     * @param string $price
     *
     * @return Flight
     */
    public function setPrice(string $price): Flight
    {
        $this->price = $price;

        return $this;
    }
}
