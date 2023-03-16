<?php

namespace App\Entity;

use App\Repository\TableRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: TableRepository::class)]
#[ORM\Table(name: '`table`')]
/**
 * Summary of Table
 */
class Table
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

      /**
     * @var string A "H:i:s" formatted value
     */
    #[Assert\Time]
    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $timeNoon = null;

      /**
     * @var string A "H:i:s" formatted value
     */
    #[Assert\Time]
    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTime $timeEvening = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $allergy = null;

    

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

    public function setDate(\DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

   

    /**
     * Get the value of timeNoon
     */ 
    public function getTimeNoon()
    {
        return $this->timeNoon;
    }

    /**
     * Set the value of timeNoon
     *
     * @return  self
     */ 
    public function setTimeNoon($timeNoon)
    {
        $this->timeNoon = $timeNoon;

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

    public function getAllergy(): ?string
    {
        return $this->allergy;
    }

    public function setAllergy(?string $allergy): self
    {
        $this->allergy = $allergy;

        return $this;
    }
    public function __toString()
    {
        return (string) $this->date;
    }

}
