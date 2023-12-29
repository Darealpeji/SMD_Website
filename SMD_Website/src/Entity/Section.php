<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\SectionRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
#[UniqueEntity(fields: ['name'], message: 'Le nom doit être unique.')]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[Assert\NotBlank]
    #[Assert\Length(max: 255)]
    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $motto = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adress = null;

    #[Assert\Regex(
        pattern: '/^\d{5}([A-Z]{2})?$/i',
        message: 'Le code postal doit être composé de cinq chiffres, éventuellement suivis de deux lettres.'
    )]
    #[Assert\Length(
        max: 7,
        maxMessage: 'Le code postal ne doit pas dépasser {{ limit }} caractères.'
    )]
    #[ORM\Column(length: 7, nullable: true)]
    private ?string $postalCode = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    #[Assert\Regex(
        pattern: '/^(0[1-9]|00[1-9]\d)(\d{2}){4}(\d{2})?$/',
        message: 'Le numéro de téléphone doit être au format français.'
    )]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    #[Assert\Email]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mail = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $scoreNCoCode = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToOne(inversedBy: 'sections')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Association $association = null;

    #[ORM\OneToMany(mappedBy: 'section', targetEntity: NavBarLink::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private $navBarLinks;

    #[ORM\OneToMany(mappedBy: 'section', targetEntity: Article::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $articles;

    #[ORM\ManyToMany(targetEntity: ActivityPlace::class, mappedBy: 'sections')]
    private Collection $activityPlaces;

    #[ORM\OneToMany(mappedBy: 'section', targetEntity: TeamCategory::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $teamCategories;

    public function __construct()
    {
        $this->navBarLinks = new ArrayCollection();
        $this->articles = new ArrayCollection();
        $this->activityPlaces = new ArrayCollection();
        $this->teamCategories = new ArrayCollection();
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

    public function getMotto(): ?string
    {
        return $this->motto;
    }

    public function setMotto(?string $motto): static
    {
        $this->motto = $motto;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): static
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): static
    {
        $this->mail = $mail;

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

    public function getAssociation(): ?Association
    {
        return $this->association;
    }

    public function setAssociation(?Association $association): static
    {
        $this->association = $association;

        return $this;
    }

    /**
     * @return Collection<int, NavBarLink>
     */
    public function getNavBarLinks(): Collection
    {
        return $this->navBarLinks;
    }

    public function addNavBarLink(NavBarLink $navBarLink): static
    {
        if (!$this->navBarLinks->contains($navBarLink)) {
            $this->navBarLinks->add($navBarLink);
            $navBarLink->setSection($this);
        }

        return $this;
    }

    public function removeNavBarLink(NavBarLink $navBarLink): static
    {
        if ($this->navBarLinks->removeElement($navBarLink)) {
            // set the owning side to null (unless already changed)
            if ($navBarLink->getSection() === $this) {
                $navBarLink->setSection(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): static
    {
        if (!$this->articles->contains($article)) {
            $this->articles->add($article);
            $article->setSection($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): static
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getSection() === $this) {
                $article->setSection(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ActivityPlace>
     */
    public function getActivityPlaces(): Collection
    {
        return $this->activityPlaces;
    }

    public function addActivityPlace(ActivityPlace $activityPlace): static
    {
        if (!$this->activityPlaces->contains($activityPlace)) {
            $this->activityPlaces->add($activityPlace);
            $activityPlace->addSection($this);
        }

        return $this;
    }

    public function removeActivityPlace(ActivityPlace $activityPlace): static
    {
        if ($this->activityPlaces->removeElement($activityPlace)) {
            $activityPlace->removeSection($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, TeamCategory>
     */
    public function getTeamCategories(): Collection
    {
        return $this->teamCategories;
    }

    public function addTeamCategory(TeamCategory $teamCategory): static
    {
        if (!$this->teamCategories->contains($teamCategory)) {
            $this->teamCategories->add($teamCategory);
            $teamCategory->setSection($this);
        }

        return $this;
    }

    public function removeTeamCategory(TeamCategory $teamCategory): static
    {
        if ($this->teamCategories->removeElement($teamCategory)) {
            // set the owning side to null (unless already changed)
            if ($teamCategory->getSection() === $this) {
                $teamCategory->setSection(null);
            }
        }

        return $this;
    }
}
