<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RestaurantRepository::class)]
class Restaurant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbReservations = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbReservations(): ?int
    {
        return $this->nbReservations;
    }

    public function setNbReservations(int $nbReservations): self
    {
        $this->nbReservations = $nbReservations;

        return $this;
    }
}
