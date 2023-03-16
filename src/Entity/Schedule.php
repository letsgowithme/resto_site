<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $day = null;

    #[ORM\Column]
    private ?string $openingTime = null;

    #[ORM\Column]
    private ?string $closingTime = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

   
    public function getOpeningTime()
    {
        return $this->openingTime;
    }

    /**
     * Set the value of openingTime
     *
     * @return  self
     */ 
    public function setOpeningTime($openingTime)
    {
        $this->openingTime = $openingTime;

        return $this;
    }

    /**
     * Get the value of closingTime
     */ 
    public function getClosingTime()
    {
        return $this->closingTime;
    }

    /**
     * Set the value of closingTime
     *
     * @return  self
     */ 
    public function setClosingTime($closingTime)
    {
        $this->closingTime = $closingTime;

        return $this;
    }
}
