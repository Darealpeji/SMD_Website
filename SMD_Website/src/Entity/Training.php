<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\TrainingRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: TrainingRepository::class)]
class Training
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Assert\Choice(choices: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'])]
    private ?string $day = null;

    #[ORM\Column(type: 'datetime')]
    private ?DateTimeInterface $startTimeSlot = null;

    #[ORM\Column(type: 'datetime')]
    private ?DateTimeInterface $endTimeSlot = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'trainings')]
    private ?ActivityPlace $activityPlace = null;

    #[ORM\ManyToMany(targetEntity: Team::class, mappedBy: 'trainings')]
    private Collection $teams;

    #[ORM\ManyToMany(targetEntity: ActivityClass::class, mappedBy: 'trainings')]
    private Collection $activityClasses;

    public function __construct()
    {
        $this->teams = new ArrayCollection();
        $this->activityClasses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): static
    {
        $this->day = $day;

        return $this;
    }

    public function getStartTimeSlot(): ?DateTimeInterface
    {
        return $this->startTimeSlot;
    }

    public function setStartTimeSlot(DateTimeInterface $startTimeSlot): static
    {
        $this->startTimeSlot = $startTimeSlot;

        return $this;
    }

    public function getEndTimeSlot(): ?DateTimeInterface
    {
        return $this->endTimeSlot;
    }

    public function setEndTimeSlot(DateTimeInterface $endTimeSlot): static
    {
        $this->endTimeSlot = $endTimeSlot;

        return $this;
    }

    private function formatTimeToString(DateTimeInterface $dateTime): ?string
    {
        if (!$dateTime) {
            return null;
        }

        return $dateTime->format('H:i');
    }

    public function getFormattedStartTimeSlotWithDay(): ?string
    {
        return $this->formatTimeToString($this->startTimeSlot, true);
    }

    public function getFormattedEndTimeSlotWithDay(): ?string
    {
        return $this->formatTimeToString($this->endTimeSlot, true);
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    #[ORM\PrePersist]
    #[ORM\PreUpdate]
    public function setUpdatedAtValue(): void
    {
        $this->updatedAt = new \DateTimeImmutable();
    }

    public function __toString()
    {
        return $this->name;
    }

    public function getActivityPlace(): ?ActivityPlace
    {
        return $this->activityPlace;
    }

    public function setActivityPlace(?ActivityPlace $activityPlace): static
    {
        $this->activityPlace = $activityPlace;

        return $this;
    }

    /**
     * @return Collection<int, Team>
     */
    public function getTeams(): Collection
    {
        return $this->teams;
    }

    public function addTeam(Team $team): static
    {
        if (!$this->teams->contains($team)) {
            $this->teams->add($team);
            $team->addTraining($this);
        }

        return $this;
    }

    public function removeTeam(Team $team): static
    {
        if ($this->teams->removeElement($team)) {
            $team->removeTraining($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, ActivityClass>
     */
    public function getActivityClasses(): Collection
    {
        return $this->activityClasses;
    }

    public function addActivityClass(ActivityClass $activityClass): static
    {
        if (!$this->activityClasses->contains($activityClass)) {
            $this->activityClasses->add($activityClass);
            $activityClass->addTraining($this);
        }

        return $this;
    }

    public function removeActivityClass(ActivityClass $activityClass): static
    {
        if ($this->activityClasses->removeElement($activityClass)) {
            $activityClass->removeTraining($this);
        }

        return $this;
    }
}
