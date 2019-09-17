<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TematicAreaRepository")
 */
class TematicArea
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
     * @ORM\OneToMany(targetEntity="App\Entity\AcademicOffer", mappedBy="tematicArea")
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
            $academicOffer->setTematicArea($this);
        }

        return $this;
    }

    public function removeAcademicOffer(AcademicOffer $academicOffer): self
    {
        if ($this->academicOffers->contains($academicOffer)) {
            $this->academicOffers->removeElement($academicOffer);
            // set the owning side to null (unless already changed)
            if ($academicOffer->getTematicArea() === $this) {
                $academicOffer->setTematicArea(null);
            }
        }

        return $this;
    }
}
