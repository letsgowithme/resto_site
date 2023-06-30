<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    
    #[ORM\Column]
    private ?string $fullName = null;

    #[ORM\Column]
    private ?int $nbPeople = null;

    #[ORM\Column]
    private ?int $nbChildren = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToMany(targetEntity: Allergy::class)]
    private Collection $allergies;

    #[ORM\Column(nullable: true)]
    private ?string $lunchTime = null;

    #[ORM\Column(nullable: true)]
    private ?string $dinnerTime = null;

    // #[ORM\ManyToOne]
    // #[ORM\JoinColumn(nullable: true)]
    // private ?Schedule $schedule = null;

    #[ORM\ManyToOne]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Restaurant $restaurant = null;


    public function __construct()
    {
        $this->allergies = new ArrayCollection();
        $this->date = new \DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbPeople(): ?int
    {
        return $this->nbPeople;
    }

    public function setNbPeople(int $nbPeople): self
    {
        $this->nbPeople = $nbPeople;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;
        // $day = $date->format('d');
        // $month = $date->format('m');
        // $date = $day.' '.$month;

        return $this;
    }

    /**
     * @return Collection<int, Allergy>
     */
    public function getAllergies(): Collection
    {
        return $this->allergies;
    }

    public function addAllergy(Allergy $allergy): self
    {
        if (!$this->allergies->contains($allergy)) {
            $this->allergies->add($allergy);
        }

        return $this;
    }

    public function removeAllergy(Allergy $allergy): self
    {
        $this->allergies->removeElement($allergy);

        return $this;
    }


    // public function getSchedule(): ?Schedule
    // {
    //     return $this->schedule;
    // }

    // public function setSchedule(?Schedule $schedule): self
    // {
    //     $this->schedule = $schedule;

    //     return $this;
    // }

    


    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

   
    /**
     * Get the value of fullName
     */ 
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set the value of fullName
     *
     * @return  self
     */ 
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get the value of nbChildren
     */ 
    public function getNbChildren()
    {
        return $this->nbChildren;
    }

    /**
     * Set the value of nbChildren
     *
     * @return  self
     */ 
    public function setNbChildren($nbChildren)
    {
        $this->nbChildren = $nbChildren;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

   

    /**
     * Get the value of lunchTime
     */ 
    public function getLunchTime()
    {
        return $this->lunchTime;
    }

    /**
     * Set the value of lunchTime
     *
     * @return  self
     */ 
    public function setLunchTime($lunchTime)
    {
        $this->lunchTime = $lunchTime;

        return $this;
    }

    /**
     * Get the value of dinnerTime
     */ 
    public function getDinnerTime()
    {
        return $this->dinnerTime;
    }

    /**
     * Set the value of dinnerTime
     *
     * @return  self
     */ 
    public function setDinnerTime($dinnerTime)
    {
        $this->dinnerTime = $dinnerTime;

        return $this;
    }
}
