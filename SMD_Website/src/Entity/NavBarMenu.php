<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\NavBarMenuRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: NavBarMenuRepository::class)]
class NavBarMenu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\Column(length: 255)]
    private ?string $slug = null;

    #[ORM\Column(length: 255)]
    private ?string $routeName = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $ranking = null;

    #[ORM\ManyToOne(inversedBy: 'navBarMenus', cascade: ['persist'])]
    private ?Association $association = null;

    #[ORM\ManyToOne(inversedBy: 'navBarMenus', cascade: ['persist'])]
    private ?Section $section = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\OneToMany(mappedBy: 'navBarMenu', targetEntity: NavBarSubMenu::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $navBarSubMenus;

    public function __construct()
    {
        $this->navBarSubMenus = new ArrayCollection();
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
     * @return Collection<int, NavBarSubMenu>
     */
    public function getNavBarSubMenus(): Collection
    {
        return $this->navBarSubMenus;
    }

    public function addNavBarSubMenu(NavBarSubMenu $navBarSubMenu): static
    {
        if (!$this->navBarSubMenus->contains($navBarSubMenu)) {
            $this->navBarSubMenus->add($navBarSubMenu);
            $navBarSubMenu->setNavBarMenu($this);
        }

        return $this;
    }

    public function removeNavBarSubMenu(NavBarSubMenu $navBarSubMenu): static
    {
        if ($this->navBarSubMenus->removeElement($navBarSubMenu)) {
            // set the owning side to null (unless already changed)
            if ($navBarSubMenu->getNavBarMenu() === $this) {
                $navBarSubMenu->setNavBarMenu(null);
            }
        }

        return $this;
    }
}
