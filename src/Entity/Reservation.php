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

    #[ORM\Column]
    private ?int $nbTables = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToMany(targetEntity: Allergy::class)]
    private Collection $allergies;

    #[ORM\ManyToMany(targetEntity: DaySlot::class)]
    #[ORM\JoinColumn(nullable: true)]
    private Collection $daySlots;

    #[ORM\ManyToMany(targetEntity: EveningSlot::class)]
    #[ORM\JoinColumn(nullable: true)]
    private Collection $eveningSlots;

    #[ORM\ManyToMany(targetEntity: Table::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private Collection $tables;

    
    public function __construct()
    {
        $this->allergies = new ArrayCollection();
        $this->daySlots = new ArrayCollection();
        $this->date = new \DateTime();
        $this->eveningSlots = new ArrayCollection();
        $this->tables = new ArrayCollection();
    
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

   /**
     * @return Collection<int, DaySlot>
     */
    public function getDaySlots(): Collection
    {
        return $this->daySlots;
    }

    public function addDaySlot(DaySlot $daySlot): self
    {
        if (!$this->daySlots->contains($daySlot)) {
            $this->daySlots->add($daySlot);
            // $daySlot->setReservation($this);
        }

        return $this;
    }

    public function removeDaySlot(DaySlot $daySlot): self
    {
        $this->daySlots->removeElement($daySlot);

        return $this;
    }

   

    /**
     * @return Collection<int, EveningSlot>
     */
    public function getEveningSlots(): Collection
    {
        return $this->eveningSlots;
    }

    public function addEveningSlot(EveningSlot $eveningSlot): self
    {
        if (!$this->eveningSlots->contains($eveningSlot)) {
            $this->eveningSlots->add($eveningSlot);
        }

        return $this;
    }

    public function removeEveningSlot(EveningSlot $eveningSlot): self
    {
        $this->eveningSlots->removeElement($eveningSlot);

        return $this;
    }



     /**
     * @return Collection<int, Table>
     */
    public function getTables(): Collection
    {
        return $this->tables;
    }

    public function addTable(Table $table): self
    {
        if (!$this->tables->contains($table)) {
            $this->tables->add($table);
        }

        return $this;
    }

    public function removeTable(Table $table): self
    {
        $this->tables->removeElement($table);

        return $this;
    }


    

}
