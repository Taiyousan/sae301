<?php

namespace App\Entity;

use App\Repository\ManifestationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ManifestationRepository::class)]
class Manifestation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $manif_titre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $manif_desc = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $manif_casting = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $manif_genre = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $manif_affiche = null;

    #[ORM\Column(length: 5, nullable: true)]
    private ?string $manif_horaire = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $manif_date = null;

    #[ORM\Column(nullable: true)]
    private ?int $manif_prix = null;

    #[ORM\ManyToOne(inversedBy: 'manifestations')]
    private ?Lieux $manif_lieu = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getManifTitre(): ?string
    {
        return $this->manif_titre;
    }

    public function setManifTitre(?string $manif_titre): self
    {
        $this->manif_titre = $manif_titre;

        return $this;
    }

    public function getManifDesc(): ?string
    {
        return $this->manif_desc;
    }

    public function setManifDesc(?string $manif_desc): self
    {
        $this->manif_desc = $manif_desc;

        return $this;
    }

    public function getManifCasting(): ?string
    {
        return $this->manif_casting;
    }

    public function setManifCasting(?string $manif_casting): self
    {
        $this->manif_casting = $manif_casting;

        return $this;
    }

    public function getManifGenre(): ?string
    {
        return $this->manif_genre;
    }

    public function setManifGenre(?string $manif_genre): self
    {
        $this->manif_genre = $manif_genre;

        return $this;
    }

    public function getManifAffiche(): ?string
    {
        return $this->manif_affiche;
    }

    public function setManifAffiche(?string $manif_affiche): self
    {
        $this->manif_affiche = $manif_affiche;

        return $this;
    }

    public function getManifHoraire(): ?string
    {
        return $this->manif_horaire;
    }

    public function setManifHoraire(?string $manif_horaire): self
    {
        $this->manif_horaire = $manif_horaire;

        return $this;
    }

    public function getManifDate(): ?string
    {
        return $this->manif_date;
    }

    public function setManifDate(?string $manif_date): self
    {
        $this->manif_date = $manif_date;

        return $this;
    }

    public function getManifPrix(): ?int
    {
        return $this->manif_prix;
    }

    public function setManifPrix(?int $manif_prix): self
    {
        $this->manif_prix = $manif_prix;

        return $this;
    }

    public function getManifLieu(): ?Lieux
    {
        return $this->manif_lieu;
    }

    public function setManifLieu(?Lieux $manif_lieu): self
    {
        $this->manif_lieu = $manif_lieu;

        return $this;
    }
}
