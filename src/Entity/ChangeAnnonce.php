<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChangeAnnonceRepository")
 */
class ChangeAnnonce
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * @Assert\Positive(message="Veuillez indiquer un chiffre superieur à zéro")
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

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="changeAnnonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

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

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }
}
