<?php

namespace App\Entity;

use App\Repository\LieuxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LieuxRepository::class)]
class Lieux
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $lieu_nom = null;

    #[ORM\Column(nullable: true)]
    private ?int $lieu_capacite = null;

    #[ORM\Column(length: 60, nullable: true)]
    private ?string $lieu_adr_rue = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $lieu_adr_num = null;

    #[ORM\OneToMany(mappedBy: 'manif_lieu', targetEntity: Manifestation::class)]
    private Collection $manifestations;

    public function __construct()
    {
        $this->manifestations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLieuNom(): ?string
    {
        return $this->lieu_nom;
    }

    public function __toString(): string
    {
        return $this->lieu_nom;
    }

    public function setLieuNom(?string $lieu_nom): self
    {
        $this->lieu_nom = $lieu_nom;

        return $this;
    }

    public function getLieuCapacite(): ?int
    {
        return $this->lieu_capacite;
    }

    public function setLieuCapacite(?int $lieu_capacite): self
    {
        $this->lieu_capacite = $lieu_capacite;

        return $this;
    }

    public function getLieuAdrRue(): ?string
    {
        return $this->lieu_adr_rue;
    }

    public function setLieuAdrRue(?string $lieu_adr_rue): self
    {
        $this->lieu_adr_rue = $lieu_adr_rue;

        return $this;
    }

    public function getLieuAdrNum(): ?string
    {
        return $this->lieu_adr_num;
    }

    public function setLieuAdrNum(?string $lieu_adr_num): self
    {
        $this->lieu_adr_num = $lieu_adr_num;

        return $this;
    }

    /**
     * @return Collection<int, Manifestation>
     */
    public function getManifestations(): Collection
    {
        return $this->manifestations;
    }

    public function addManifestation(Manifestation $manifestation): self
    {
        if (!$this->manifestations->contains($manifestation)) {
            $this->manifestations->add($manifestation);
            $manifestation->setManifLieu($this);
        }

        return $this;
    }

    public function removeManifestation(Manifestation $manifestation): self
    {
        if ($this->manifestations->removeElement($manifestation)) {
            // set the owning side to null (unless already changed)
            if ($manifestation->getManifLieu() === $this) {
                $manifestation->setManifLieu(null);
            }
        }

        return $this;
    }
}
