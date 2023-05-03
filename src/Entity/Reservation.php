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

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToMany(targetEntity: Allergy::class)]
    private Collection $allergies;


    #[ORM\ManyToOne]
    private ?Table $table = null;


    #[ORM\ManyToOne]
    private ?DaySlot $dayslot = null;

    #[ORM\ManyToOne]
    private ?EveningSlot $eveningSlot = null;

    #[ORM\ManyToOne]
    private ?User $user = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $time = null;


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


    public function getDayslot(): ?DaySlot
    {
        return $this->dayslot;
    }

    public function setDayslot(?DaySlot $dayslot): self
    {
        $this->dayslot = $dayslot;

        return $this;
    }

    public function getEveningSlot(): ?EveningSlot
    {
        return $this->eveningSlot;
    }

    public function setEveningSlot(?EveningSlot $eveningSlot): self
    {
        $this->eveningSlot = $eveningSlot;

        return $this;
    }
    public function getTable(): ?Table
    {
        return $this->table;
    }

    public function setTable(?Table $table): self
    {
        $this->table = $table;

        return $this;
    }


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
}
