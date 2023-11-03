<?php

namespace App\Entity;

use App\Repository\VenteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VenteRepository::class)]
class Vente
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $ven_delliv = null;

    #[ORM\Column(nullable: true)]
    private ?int $ven_qte1 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 9, scale: 2, nullable: true)]
    private ?string $ven_prix1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $ven_qte2 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 9, scale: 2, nullable: true)]
    private ?string $ven_prix2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $ven_qte3 = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 9, scale: 2, nullable: true)]
    private ?string $ven_prix3 = null;

    #[ORM\ManyToOne(targetEntity: Fournisseur::class ,inversedBy: 'ventes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?fournisseur $fou = null;

    #[ORM\ManyToOne(inversedBy: 'ventes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?produit $pro = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVenDelliv(): ?int
    {
        return $this->ven_delliv;
    }

    public function setVenDelliv(?int $ven_delliv): static
    {
        $this->ven_delliv = $ven_delliv;

        return $this;
    }

    public function getVenQte1(): ?int
    {
        return $this->ven_qte1;
    }

    public function setVenQte1(?int $ven_qte1): static
    {
        $this->ven_qte1 = $ven_qte1;

        return $this;
    }

    public function getVenPrix1(): ?string
    {
        return $this->ven_prix1;
    }

    public function setVenPrix1(?string $ven_prix1): static
    {
        $this->ven_prix1 = $ven_prix1;

        return $this;
    }

    public function getVenQte2(): ?int
    {
        return $this->ven_qte2;
    }

    public function setVenQte2(?int $ven_qte2): static
    {
        $this->ven_qte2 = $ven_qte2;

        return $this;
    }

    public function getVenPrix2(): ?string
    {
        return $this->ven_prix2;
    }

    public function setVenPrix2(?string $ven_prix2): static
    {
        $this->ven_prix2 = $ven_prix2;

        return $this;
    }

    public function getVenQte3(): ?int
    {
        return $this->ven_qte3;
    }

    public function setVenQte3(?int $ven_qte3): static
    {
        $this->ven_qte3 = $ven_qte3;

        return $this;
    }

    public function getVenPrix3(): ?string
    {
        return $this->ven_prix3;
    }

    public function setVenPrix3(?string $ven_prix3): static
    {
        $this->ven_prix3 = $ven_prix3;

        return $this;
    }

    public function getFou(): ?fournisseur
    {
        return $this->fou;
    }

    public function setFou(?fournisseur $fou): static
    {
        $this->fou = $fou;

        return $this;
    }

    public function getPro(): ?produit
    {
        return $this->pro;
    }

    public function setPro(?produit $pro): static
    {
        $this->pro = $pro;

        return $this;
    }
}
