<?php

namespace App\Entity;

use App\Repository\ActivityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActivityRepository::class)]
class Activity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column]
    private ?bool $competition = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'activities')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Section $section = null;

    /**
     * @var Collection<int, ActivityClass>
     */
    #[ORM\OneToMany(mappedBy: 'activity', targetEntity: ActivityClass::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $activityClasses;

    public function __construct()
    {
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

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function isCompetition(): ?bool
    {
        return $this->competition;
    }

    public function setCompetition(bool $competition): static
    {
        $this->competition = $competition;

        return $this;
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
        return $this->name ?? '';
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): static
    {
        $this->section = $section;

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
            $activityClass->setActivity($this);
        }

        return $this;
    }

    public function removeActivityClass(ActivityClass $activityClass): static
    {
        // set the owning side to null (unless already changed)
        if ($this->activityClasses->removeElement($activityClass) && $activityClass->getActivity() === $this) {
            $activityClass->setActivity(null);
        }

        return $this;
    }
}
