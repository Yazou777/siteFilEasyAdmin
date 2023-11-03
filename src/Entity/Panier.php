<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 9, scale: 2)]
    private ?string $pan_prix_unite = null;

    #[ORM\Column]
    private ?int $pan_quantite = null;

    #[ORM\ManyToOne(inversedBy: 'paniers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $pan_com = null;

    #[ORM\ManyToOne(inversedBy: 'paniers')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $pan_pro = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 9, scale: 2, nullable: true)]
    private ?string $pan_reduction = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPanPrixUnite(): ?string
    {
        return $this->pan_prix_unite;
    }

    public function setPanPrixUnite(string $pan_prix_unite): static
    {
        $this->pan_prix_unite = $pan_prix_unite;

        return $this;
    }

    public function getPanQuantite(): ?int
    {
        return $this->pan_quantite;
    }

    public function setPanQuantite(int $pan_quantite): static
    {
        $this->pan_quantite = $pan_quantite;

        return $this;
    }

    public function getPanCom(): ?Commande
    {
        return $this->pan_com;
    }

    public function setPanCom(?Commande $pan_com): static
    {
        $this->pan_com = $pan_com;

        return $this;
    }

    public function getPanPro(): ?Produit
    {
        return $this->pan_pro;
    }

    public function setPanPro(?Produit $pan_pro): static
    {
        $this->pan_pro = $pan_pro;

        return $this;
    }

    public function getPanReduction(): ?string
    {
        return $this->pan_reduction;
    }

    public function setPanReduction(?string $pan_reduction): static
    {
        $this->pan_reduction = $pan_reduction;

        return $this;
    }
}
