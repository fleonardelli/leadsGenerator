<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OfferTypeRepository")
 */
class OfferType
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=120)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\AcademicOffer", mappedBy="offerType")
     */
    private $academicOffers;

    public function __construct()
    {
        $this->academicOffers = new ArrayCollection();
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
            $academicOffer->setOfferType($this);
        }

        return $this;
    }

    public function removeAcademicOffer(AcademicOffer $academicOffer): self
    {
        if ($this->academicOffers->contains($academicOffer)) {
            $this->academicOffers->removeElement($academicOffer);
            // set the owning side to null (unless already changed)
            if ($academicOffer->getOfferType() === $this) {
                $academicOffer->setOfferType(null);
            }
        }

        return $this;
    }
}
