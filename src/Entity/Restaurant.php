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
    private ?int $nbTables = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbTables(): ?int
    {
        return $this->nbTables;
    }

    public function setNbTables(int $nbTables): self
    {
        $this->nbTables = $nbTables;

        return $this;
    }
}
