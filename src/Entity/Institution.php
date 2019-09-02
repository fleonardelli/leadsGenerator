<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\InstitutionRepository")
 */
class Institution
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
     * @ORM\Column(type="string", length=120)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=150)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addressÂ;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\InstitutionType", inversedBy="institutions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $institutionType;

    /**
     * @ORM\Column(type="float")
     */
    private $leadPrice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AcademicOffer", mappedBy="institution", orphanRemoval=true)
     */
    private $academicOffers;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Bill", mappedBy="institution")
     */
    private $bills;

    public function __construct()
    {
        $this->academicOffers = new ArrayCollection();
        $this->bills = new ArrayCollection();
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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAddressÂ(): ?string
    {
        return $this->addressÂ;
    }

    public function setAddressÂ(?string $addressÂ): self
    {
        $this->addressÂ = $addressÂ;

        return $this;
    }

    public function getInstitutionType(): ?InstitutionType
    {
        return $this->institutionType;
    }

    public function setInstitutionType(?InstitutionType $institutionType): self
    {
        $this->institutionType = $institutionType;

        return $this;
    }

    public function getLeadPrice(): ?float
    {
        return $this->leadPrice;
    }

    public function setLeadPrice(float $leadPrice): self
    {
        $this->leadPrice = $leadPrice;

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

    /**
     * @return Collection|AcademicOffer[]
     */
    public function getAcademicOffers(): Collection
    {
        return $this->academicOffers;
    }

    public function addAcademicOffer(AcademicOffer $academicOffer): self
    {
        if (!$this->academicOffers->contains($academicOffer)) {
            $this->academicOffers[] = $academicOffer;
            $academicOffer->setInstitution($this);
        }

        return $this;
    }

    public function removeAcademicOffer(AcademicOffer $academicOffer): self
    {
        if ($this->academicOffers->contains($academicOffer)) {
            $this->academicOffers->removeElement($academicOffer);
            // set the owning side to null (unless already changed)
            if ($academicOffer->getInstitution() === $this) {
                $academicOffer->setInstitution(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Bill[]
     */
    public function getBills(): Collection
    {
        return $this->bills;
    }

    public function addBill(Bill $bill): self
    {
        if (!$this->bills->contains($bill)) {
            $this->bills[] = $bill;
            $bill->setInstitution($this);
        }

        return $this;
    }

    public function removeBill(Bill $bill): self
    {
        if ($this->bills->contains($bill)) {
            $this->bills->removeElement($bill);
            // set the owning side to null (unless already changed)
            if ($bill->getInstitution() === $this) {
                $bill->setInstitution(null);
            }
        }

        return $this;
    }
}
