<?php

namespace App\Entity;

use App\Repository\TimeSlotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimeSlotRepository::class)]
class TimeSlot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lunchTimeStart = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lunchSlot = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lunchTimeEnd = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dinnerTimeStart = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dinnerSlot = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dinnerTimeEnd = null;

    #[ORM\OneToMany(mappedBy: 'timeSlots', targetEntity: Reservation::class)]
    private Collection $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLunchTimeStart(): ?string
    {
        return $this->lunchTimeStart;
    }

    public function setLunchTimeStart(?string $lunchTimeStart): self
    {
        $this->lunchTimeStart = $lunchTimeStart;

        return $this;
    }

    public function getLunchSlot(): ?string
    {
        return $this->lunchSlot;
    }

    public function setLunchSlot(?string $lunchSlot): self
    {
        $this->lunchSlot = $lunchSlot;

        return $this;
    }

    public function getLunchTimeEnd(): ?string
    {
        return $this->lunchTimeEnd;
    }

    public function setLunchTimeEnd(?string $lunchTimeEnd): self
    {
        $this->lunchTimeEnd = $lunchTimeEnd;

        return $this;
    }

    public function getDinnerTimeStart(): ?string
    {
        return $this->dinnerTimeStart;
    }

    public function setDinnerTimeStart(?string $dinnerTimeStart): self
    {
        $this->dinnerTimeStart = $dinnerTimeStart;

        return $this;
    }

    public function getDinnerSlot(): ?string
    {
        return $this->dinnerSlot;
    }

    public function setDinnerSlot(?string $dinnerSlot): self
    {
        $this->dinnerSlot = $dinnerSlot;

        return $this;
    }

    public function getDinnerTimeEnd(): ?string
    {
        return $this->dinnerTimeEnd;
    }

    public function setDinnerTimeEnd(?string $dinnerTimeEnd): self
    {
        $this->dinnerTimeEnd = $dinnerTimeEnd;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setTimeSlots($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getTimeSlots() === $this) {
                $reservation->setTimeSlots(null);
            }
        }

        return $this;
    }
}
