<?php

namespace App\Entity;

use App\Repository\StaticPageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StaticPageRepository::class)]
class StaticPage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'staticPage', targetEntity: StaticPageContent::class, orphanRemoval: true)]
    private Collection $staticPageContents;

    #[ORM\ManyToOne(inversedBy: 'staticPages')]
    private ?Association $association = null;

    #[ORM\ManyToOne(inversedBy: 'staticPages')]
    private ?Section $section = null;

    public function __construct()
    {
        $this->staticPageContents = new ArrayCollection();
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

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
     * @return Collection<int, StaticPageContent>
     */
    public function getStaticPageContents(): Collection
    {
        return $this->staticPageContents;
    }

    public function addContentStaticPage(StaticPageContent $staticPageContent): static
    {
        if (!$this->staticPageContents->contains($staticPageContent)) {
            $this->staticPageContents->add($staticPageContent);
            $staticPageContent->setStaticPage($this);
        }

        return $this;
    }

    public function removeContentStaticPage(StaticPageContent $staticPageContent): static
    {
        if ($this->staticPageContents->removeElement($staticPageContent)) {
            // set the owning side to null (unless already changed)
            if ($staticPageContent->getStaticPage() === $this) {
                $staticPageContent->setStaticPage(null);
            }
        }

        return $this;
    }

    public function getAssociation(): ?Association
    {
        return $this->association;
    }

    public function setAssociation(?Association $association): static
    {
        $this->association = $association;

        return $this;
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
}
