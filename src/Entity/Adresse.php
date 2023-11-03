<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'adresses')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $adr_uti = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_rue = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_code_postal = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_ville = null;

    #[ORM\Column(length: 255)]
    private ?string $adr_pays = null;

    public function __toString(): string
    {
        return $this->adr_nom .' '.$this->adr_prenom .'[-br]'.
        $this->adr_rue .'[-br]'.
        $this->adr_code_postal.' '.$this->adr_ville;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdrUti(): ?Utilisateur
    {
        return $this->adr_uti;
    }

    public function setAdrUti(?Utilisateur $adr_uti): static
    {
        $this->adr_uti = $adr_uti;

        return $this;
    }

    public function getAdrNom(): ?string
    {
        return $this->adr_nom;
    }

    public function setAdrNom(string $adr_nom): static
    {
        $this->adr_nom = $adr_nom;

        return $this;
    }

    public function getAdrPrenom(): ?string
    {
        return $this->adr_prenom;
    }

    public function setAdrPrenom(string $adr_prenom): static
    {
        $this->adr_prenom = $adr_prenom;

        return $this;
    }

    public function getAdrRue(): ?string
    {
        return $this->adr_rue;
    }

    public function setAdrRue(string $adr_rue): static
    {
        $this->adr_rue = $adr_rue;

        return $this;
    }

    public function getAdrCodePostal(): ?string
    {
        return $this->adr_code_postal;
    }

    public function setAdrCodePostal(string $adr_code_postal): static
    {
        $this->adr_code_postal = $adr_code_postal;

        return $this;
    }

    public function getAdrTelephone(): ?string
    {
        return $this->adr_telephone;
    }

    public function setAdrTelephone(string $adr_telephone): static
    {
        $this->adr_telephone = $adr_telephone;

        return $this;
    }

    public function getAdrVille(): ?string
    {
        return $this->adr_ville;
    }

    public function setAdrVille(string $adr_ville): static
    {
        $this->adr_ville = $adr_ville;

        return $this;
    }

    public function getAdrPays(): ?string
    {
        return $this->adr_pays;
    }

    public function setAdrPays(string $adr_pays): static
    {
        $this->adr_pays = $adr_pays;

        return $this;
    }
}
