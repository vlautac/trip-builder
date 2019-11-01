<?php

namespace App\Entity;

/**
 * Class Flight.
 */
class Flight
{
    /**
     * The flight airline code.
     *
     * @var string
     */
    private $airline;

    /**
     * @var string
     */
    private $number;

    /**
     * The flight departure airport.
     *
     * @var string
     */
    private $departureAirport;

    /**
     * The flight departure time.
     *
     * @var string
     */
    private $departureTime;

    /**
     * The flight arrival airport.
     *
     * @var string
     */
    private $arrivalAirport;

    /**
     * The flight arrival time.
     *
     * @var string
     */
    private $arrivalTime;

    /**
     * The flight price.
     *
     * @var string
     */
    private $price;

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
