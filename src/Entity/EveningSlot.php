<?php

namespace App\Entity;

use App\Repository\EveningSlotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EveningSlotRepository::class)]
class EveningSlot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]
    private ?string $name = null;

    #[ORM\Column]
    private ?bool $isAvailable = null;

    #[ORM\ManyToOne(inversedBy: 'eveningSlots')]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?Reservation $reservation = null;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
return (string) $this->name;
}
}
