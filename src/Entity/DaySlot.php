<?php

namespace App\Entity;

use App\Repository\DaySlotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DaySlotRepository::class)]
class DaySlot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $time = null;

    #[ORM\Column]
    private ?bool $isAvailable = true;

    // #[ORM\ManyToMany(targetEntity: Schedule::class, mappedBy: 'daySlots')]
    // private Collection $schedules;

    // public function __construct()
    // {
    //     $this->schedules = new ArrayCollection();
    // }


    public function getId(): ?int
    {
        return $this->id;
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
    public function isIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): self
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }
    public function __toString()
    {
        return (string) $this->time;
    }

    /**
     * @return Collection<int, Schedule>
     */
    // public function getSchedules(): Collection
    // {
    //     return $this->schedules;
    // }

    // public function addSchedule(Schedule $schedule): self
    // {
    //     if (!$this->schedules->contains($schedule)) {
    //         $this->schedules->add($schedule);
    //         $schedule->addDaySlot($this);
    //     }

    //     return $this;
    // }

    // public function removeSchedule(Schedule $schedule): self
    // {
    //     if ($this->schedules->removeElement($schedule)) {
    //         $schedule->removeDaySlot($this);
    //     }

    //     return $this;
    // }
  

}
