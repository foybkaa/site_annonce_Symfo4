<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * 
 * @UniqueEntity(
 * fields={"email"},
 * message="Cette adresse email est déjà utilisé, merci d'en choisir une autre"
 * )
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez renseigner votre prénom")
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Vous devez renseigner votre nom de famille")
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(message="Veuillez renseigner un email valide !")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hash;

    /**
     * @Assert\EqualTo(propertyPath="hash", message="mot de passe non identique")
     */
    public $passwordConfirm;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ChangeAnnonce", mappedBy="author")
     */
    private $changeAnnonces;

    public function __construct()
    {
        $this->changeAnnonces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

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

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

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

    /**
     * @return Collection|ChangeAnnonce[]
     */
    public function getChangeAnnonces(): Collection
    {
        return $this->changeAnnonces;
    }

    public function addChangeAnnonce(ChangeAnnonce $changeAnnonce): self
    {
        if (!$this->changeAnnonces->contains($changeAnnonce)) {
            $this->changeAnnonces[] = $changeAnnonce;
            $changeAnnonce->setAuthor($this);
        }

        return $this;
    }

    public function removeChangeAnnonce(ChangeAnnonce $changeAnnonce): self
    {
        if ($this->changeAnnonces->contains($changeAnnonce)) {
            $this->changeAnnonces->removeElement($changeAnnonce);
            // set the owning side to null (unless already changed)
            if ($changeAnnonce->getAuthor() === $this) {
                $changeAnnonce->setAuthor(null);
            }
        }

        return $this;
    }

    public function getRoles(){
        return ['ROLE_USER'];
    }

    public function getSalt() {}

    public function getPassword(){
        return $this->hash;
    }

    public function getUsername(){
        return $this->email;
    }
    
    public function eraseCredentials() {}
}
