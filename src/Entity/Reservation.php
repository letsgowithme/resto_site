<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
// #[ORM\Reservation(name: '`Reservation`')]
/**
 * Summary of Reservation
 */
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nbPeople = null;

    /**
     * @var string A "Y-m-d" formatted value
     */
    #[Assert\Date]
    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date = null;

    #[ORM\Column(nullable: true)]
    private ?string $timeMidday = null;
   
    #[ORM\Column(nullable: true)]
    private ?string $timeEvening = null;
    

    #[ORM\ManyToMany(targetEntity: Allergy::class, inversedBy: 'reservations')]
    private Collection $allergies;

    public function __construct()
    {
        $this->allergies = new ArrayCollection();
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
     * Summary of getDate
     * @return \DateTimeInterface|null
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

   
 
    public function __toString()
    {
        return (string) $this->date;
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
     * Get the value of timeMidday
     */ 
    public function getTimeMidday()
    {
        return $this->timeMidday;
    }

    /**
     * Set the value of timeMidday
     *
     * @return  self
     */ 
    public function setTimeMidday($timeMidday)
    {
        $this->timeMidday = $timeMidday;

        return $this;
    }

    /**
     * Get the value of timeEvening
     */ 
    public function getTimeEvening()
    {
        return $this->timeEvening;
    }

    /**
     * Set the value of timeEvening
     *
     * @return  self
     */ 
    public function setTimeEvening($timeEvening)
    {
        $this->timeEvening = $timeEvening;

        return $this;
    }
}
