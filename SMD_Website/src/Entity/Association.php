<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\AssociationRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: AssociationRepository::class)]
#[UniqueEntity(fields: ['name'], message: 'Le nom doit être unique.')]
class Association
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

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $presentation = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $historical = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, Section>
     */
    #[ORM\OneToMany(mappedBy: 'association', targetEntity: Section::class, orphanRemoval: true)]
    private Collection $sections;

    /**
     * @var Collection<int, NavBarMenu>
     */
    #[ORM\OneToMany(mappedBy: 'association', targetEntity: NavBarMenu::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private $navBarMenus;

    /**
     * @var Collection<int, Article>
     */
    #[ORM\OneToMany(mappedBy: 'association', targetEntity: Article::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $articles;

    /**
     * @var Collection<int, ActivityPlace>
     */
    #[ORM\OneToMany(mappedBy: 'association', targetEntity: ActivityPlace::class)]
    private Collection $activityPlaces;

    /**
     * @var Collection<int, Member>
     */
    #[ORM\OneToMany(mappedBy: 'association', targetEntity: Member::class)]
    private Collection $members;

    /**
     * @var Collection<int, Role>
     */
    #[ORM\OneToMany(mappedBy: 'association', targetEntity: Role::class)]
    private Collection $roles;

    /**
     * @var Collection<int, HistoricalDate>
     */
    #[ORM\OneToMany(mappedBy: 'association', targetEntity: HistoricalDate::class)]
    private Collection $historicalDates;

    /**
     * @var Collection<int, PostChartCategory>
     */
    #[ORM\OneToMany(mappedBy: 'association', targetEntity: PostChartCategory::class)]
    private Collection $postChartCategories;

    /**
     * @var Collection<int, Sponsor>
     */
    #[ORM\OneToMany(mappedBy: 'association', targetEntity: Sponsor::class)]
    private Collection $sponsors;

    /**
     * @var Collection<int, InstitutionalPartner>
     */
    #[ORM\OneToMany(mappedBy: 'association', targetEntity: InstitutionalPartner::class)]
    private Collection $institutionalPartners;

    /**
     * @var Collection<int, StaticPage>
     */
    #[ORM\OneToMany(mappedBy: 'association', targetEntity: StaticPage::class)]
    private Collection $staticPages;

    public function __construct()
    {
        $this->sections = new ArrayCollection();
        $this->navBarMenus = new ArrayCollection();
        $this->articles = new ArrayCollection();
        $this->activityPlaces = new ArrayCollection();
        $this->members = new ArrayCollection();
        $this->roles = new ArrayCollection();
        $this->historicalDates = new ArrayCollection();
        $this->postChartCategories = new ArrayCollection();
        $this->sponsors = new ArrayCollection();
        $this->institutionalPartners = new ArrayCollection();
        $this->staticPages = new ArrayCollection();
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

    public function getPresentation(): ?string
    {
        return $this->presentation;
    }

    public function setPresentation(?string $presentation): static
    {
        $this->presentation = $presentation;

        return $this;
    }

    public function getHistorical(): ?string
    {
        return $this->historical;
    }

    public function setHistorical(?string $historical): static
    {
        $this->historical = $historical;

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
            $section->setAssociation($this);
        }

        return $this;
    }

    public function removeSection(Section $section): static
    {
        // set the owning side to null (unless already changed)
        if ($this->sections->removeElement($section) && $section->getAssociation() === $this) {
            $section->setAssociation(null);
        }

        return $this;
    }

    /**
     * @return Collection<int, NavBarMenu>
     */
    public function getNavBarMenus(): Collection
    {
        return $this->navBarMenus;
    }

    public function addNavBarMenu(NavBarMenu $navBarMenu): static
    {
        if (!$this->navBarMenus->contains($navBarMenu)) {
            $this->navBarMenus->add($navBarMenu);
            $navBarMenu->setAssociation($this);
        }

        return $this;
    }

    public function removeNavBarMenu(NavBarMenu $navBarMenu): static
    {
        // set the owning side to null (unless already changed)
        if ($this->navBarMenus->removeElement($navBarMenu) && $navBarMenu->getAssociation() === $this) {
            $navBarMenu->setAssociation(null);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->name ?? '';
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
            $article->setAssociation($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): static
    {
        // set the owning side to null (unless already changed)
        if ($this->articles->removeElement($article) && $article->getAssociation() === $this) {
            $article->setAssociation(null);
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
            $activityPlace->setAssociation($this);
        }

        return $this;
    }

    public function removeActivityPlace(ActivityPlace $activityPlace): static
    {
        // set the owning side to null (unless already changed)
        if ($this->activityPlaces->removeElement($activityPlace) && $activityPlace->getAssociation() === $this) {
            $activityPlace->setAssociation(null);
        }

        return $this;
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
        if (!$this->members->contains($member)) {
            $this->members->add($member);
            $member->setAssociation($this);
        }

        return $this;
    }

    public function removeMember(Member $member): static
    {
        // set the owning side to null (unless already changed)
        if ($this->members->removeElement($member) && $member->getAssociation() === $this) {
            $member->setAssociation(null);
        }

        return $this;
    }

    /**
     * @return Collection<int, Role>
     */
    public function getRoles(): Collection
    {
        return $this->roles;
    }

    public function addRole(Role $role): static
    {
        if (!$this->roles->contains($role)) {
            $this->roles->add($role);
            $role->setAssociation($this);
        }

        return $this;
    }

    public function removeRole(Role $role): static
    {
        // set the owning side to null (unless already changed)
        if ($this->roles->removeElement($role) && $role->getAssociation() === $this) {
            $role->setAssociation(null);
        }

        return $this;
    }

    /**
     * @return Collection<int, HistoricalDate>
     */
    public function getHistoricalDates(): Collection
    {
        return $this->historicalDates;
    }

    public function addHistoricalDate(HistoricalDate $historicalDate): static
    {
        if (!$this->historicalDates->contains($historicalDate)) {
            $this->historicalDates->add($historicalDate);
            $historicalDate->setAssociation($this);
        }

        return $this;
    }

    public function removeHistoricalDate(HistoricalDate $historicalDate): static
    {
        // set the owning side to null (unless already changed)
        if ($this->historicalDates->removeElement($historicalDate) && $historicalDate->getAssociation() === $this) {
            $historicalDate->setAssociation(null);
        }

        return $this;
    }

    /**
     * @return Collection<int, PostChartCategory>
     */
    public function getPostChartCategories(): Collection
    {
        return $this->postChartCategories;
    }

    public function addPostChartCategory(PostChartCategory $postChartCategory): static
    {
        if (!$this->postChartCategories->contains($postChartCategory)) {
            $this->postChartCategories->add($postChartCategory);
            $postChartCategory->setAssociation($this);
        }

        return $this;
    }

    public function removeOrganizationChart(PostChartCategory $postChartCategory): static
    {
        // set the owning side to null (unless already changed)
        if ($this->postChartCategories->removeElement($postChartCategory) && $postChartCategory->getAssociation() === $this) {
            $postChartCategory->setAssociation(null);
        }

        return $this;
    }

    /**
     * @return Collection<int, Sponsor>
     */
    public function getSponsors(): Collection
    {
        return $this->sponsors;
    }

    public function addSponsor(Sponsor $sponsor): static
    {
        if (!$this->sponsors->contains($sponsor)) {
            $this->sponsors->add($sponsor);
            $sponsor->setAssociation($this);
        }

        return $this;
    }

    public function removeSponsor(Sponsor $sponsor): static
    {
        // set the owning side to null (unless already changed)
        if ($this->sponsors->removeElement($sponsor) && $sponsor->getAssociation() === $this) {
            $sponsor->setAssociation(null);
        }

        return $this;
    }

    /**
     * @return Collection<int, InstitutionalPartner>
     */
    public function getInstitutionalPartners(): Collection
    {
        return $this->institutionalPartners;
    }

    public function addInstitutionalPartner(InstitutionalPartner $institutionalPartner): static
    {
        if (!$this->institutionalPartners->contains($institutionalPartner)) {
            $this->institutionalPartners->add($institutionalPartner);
            $institutionalPartner->setAssociation($this);
        }

        return $this;
    }

    public function removeInstitutionalPartner(InstitutionalPartner $institutionalPartner): static
    {
        // set the owning side to null (unless already changed)
        if ($this->institutionalPartners->removeElement($institutionalPartner) && $institutionalPartner->getAssociation() === $this) {
            $institutionalPartner->setAssociation(null);
        }

        return $this;
    }

    /**
     * @return Collection<int, StaticPage>
     */
    public function getStaticPages(): Collection
    {
        return $this->staticPages;
    }

    public function addStaticPage(StaticPage $staticPage): static
    {
        if (!$this->staticPages->contains($staticPage)) {
            $this->staticPages->add($staticPage);
            $staticPage->setAssociation($this);
        }

        return $this;
    }

    public function removeStaticPage(StaticPage $staticPage): static
    {
        // set the owning side to null (unless already changed)
        if ($this->staticPages->removeElement($staticPage) && $staticPage->getAssociation() === $this) {
            $staticPage->setAssociation(null);
        }

        return $this;
    }
}
