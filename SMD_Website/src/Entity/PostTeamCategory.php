<?php

namespace App\Entity;

use App\Repository\PostTeamCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PostTeamCategoryRepository::class)]
class PostTeamCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $labelPlural = null;

    #[ORM\Column(length: 255)]
    private ?string $labelSingular = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, Section>
     */
    #[ORM\ManyToMany(targetEntity: Section::class, inversedBy: 'postTeamCategories')]
    private Collection $sections;

    /**
     * @var Collection<int, Post>
     */
    #[ORM\OneToMany(mappedBy: 'postTeamCategory', targetEntity: Post::class)]
    private Collection $posts;

    public function __construct()
    {
        $this->sections = new ArrayCollection();
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

    public function getLabelPlural(): ?string
    {
        return $this->labelPlural;
    }

    public function setLabelPlural(string $labelPlural): static
    {
        $this->labelPlural = $labelPlural;

        return $this;
    }

    public function getLabelSingular(): ?string
    {
        return $this->labelSingular;
    }

    public function setLabelSingular(string $labelSingular): static
    {
        $this->labelSingular = $labelSingular;

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

    /**
     * @return Collection<int, Section>
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function addSection(Section $section): static
    {
        if (!$this->sections->contains($section)) {
            $this->sections->add($section);
        }

        return $this;
    }

    public function removeSection(Section $section): static
    {
        $this->sections->removeElement($section);

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
        if (!$this->posts->contains($post)) {
            $this->posts->add($post);
            $post->setPostTeamCategory($this);
        }

        return $this;
    }

    public function removePost(Post $post): static
    {
        // set the owning side to null (unless already changed)
        if ($this->posts->removeElement($post) && $post->getPostTeamCategory() === $this) {
            $post->setPostTeamCategory(null);
        }

        return $this;
    }
}
