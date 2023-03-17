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

    #[ORM\Column(nullable: true)]
    private ?string $openingTimeMidday = null;

    #[ORM\Column(nullable: true)]
    private ?string $closingTimeMidday = null;

    #[ORM\Column(nullable: true)]
    private ?string $openingTimeEvening = null;

    #[ORM\Column(nullable: true)]
    private ?string $closingTimeEvening = null;

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
     * Get the value of openingTimeMidday
     */ 
    public function getopeningTimeMidday()
    {
        return $this->openingTimeMidday;
    }

    /**
     * Set the value of openingTimeMidday
     *
     * @return  self
     */ 
    public function setopeningTimeMidday($openingTimeMidday)
    {
        $this->openingTimeMidday = $openingTimeMidday;

        return $this;
    }

    /**
     * Get the value of closingTimeMidday
     */ 
    public function getclosingTimeMidday()
    {
        return $this->closingTimeMidday;
    }

    /**
     * Set the value of closingTimeMidday
     *
     * @return  self
     */ 
    public function setclosingTimeMidday($closingTimeMidday)
    {
        $this->closingTimeMidday = $closingTimeMidday;

        return $this;
    }

    /**
     * Get the value of openingTimeEvening
     */ 
    public function getopeningTimeEvening()
    {
        return $this->openingTimeEvening;
    }

    /**
     * Set the value of openingTimeEvening
     *
     * @return  self
     */ 
    public function setopeningTimeEvening($openingTimeEvening)
    {
        $this->openingTimeEvening = $openingTimeEvening;

        return $this;
    }

    /**
     * Get the value of closingTimeEvening
     */ 
    public function getclosingTimeEvening()
    {
        return $this->closingTimeEvening;
    }

    /**
     * Set the value of closingTimeEvening
     *
     * @return  self
     */ 
    public function setclosingTimeEvening($closingTimeEvening)
    {
        $this->closingTimeEvening = $closingTimeEvening;

        return $this;
    }
}
