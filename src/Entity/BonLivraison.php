<?php

namespace App\Entity;

use App\Repository\BonLivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: BonLivraisonRepository::class)]
class BonLivraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $bon_date_envoie = null;

    #[ORM\ManyToOne(inversedBy: 'bonLivraisons')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $bon_com = null;

    #[ORM\OneToMany(mappedBy: 'liv_bon', targetEntity: Livraison::class)]
    private Collection $livraisons;

    public function __construct()
    {
        $this->bon_date_envoie = new \DateTimeImmutable();
        $this->livraisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBonDateEnvoie(): ?\DateTimeImmutable
    {
        return $this->bon_date_envoie;
    }

    #[ORM\PrePersist]
    public function setBonDateEnvoie(): static
    {
        $this->bon_date_envoie =  new \DateTimeImmutable();

        return $this;
    }

    public function getBonCom(): ?Commande
    {
        return $this->bon_com;
    }

    public function setBonCom(?Commande $bon_com): static
    {
        $this->bon_com = $bon_com;

        return $this;
    }

    /**
     * @return Collection<int, Livraison>
     */
    public function getLivraisons(): Collection
    {
        return $this->livraisons;
    }

    public function addLivraison(Livraison $livraison): static
    {
        if (!$this->livraisons->contains($livraison)) {
            $this->livraisons->add($livraison);
            $livraison->setLivBon($this);
        }

        return $this;
    }

    public function removeLivraison(Livraison $livraison): static
    {
        if ($this->livraisons->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getLivBon() === $this) {
                $livraison->setLivBon(null);
            }
        }

        return $this;
    }
}
