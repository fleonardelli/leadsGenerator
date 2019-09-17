<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LeadRepository")
 */
class Lead
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Student", inversedBy="leads")
     * @ORM\JoinColumn(nullable=false)
     */
    private $student;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fromPortal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AcademicOffer", inversedBy="leads")
     * @ORM\JoinColumn(nullable=false)
     */
    private $academicOffer;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $gotFromCrm;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sentByEmail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self
    {
        $this->student = $student;

        return $this;
    }

    public function getFromPortal(): ?string
    {
        return $this->fromPortal;
    }

    public function setFromPortal(string $fromPortal): self
    {
        $this->fromPortal = $fromPortal;

        return $this;
    }

    public function getAcademicOffer(): ?AcademicOffer
    {
        return $this->academicOffer;
    }

    public function setAcademicOffer(?AcademicOffer $academicOffer): self
    {
        $this->academicOffer = $academicOffer;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getGotFromCrm(): ?bool
    {
        return $this->gotFromCrm;
    }

    public function setGotFromCrm(bool $gotFromCrm): self
    {
        $this->gotFromCrm = $gotFromCrm;

        return $this;
    }

    public function getSentByEmail(): ?bool
    {
        return $this->sentByEmail;
    }

    public function setSentByEmail(bool $sentByEmail): self
    {
        $this->sentByEmail = $sentByEmail;

        return $this;
    }
}
