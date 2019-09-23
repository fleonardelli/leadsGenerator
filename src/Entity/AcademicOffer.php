<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\MaxDepth;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AcademicOfferRepository")
 */
class AcademicOffer
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TematicArea", inversedBy="academicOffers")
     * @ORM\JoinColumn(nullable=false)
     * @MaxDepth(1)
     */
    private $tematicArea;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\OfferType", inversedBy="academicOffers")
     * @ORM\JoinColumn(nullable=false)
     * @MaxDepth(1)
     */
    private $offerType;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\CourseMode", inversedBy="academicOffers")
     * @MaxDepth(1)
     */
    private $courseMode;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $duration;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $timeTable;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $coursePlace;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Institution", inversedBy="academicOffers")
     * @ORM\JoinColumn(nullable=false)
     * @MaxDepth(2)
     */
    private $institution;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lead", mappedBy="academicOffer")
     */
    private $leads;

    public function __construct()
    {
        $this->courseMode = new ArrayCollection();
        $this->leads = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTematicArea(): ?TematicArea
    {
        return $this->tematicArea;
    }

    public function setTematicArea(?TematicArea $tematicArea): self
    {
        $this->tematicArea = $tematicArea;

        return $this;
    }

    public function getOfferType(): ?OfferType
    {
        return $this->offerType;
    }

    public function setOfferType(?OfferType $offerType): self
    {
        $this->offerType = $offerType;

        return $this;
    }

    /**
     * @return Collection|CourseMode[]
     */
    public function getCourseMode(): Collection
    {
        return $this->courseMode;
    }

    public function addCourseMode(CourseMode $courseMode): self
    {
        if (!$this->courseMode->contains($courseMode)) {
            $this->courseMode[] = $courseMode;
        }

        return $this;
    }

    public function removeCourseMode(CourseMode $courseMode): self
    {
        if ($this->courseMode->contains($courseMode)) {
            $this->courseMode->removeElement($courseMode);
        }

        return $this;
    }

    public function getDuration(): ?float
    {
        return $this->duration;
    }

    public function setDuration(?float $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    public function getTimeTable(): ?string
    {
        return $this->timeTable;
    }

    public function setTimeTable(?string $timeTable): self
    {
        $this->timeTable = $timeTable;

        return $this;
    }

    public function getCoursePlace(): ?string
    {
        return $this->coursePlace;
    }

    public function setCoursePlace(string $coursePlace): self
    {
        $this->coursePlace = $coursePlace;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getInstitution(): ?Institution
    {
        return $this->institution;
    }

    public function setInstitution(?Institution $institution): self
    {
        $this->institution = $institution;

        return $this;
    }

    /**
     * @return Collection|Lead[]
     */
    public function getLeads(): Collection
    {
        return $this->leads;
    }

    public function addLead(Lead $lead): self
    {
        if (!$this->leads->contains($lead)) {
            $this->leads[] = $lead;
            $lead->setAcademicOffer($this);
        }

        return $this;
    }

    public function removeLead(Lead $lead): self
    {
        if ($this->leads->contains($lead)) {
            $this->leads->removeElement($lead);
            // set the owning side to null (unless already changed)
            if ($lead->getAcademicOffer() === $this) {
                $lead->setAcademicOffer(null);
            }
        }

        return $this;
    }
}
