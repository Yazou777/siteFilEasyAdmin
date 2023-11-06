<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;


#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $cat_nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $cat_image = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'cat_parent')]
    private ?self $cat_parent = null;

    #[ORM\OneToMany(mappedBy: 'cat', targetEntity: Produit::class)]
    private Collection $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->cat_nom;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatNom(): ?string
    {
        return $this->cat_nom;
    }

    public function setCatNom(string $cat_nom): static
    {
        $this->cat_nom = $cat_nom;

        return $this;
    }

    public function getCatImage(): ?string
    {
        return $this->cat_image;
    }

    public function setCatImage(?string $cat_image): static
    {
        $this->cat_image = $cat_image;

        return $this;
    }

    public function getCatParent(): ?self
    {
        return $this->cat_parent;
    }

    public function setCatParent(?self $cat_parent): static
    {
        $this->cat_parent = $cat_parent;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setCat($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getCat() === $this) {
                $produit->setCat(null);
            }
        }

        return $this;
    }
}
