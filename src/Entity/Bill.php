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
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     */
    private $leadsCount;

    /**
     * @ORM\Column(type="float")
     */
    private $leadPrice;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $paymentDate;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLeadsCount(): ?int
    {
        return $this->leadsCount;
    }

    public function setLeadsCount(int $leadsCount): self
    {
        $this->leadsCount = $leadsCount;

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

    public function getPaymentDate(): ?\DateTimeInterface
    {
        return $this->paymentDate;
    }

    public function setPaymentDate(\DateTimeInterface $paymentDate): self
    {
        $this->paymentDate = $paymentDate;

        return $this;
    }
}
