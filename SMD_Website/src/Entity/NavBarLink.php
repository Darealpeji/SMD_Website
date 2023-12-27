<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\NavBarLinkRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: NavBarLinkRepository::class)]
class NavBarLink
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $routeName = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $ranking = null;

    #[ORM\ManyToOne(inversedBy: 'navBarLinks', cascade: ['persist'])]
    private ?Association $association = null;

    #[ORM\ManyToOne(inversedBy: 'navBarLinks', cascade: ['persist'])]
    private ?Section $section = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'navBarLink', targetEntity: NavBarDdLink::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $navBarDdLinks;

    public function __construct()
    {
        $this->navBarDdLinks = new ArrayCollection();
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

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

    public function getRouteName(): ?string
    {
        return $this->routeName;
    }

    public function setRouteName(string $routeName): static
    {
        $this->routeName = $routeName;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    #[ORM\PrePersist]
    public function setCreatedAtValue(): void
    {
        $this->createdAt = new \DateTimeImmutable();
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
     * @return Collection<int, NavBarDdLink>
     */
    public function getNavBarDdLinks(): Collection
    {
        return $this->navBarDdLinks;
    }

    public function addNavBarDdLink(NavBarDdLink $navBarDdLink): static
    {
        if (!$this->navBarDdLinks->contains($navBarDdLink)) {
            $this->navBarDdLinks->add($navBarDdLink);
            $navBarDdLink->setNavBarLink($this);
        }

        return $this;
    }

    public function removeNavBarDdLink(NavBarDdLink $navBarDdLink): static
    {
        if ($this->navBarDdLinks->removeElement($navBarDdLink)) {
            // set the owning side to null (unless already changed)
            if ($navBarDdLink->getNavBarLink() === $this) {
                $navBarDdLink->setNavBarLink(null);
            }
        }

        return $this;
    }
}
