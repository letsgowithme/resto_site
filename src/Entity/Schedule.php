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
    private ?string $openingTimeAm = null;

    #[ORM\Column]
    private ?string $closingTimeAM = null;

    #[ORM\Column]
    private ?string $openingTimePm = null;

    #[ORM\Column]
    private ?string $closingTimePm = null;

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

   
    

    /**
     * Get the value of openingTimeAm
     */ 
    public function getOpeningTimeAm()
    {
        return $this->openingTimeAm;
    }

    /**
     * Set the value of openingTimeAm
     *
     * @return  self
     */ 
    public function setOpeningTimeAm($openingTimeAm)
    {
        $this->openingTimeAm = $openingTimeAm;

        return $this;
    }

    /**
     * Get the value of closingTimeAM
     */ 
    public function getClosingTimeAM()
    {
        return $this->closingTimeAM;
    }

    /**
     * Set the value of closingTimeAM
     *
     * @return  self
     */ 
    public function setClosingTimeAM($closingTimeAM)
    {
        $this->closingTimeAM = $closingTimeAM;

        return $this;
    }

    /**
     * Get the value of openingTimePm
     */ 
    public function getOpeningTimePm()
    {
        return $this->openingTimePm;
    }

    /**
     * Set the value of openingTimePm
     *
     * @return  self
     */ 
    public function setOpeningTimePm($openingTimePm)
    {
        $this->openingTimePm = $openingTimePm;

        return $this;
    }

    /**
     * Get the value of closingTimePm
     */ 
    public function getClosingTimePm()
    {
        return $this->closingTimePm;
    }

    /**
     * Set the value of closingTimePm
     *
     * @return  self
     */ 
    public function setClosingTimePm($closingTimePm)
    {
        $this->closingTimePm = $closingTimePm;

        return $this;
    }
}
