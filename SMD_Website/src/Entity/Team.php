<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $scoreNCoCode = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'teams', cascade: ['persist'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?TeamCategory $teamCategory = null;

    #[ORM\ManyToMany(targetEntity: Training::class, inversedBy: 'teams')]
    private Collection $trainings;

    #[ORM\ManyToMany(targetEntity: Post::class, mappedBy: 'teams')]
    private Collection $posts;

    public function __construct()
    {
        $this->trainings = new ArrayCollection();
        $this->posts = new ArrayCollection();
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

    public function getScoreNCoCode(): ?string
    {
        return $this->scoreNCoCode;
    }

    public function setScoreNCoCode(?string $scoreNCoCode): static
    {
        $this->scoreNCoCode = $scoreNCoCode;

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

    public function getTeamCategory(): ?TeamCategory
    {
        return $this->teamCategory;
    }

    public function setTeamCategory(?TeamCategory $teamCategory): static
    {
        $this->teamCategory = $teamCategory;

        return $this;
    }

    /**
     * @return Collection<int, Training>
     */
    public function getTrainings(): Collection
    {
        return $this->trainings;
    }

    public function addTraining(Training $training): static
    {
        if (! $this->trainings->contains($training)) {
            $this->trainings->add($training);
        }

        return $this;
    }

    public function removeTraining(Training $training): static
    {
        $this->trainings->removeElement($training);

        return $this;
    }

    /**
     * @return Collection<int, Post>
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    public function addPost(Post $post): static
    {
        if (! $this->posts->contains($post)) {
            $this->posts->add($post);
            $post->addTeam($this);
        }

        return $this;
    }

    public function removePost(Post $post): static
    {
        if ($this->posts->removeElement($post)) {
            $post->removeTeam($this);
        }

        return $this;
    }
}
