<?php

namespace App\Entity;

use App\Repository\ManifestationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ManifestationRepository::class)]
class Manifestation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $manif_titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $manif_description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $manif_casting = null;

    #[ORM\Column(length: 30)]
    private ?string $manif_genre = null;

    #[ORM\Column]
    private ?int $manif_prix = null;

    #[ORM\Column(length: 50)]
    private ?string $manif_affiche = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $manif_date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $manif_horaire = null;

    #[ORM\ManyToOne(inversedBy: 'manifestations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Salle $salle = null;

    #[ORM\Column]
    private ?int $salle_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getManifTitre(): ?string
    {
        return $this->manif_titre;
    }

    public function setManifTitre(string $manif_titre): self
    {
        $this->manif_titre = $manif_titre;

        return $this;
    }

    public function getManifDescription(): ?string
    {
        return $this->manif_description;
    }

    public function setManifDescription(string $manif_description): self
    {
        $this->manif_description = $manif_description;

        return $this;
    }

    public function getManifCasting(): ?string
    {
        return $this->manif_casting;
    }

    public function setManifCasting(string $manif_casting): self
    {
        $this->manif_casting = $manif_casting;

        return $this;
    }

    public function getManifGenre(): ?string
    {
        return $this->manif_genre;
    }

    public function setManifGenre(string $manif_genre): self
    {
        $this->manif_genre = $manif_genre;

        return $this;
    }

    public function getManifPrix(): ?int
    {
        return $this->manif_prix;
    }

    public function setManifPrix(int $manif_prix): self
    {
        $this->manif_prix = $manif_prix;

        return $this;
    }

    public function getManifAffiche(): ?string
    {
        return $this->manif_affiche;
    }

    public function setManifAffiche(string $manif_affiche): self
    {
        $this->manif_affiche = $manif_affiche;

        return $this;
    }

    public function getManifDate(): ?\DateTimeInterface
    {
        return $this->manif_date;
    }

    public function setManifDate(\DateTimeInterface $manif_date): self
    {
        $this->manif_date = $manif_date;

        return $this;
    }

    public function getManifHoraire(): ?\DateTimeInterface
    {
        return $this->manif_horaire;
    }

    public function setManifHoraire(\DateTimeInterface $manif_horaire): self
    {
        $this->manif_horaire = $manif_horaire;

        return $this;
    }

    public function getSalle(): ?Salle
    {
        return $this->salle;
    }

    public function setSalle(?Salle $salle): self
    {
        $this->salle = $salle;

        return $this;
    }

    public function getSalleId(): ?int
    {
        return $this->salle_id;
    }

    public function setSalleId(int $salle_id): self
    {
        $this->salle_id = $salle_id;

        return $this;
    }
}
