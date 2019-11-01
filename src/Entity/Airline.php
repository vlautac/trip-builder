<?php

namespace App\Entity;

/**
 * Class Airline.
 */
class Airline
{
    /**
     * The airline code.
     *
     * @var string
     */
    private $code;

    /**
     * The airline name.
     *
     * @var string
     */
    private $name;

    /**
     * Get the airline code.
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Set the airline code.
     *
     * @param string $code
     *
     * @return Airline
     */
    public function setCode(string $code): Airline
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the airline name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the airline name.
     *
     * @param string $name
     *
     * @return Airline
     */
    public function setName(string $name): Airline
    {
        $this->name = $name;

        return $this;
    }
}
