<?php

namespace App\Entity;

use App\Repository\TransporteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransporteurRepository::class)]
class Transporteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $tra_nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $tra_description = null;

    #[ORM\Column]
    private ?float $tra_prix = null;

    #[ORM\OneToMany(mappedBy: 'com_transporteur', targetEntity: Commande::class)]
    private Collection $commandes;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->tra_nom . '[-br]' .
            $this->tra_description. ' pour'.'[-br]' .
            $this->tra_prix . '€';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTraNom(): ?string
    {
        return $this->tra_nom;
    }

    public function setTraNom(string $tra_nom): static
    {
        $this->tra_nom = $tra_nom;

        return $this;
    }

    public function getTraDescription(): ?string
    {
        return $this->tra_description;
    }

    public function setTraDescription(string $tra_description): static
    {
        $this->tra_description = $tra_description;

        return $this;
    }

    public function getTraPrix(): ?float
    {
        return $this->tra_prix;
    }

    public function setTraPrix(float $tra_prix): static
    {
        $this->tra_prix = $tra_prix;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setComTransporteur($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getComTransporteur() === $this) {
                $commande->setComTransporteur(null);
            }
        }

        return $this;
    }
}
