<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurantRepository::class)]
class Restaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    

    #[ORM\Column]
    private ?int $nbTotalPlaces = null;

    #[ORM\Column]
    private ?int $nbAvailablePlaces = null;

    #[ORM\OneToMany(mappedBy: 'restaurant', targetEntity: Reservation::class)]
    private Collection $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

     /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    

    /**
     * Get the value of nbTotalPlaces
     */ 
    public function getNbTotalPlaces()
    {
        return $this->nbTotalPlaces;
    }

    /**
     * Set the value of nbTotalPlaces
     *
     * @return  self
     */ 
    public function setNbTotalPlaces($nbTotalPlaces)
    {
        $this->nbTotalPlaces = $nbTotalPlaces;

        return $this;
    }
    public function __toString()
    {
    return (string) $this->title;
    }
   

    /**
     * Get the value of nbAvailablePlaces
     */ 
    public function getNbAvailablePlaces()
    {
        return $this->nbAvailablePlaces;
    }

    /**
     * Set the value of nbAvailablePlaces
     *
     * @return  self
     */ 
    public function setNbAvailablePlaces($nbAvailablePlaces)
    {
        $this->nbAvailablePlaces = $nbAvailablePlaces;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setRestaurant($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getRestaurant() === $this) {
                $reservation->setRestaurant(null);
            }
        }

        return $this;
    }
}
