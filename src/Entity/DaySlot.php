<?php

namespace App\Entity;

use App\Repository\DaySlotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DaySlotRepository::class)]
class DaySlot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $time = null;

    #[ORM\Column]
    private ?bool $isAvailable = false;

    #[ORM\ManyToOne(inversedBy: 'daySlots')]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?Reservation $reservation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

   
 /**
     * Get the value of time
     */ 
    public function getTime()
    {
        return $this->time;
    }

    /**
     * Set the value of time
     *
     * @return  self
     */ 
    public function setTime($time)
    {
        $this->time = $time;

        return $this;
    } 
    public function isIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

  
    /**
     * Get the value of reservation
     */ 
    public function getReservation()
    {
        return $this->reservation;
    }

    /**
     * Set the value of reservation
     *
     * @return  self
     */ 
    public function setReservation($reservation)
    {
        $this->reservation = $reservation;

        return $this;
    }
    public function __toString()
{
return (string) $this->time;
}
}
