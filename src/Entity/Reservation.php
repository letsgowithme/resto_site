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
    private ?int $nbPeople = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    // #[ORM\Column(type: Types::TIME_MUTABLE)]
    // private ?\DateTimeInterface $timeMidday = null;

    // #[ORM\Column(type: Types::TIME_MUTABLE)]
    // private ?\DateTimeInterface $timeEvening = null;

    #[ORM\ManyToMany(targetEntity: Allergy::class)]
    private Collection $allergies;

    // #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\ManyToMany(targetEntity: DaySlots::class)]
    // #[ORM\JoinColumn(nullable: false)]
    private Collection $daySlots;

    #[ORM\ManyToMany(targetEntity: EveningSlots::class, inversedBy: 'reservations')]
    private Collection $eveningSlots;

    
    public function __construct()
    {
        $this->allergies = new ArrayCollection();
        $this->daySlots = new ArrayCollection();
        $this->date = new \DateTime();
        $this->eveningSlots = new ArrayCollection();
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

    //  /**
    //  * Get the value of timeMidday
    //  */ 
    // public function getTimeMidday()
    // {
    //     return $this->timeMidday;
    // }

    // /**
    //  * Set the value of timeMidday
    //  *
    //  * @return  self
    //  */ 
    // public function setTimeMidday($timeMidday)
    // {
    //     $this->timeMidday = $timeMidday;

    //     return $this;
    // }

    /**
     * Get the value of timeEvening
     */ 
    // public function getTimeEvening()
    // {
    //     return $this->timeEvening;
    // }

    // /**
    //  * Set the value of timeEvening
    //  *
    //  * @return  self
    //  */ 
    // public function setTimeEvening($timeEvening)
    // {
    //     $this->timeEvening = $timeEvening;

    //     return $this;
    // }

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

   

    /**
     * Get the value of daySlots
     */ 
    public function getDaySlots()
    {
        return $this->daySlots;
    }

    /**
     * Set the value of daySlots
     *
     * @return  self
     */ 
    public function setDaySlots($daySlots)
    {
        $this->daySlots = $daySlots;

        return $this;
    }

    /**
     * @return Collection<int, EveningSlots>
     */
    public function getEveningSlots(): Collection
    {
        return $this->eveningSlots;
    }

    public function addEveningSlot(EveningSlots $eveningSlot): self
    {
        if (!$this->eveningSlots->contains($eveningSlot)) {
            $this->eveningSlots->add($eveningSlot);
        }

        return $this;
    }

    public function removeEveningSlot(EveningSlots $eveningSlot): self
    {
        $this->eveningSlots->removeElement($eveningSlot);

        return $this;
    }
}
