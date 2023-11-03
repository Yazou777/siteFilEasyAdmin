<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $liv_qte_livrer = null;

    #[ORM\ManyToOne(inversedBy: 'livraisons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?BonLivraison $liv_bon = null;

    #[ORM\ManyToOne(inversedBy: 'livraisons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $liv_pro = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLivQteLivrer(): ?int
    {
        return $this->liv_qte_livrer;
    }

    public function setLivQteLivrer(int $liv_qte_livrer): static
    {
        $this->liv_qte_livrer = $liv_qte_livrer;

        return $this;
    }

    public function getLivBon(): ?BonLivraison
    {
        return $this->liv_bon;
    }

    public function setLivBon(?BonLivraison $liv_bon): static
    {
        $this->liv_bon = $liv_bon;

        return $this;
    }

    public function getLivPro(): ?Produit
    {
        return $this->liv_pro;
    }

    public function setLivPro(?Produit $liv_pro): static
    {
        $this->liv_pro = $liv_pro;

        return $this;
    }
}
