<?php

namespace App\Entity;

use App\Repository\PlacesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlacesRepository::class)]
class Places
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbTotalPlaces = null;

    #[ORM\Column]
    private ?int $nbBusyPlaces = null;

    #[ORM\Column]
    private ?int $nbAvailablePlaces = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbTotalPlaces(): ?int
    {
        return $this->nbTotalPlaces;
    }

    public function setNbTotalPlaces(int $nbTotalPlaces): self
    {
        $this->nbTotalPlaces = $nbTotalPlaces;

        return $this;
    }

    public function getNbAvailablePlaces(): ?int
    {
        return $this->nbAvailablePlaces;
    }

    public function setNbAvailablePlaces(int $nbAvailablePlaces): self
    {
        $this->nbAvailablePlaces = $nbAvailablePlaces;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of nbBusyPlaces
     */ 
    public function getNbBusyPlaces()
    {
        return $this->nbBusyPlaces;
    }

    /**
     * Set the value of nbBusyPlaces
     *
     * @return  self
     */ 
    public function setNbBusyPlaces($nbBusyPlaces)
    {
        $this->nbBusyPlaces = $nbBusyPlaces;

        return $this;
    }
}
