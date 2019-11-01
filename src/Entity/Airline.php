<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Airline.
 *
 * @ORM\Entity
 */
class Airline implements EntityInterface
{
    /**
     * The airline ID.
     *
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * The airline code.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=2, options={ "comment": "The airline code" })
     */
    private $code;

    /**
     * The airline name.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=100, options={ "comment": "The airline name" })
     */
    private $name;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the airline ID.
     *
     * @param int $id
     *
     * @return Airline
     */
    public function setId(int $id): Airline
    {
        $this->id = $id;

        return $this;
    }

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
