<?php

namespace App\Entity;

/**
 * Class Airport.
 */
class Airport
{
    /**
     * The airport code.
     *
     * @var string
     */
    private $code;

    /**
     * The airport city code.
     *
     * @var string
     */
    private $cityCode;

    /**
     * The airport name.
     *
     * @var string
     */
    private $name;

    /**
     * The airport city.
     *
     * @var string
     */
    private $city;

    /**
     * The airport country code.
     *
     * @var string
     */
    private $countryCode;

    /**
     * The airport region code.
     *
     * @var string
     */
    private $regionCode;

    /**
     * The airport latitude.
     *
     * @var float
     */
    private $latitude;

    /**
     * The airport longitude.
     *
     * @var float
     */
    private $longitude;

    /**
     * The airport timezone.
     *
     * @var string
     */
    private $timezone;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return Airport
     */
    public function setCode(string $code): Airport
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the airport city code.
     *
     * @return string
     */
    public function getCityCode(): string
    {
        return $this->cityCode;
    }

    /**
     * Set the airport city code.
     *
     * @param string $cityCode
     *
     * @return Airport
     */
    public function setCityCode(string $cityCode): Airport
    {
        $this->cityCode = $cityCode;

        return $this;
    }

    /**
     * Get the airport city name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the airport city name.
     *
     * @param string $name
     *
     * @return Airport
     */
    public function setName(string $name): Airport
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the airport city.
     *
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * Set the airport city.
     *
     * @param string $city
     *
     * @return Airport
     */
    public function setCity(string $city): Airport
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the airport country code.
     *
     * @return string
     */
    public function getCountryCode(): string
    {
        return $this->countryCode;
    }

    /**
     * Set the airport country code.
     *
     * @param string $countryCode
     *
     * @return Airport
     */
    public function setCountryCode(string $countryCode): Airport
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get the airport region code.
     *
     * @return string
     */
    public function getRegionCode(): string
    {
        return $this->regionCode;
    }

    /**
     * Set the airport region code.
     *
     * @param string $regionCode
     *
     * @return Airport
     */
    public function setRegionCode(string $regionCode): Airport
    {
        $this->regionCode = $regionCode;

        return $this;
    }

    /**
     * Get the airport latitude.
     *
     * @return float
     */
    public function getLatitude(): float
    {
        return $this->latitude;
    }

    /**
     * Set the airport latitude.
     *
     * @param float $latitude
     *
     * @return Airport
     */
    public function setLatitude(float $latitude): Airport
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get the airport longitude.
     *
     * @return float
     */
    public function getLongitude(): float
    {
        return $this->longitude;
    }

    /**
     * Set the airport longitude.
     *
     * @param float $longitude
     *
     * @return Airport
     */
    public function setLongitude(float $longitude): Airport
    {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get the airport timezone.
     *
     * @return string
     */
    public function getTimezone(): string
    {
        return $this->timezone;
    }

    /**
     * Set the airport timezone.
     *
     * @param string $timezone
     *
     * @return Airport
     */
    public function setTimezone(string $timezone): Airport
    {
        $this->timezone = $timezone;

        return $this;
    }
}
