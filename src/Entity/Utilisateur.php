<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'utilisateurs')]
    private ?self $uti_commercial = null;

    #[ORM\OneToMany(mappedBy: 'uti_commercial', targetEntity: self::class)]
    private Collection $utilisateurs;

    #[ORM\OneToMany(mappedBy: 'com_uti', targetEntity: Commande::class)]
    private Collection $commandes;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $uti_rue = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $uti_ville = null;

    #[ORM\Column(length: 255)]
    private ?string $uti_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $uti_prenom = null;

    #[ORM\Column(length: 10)]
    private ?string $uti_telephone = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $uti_code_postal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $uti_pays = null;

    #[ORM\OneToMany(mappedBy: 'adr_uti', targetEntity: Adresse::class)]
    private Collection $adresses;

    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->commandes = new ArrayCollection();
        $this->adresses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */

    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        //$this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->password = $password;
        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUtiCommercial(): ?self
    {
        return $this->uti_commercial;
    }

    public function setUtiCommercial(?self $uti_commercial): static
    {
        $this->uti_commercial = $uti_commercial;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(self $utilisateur): static
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->setUtiCommercial($this);
        }

        return $this;
    }

    public function removeUtilisateur(self $utilisateur): static
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getUtiCommercial() === $this) {
                $utilisateur->setUtiCommercial(null);
            }
        }

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
            $commande->setComUti($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getComUti() === $this) {
                $commande->setComUti(null);
            }
        }

        return $this;
    }

    public function getUtiRue(): ?string
    {
        return $this->uti_rue;
    }

    public function setUtiRue(string $uti_rue): static
    {
        $this->uti_rue = $uti_rue;

        return $this;
    }

    public function getUtiVille(): ?string
    {
        return $this->uti_ville;
    }

    public function setUtiVille(string $uti_ville): static
    {
        $this->uti_ville = $uti_ville;

        return $this;
    }

    public function getUtiNom(): ?string
    {
        return $this->uti_nom;
    }

    public function setUtiNom(string $uti_nom): static
    {
        $this->uti_nom = $uti_nom;

        return $this;
    }

    public function getUtiPrenom(): ?string
    {
        return $this->uti_prenom;
    }

    public function setUtiPrenom(string $uti_prenom): static
    {
        $this->uti_prenom = $uti_prenom;

        return $this;
    }

    public function getUtiTelephone(): ?string
    {
        return $this->uti_telephone;
    }

    public function setUtiTelephone(string $uti_telephone): static
    {
        $this->uti_telephone = $uti_telephone;

        return $this;
    }

    public function getUtiCodePostal(): ?string
    {
        return $this->uti_code_postal;
    }

    public function setUtiCodePostal(string $uti_code_postal): static
    {
        $this->uti_code_postal = $uti_code_postal;

        return $this;
    }

    public function getUtiPays(): ?string
    {
        return $this->uti_pays;
    }

    public function setUtiPays(string $uti_pays): static
    {
        $this->uti_pays = $uti_pays;

        return $this;
    }

    /**
     * @return Collection<int, Adresse>
     */
    public function getAdresses(): Collection
    {
        return $this->adresses;
    }

    public function addAdress(Adresse $adress): static
    {
        if (!$this->adresses->contains($adress)) {
            $this->adresses->add($adress);
            $adress->setAdrUti($this);
        }

        return $this;
    }

    public function removeAdress(Adresse $adress): static
    {
        if ($this->adresses->removeElement($adress)) {
            // set the owning side to null (unless already changed)
            if ($adress->getAdrUti() === $this) {
                $adress->setAdrUti(null);
            }
        }

        return $this;
    }
    
    
}
