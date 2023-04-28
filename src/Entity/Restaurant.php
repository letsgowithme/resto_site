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

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $nbTotalTables = null;

    #[ORM\Column]
    private ?int $nbTotalPlaces = null;

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
     * Get the value of nbTables
     */ 
    public function getNbTotalTables()
    {
        return $this->nbTotalTables;
    }

    /**
     * Set the value of nbTables
     *
     * @return  self
     */ 
    public function setNbTotalTables($nbTotalTables)
    {
        $this->nbTotalTables = $nbTotalTables;

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
   
}
