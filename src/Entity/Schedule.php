<?php

namespace App\Entity;

use App\Repository\ScheduleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScheduleRepository::class)]
class Schedule
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $day = null;

    #[ORM\Column(nullable: true)]
    private ?string $openingTimeMidday = null;

    #[ORM\Column(nullable: true)]
    private ?string $closingTimeMidday = null;

    #[ORM\Column(nullable: true)]
    private ?string $openingTimeEvening = null;

    #[ORM\Column(nullable: true)]
    private ?string $closingTimeEvening = null;

    // #[ORM\Column(nullable: true)]
    // private ?array $dayTimes = []; 

    // #[ORM\Column(nullable: true)]
    // private ?array $eveningTimes  = [];

    // #[ORM\ManyToMany(targetEntity: DaySlot::class, inversedBy: 'schedules')]
    // private Collection $daySlots;

    // public function __construct()
    // {
    //     $this->daySlots = new ArrayCollection();
    // } 


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get the value of openingTimeMidday
     */
    public function getOpeningTimeMidday()
    {
        return $this->openingTimeMidday;
    }

    /**
     * Set the value of openingTimeMidday
     *
     * @return  self
     */
    public function setOpeningTimeMidday($openingTimeMidday)
    {
        $this->openingTimeMidday = $openingTimeMidday;

        return $this;
    }

    /**
     * Get the value of closingTimeMidday
     */
    public function getClosingTimeMidday()
    {
        return $this->closingTimeMidday;
    }

    /**
     * Set the value of closingTimeMidday
     *
     * @return  self
     */
    public function setClosingTimeMidday($closingTimeMidday)
    {
        $this->closingTimeMidday = $closingTimeMidday;

        return $this;
    }

    /**
     * Get the value of openingTimeEvening
     */
    public function getopeningTimeEvening()
    {
        return $this->openingTimeEvening;
    }

    /**
     * Set the value of openingTimeEvening
     *
     * @return  self
     */
    public function setOpeningTimeEvening($openingTimeEvening)
    {
        $this->openingTimeEvening = $openingTimeEvening;

        return $this;
    }

    /**
     * Get the value of closingTimeEvening
     */
    public function getClosingTimeEvening()
    {
        return $this->closingTimeEvening;
    }

    /**
     * Set the value of closingTimeEvening
     *
     * @return  self
     */
    public function setclosingTimeEvening($closingTimeEvening)
    {
        $this->closingTimeEvening = $closingTimeEvening;

        return $this;
    }
    public function __toString()
    {
        return (string) $this->day;
        
    }

    // public function getDayTimes(): array
    // {
    //     $dayTimes = $this->dayTimes;
       
    //     $dayTimes[] = $dayTimes;

    //     return array_unique($dayTimes);
    // }

    // public function setDayTimes(array $dayTimes): self
    // {
    //     $this->dayTimes = $dayTimes;

    //     return $this;
    // }


    // public function getEveningTimes(): array
    // {
    //     $eveningTimes = $this->eveningTimes;
     
    //  $eveningTimes[] = $eveningTimes;

    //     return array_unique($eveningTimes);
    // }

    // public function setEveningTimes(array $eveningTimes): self
    // {
    //     $this->eveningTimes = $eveningTimes;

    //     return $this;
    // }

    // /**
    //  * @return Collection<int, DaySlot>
    //  */
    // public function getDaySlots(): Collection
    // {
    //     return $this->daySlots;
    // }

    // public function addDaySlot(DaySlot $daySlot): self
    // {
    //     if (!$this->daySlots->contains($daySlot)) {
    //         $this->daySlots->add($daySlot);
    //     }

    //     return $this;
    // }

    // public function removeDaySlot(DaySlot $daySlot): self
    // {
    //     $this->daySlots->removeElement($daySlot);

    //     return $this;
    // }


   
}
