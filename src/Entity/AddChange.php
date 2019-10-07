<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AddChangeRepository")
 */
class AddChange
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $deviseA;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $deviseB;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDeviseA(): ?string
    {
        return $this->deviseA;
    }

    public function setDeviseA(string $deviseA): self
    {
        $this->deviseA = $deviseA;

        return $this;
    }

    public function getDeviseB(): ?string
    {
        return $this->deviseB;
    }

    public function setDeviseB(string $deviseB): self
    {
        $this->deviseB = $deviseB;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }
}
