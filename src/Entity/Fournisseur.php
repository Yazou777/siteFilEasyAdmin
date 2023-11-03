<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $fou_nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fou_prenom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fou_societe_nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fou_rue = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fou_ville = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $fou_code_postal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fou_pays = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $fou_telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fou_email = null;

    #[ORM\OneToMany(mappedBy: 'fou', targetEntity: Vente::class)]
    private Collection $ventes;

    public function __construct()
    {
        $this->ventes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFouNom(): ?string
    {
        return $this->fou_nom;
    }

    public function setFouNom(string $fou_nom): static
    {
        $this->fou_nom = $fou_nom;

        return $this;
    }

    public function getFouPrenom(): ?string
    {
        return $this->fou_prenom;
    }

    public function setFouPrenom(?string $fou_prenom): static
    {
        $this->fou_prenom = $fou_prenom;

        return $this;
    }

    public function getFouSocieteNom(): ?string
    {
        return $this->fou_societe_nom;
    }

    public function setFouSocieteNom(?string $fou_societe_nom): static
    {
        $this->fou_societe_nom = $fou_societe_nom;

        return $this;
    }

    public function getFouRue(): ?string
    {
        return $this->fou_rue;
    }

    public function setFouRue(?string $fou_rue): static
    {
        $this->fou_rue = $fou_rue;

        return $this;
    }

    public function getFouVille(): ?string
    {
        return $this->fou_ville;
    }

    public function setFouVille(?string $fou_ville): static
    {
        $this->fou_ville = $fou_ville;

        return $this;
    }

    public function getFouCodePostal(): ?string
    {
        return $this->fou_code_postal;
    }

    public function setFouCodePostal(?string $fou_code_postal): static
    {
        $this->fou_code_postal = $fou_code_postal;

        return $this;
    }

    public function getFouPays(): ?string
    {
        return $this->fou_pays;
    }

    public function setFouPays(?string $fou_pays): static
    {
        $this->fou_pays = $fou_pays;

        return $this;
    }

    public function getFouTelephone(): ?string
    {
        return $this->fou_telephone;
    }

    public function setFouTelephone(?string $fou_telephone): static
    {
        $this->fou_telephone = $fou_telephone;

        return $this;
    }

    public function getFouEmail(): ?string
    {
        return $this->fou_email;
    }

    public function setFouEmail(?string $fou_email): static
    {
        $this->fou_email = $fou_email;

        return $this;
    }

    /**
     * @return Collection<int, Vente>
     */
    public function getVentes(): Collection
    {
        return $this->ventes;
    }

    public function addVente(Vente $vente): static
    {
        if (!$this->ventes->contains($vente)) {
            $this->ventes->add($vente);
            $vente->setFou($this);
        }

        return $this;
    }

    public function removeVente(Vente $vente): static
    {
        if ($this->ventes->removeElement($vente)) {
            // set the owning side to null (unless already changed)
            if ($vente->getFou() === $this) {
                $vente->setFou(null);
            }
        }

        return $this;
    }
}
