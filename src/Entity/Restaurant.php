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

    /**
     * Get the value of nbTables
     */ 
    public function getNbTables()
    {
        return $this->nbTables;
    }

    /**
     * Set the value of nbTables
     *
     * @return  self
     */ 
    public function setNbTables($nbTables)
    {
        $this->nbTables = $nbTables;

        return $this;
    }
}
