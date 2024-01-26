<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostRepository::class)]
class Post
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $ranking = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $hierarchicalGroup = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToMany(targetEntity: Member::class, inversedBy: 'posts')]
    private Collection $members;

    #[ORM\ManyToMany(targetEntity: Team::class, inversedBy: 'posts')]
    private Collection $teams;

    #[ORM\ManyToMany(targetEntity: ActivityClass::class, inversedBy: 'posts')]
    private Collection $activityClasses;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    private ?PostChartCategory $postChartCategory = null;

    #[ORM\ManyToOne(inversedBy: 'posts')]
    private ?PostTeamCategory $postTeamCategory = null;

    public function __construct()
    {
        $this->members = new ArrayCollection();
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

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getRanking(): ?int
    {
        return $this->ranking;
    }

    public function setRanking(?int $ranking): static
    {
        $this->ranking = $ranking;

        return $this;
    }

    public function getHierarchicalGroup(): ?string
    {
        return $this->hierarchicalGroup;
    }

    public function setHierarchicalGroup(?string $hierarchicalGroup): static
    {
        $this->hierarchicalGroup = $hierarchicalGroup;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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
        return $this->name;
    }

    /**
     * @return Collection<int, Member>
     */
    public function getMembers(): Collection
    {
        return $this->members;
    }

    public function addMember(Member $member): static
    {
        if (! $this->members->contains($member)) {
            $this->members->add($member);
        }

        return $this;
    }

    public function removeMember(Member $member): static
    {
        $this->members->removeElement($member);

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
        if (! $this->teams->contains($team)) {
            $this->teams->add($team);
        }

        return $this;
    }

    public function removeTeam(Team $team): static
    {
        $this->teams->removeElement($team);

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
        if (! $this->activityClasses->contains($activityClass)) {
            $this->activityClasses->add($activityClass);
        }

        return $this;
    }

    public function removeActivityClass(ActivityClass $activityClass): static
    {
        $this->activityClasses->removeElement($activityClass);

        return $this;
    }

    public function getPostChartCategory(): ?PostChartCategory
    {
        return $this->postChartCategory;
    }

    public function setPostChartCategory(?PostChartCategory $postChartCategory): static
    {
        $this->postChartCategory = $postChartCategory;

        return $this;
    }

    public function getPostTeamCategory(): ?PostTeamCategory
    {
        return $this->postTeamCategory;
    }

    public function setPostTeamCategory(?PostTeamCategory $postTeamCategory): static
    {
        $this->postTeamCategory = $postTeamCategory;

        return $this;
    }
}
