<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BillRepository")
 */
class Bill
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Institution", inversedBy="bills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $institution;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $leadsQuantity;

    /**
     * @ORM\Column(type="float")
     */
    private $pricePerLead;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $paymentDate;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getLeadsQuantity(): ?int
    {
        return $this->leadsQuantity;
    }

    public function setLeadsQuantity(int $leadsQuantity): self
    {
        $this->leadsQuantity = $leadsQuantity;

        return $this;
    }

    public function getPricePerLead(): ?float
    {
        return $this->pricePerLead;
    }

    public function setPricePerLead(float $pricePerLead): self
    {
        $this->pricePerLead = $pricePerLead;

        return $this;
    }

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function setPaymentDate(?\DateTimeInterface $paymentDate): self
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }
}
