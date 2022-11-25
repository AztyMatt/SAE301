<?php

namespace App\Entity;

use App\Repository\SalleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SalleRepository::class)]
class Salle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $salle_nom = null;

    #[ORM\Column]
    private ?int $salle_capacite = null;

    #[ORM\Column(length: 200)]
    private ?string $salle_adresse = null;

    #[ORM\Column(length: 50)]
    private ?string $salle_image = null;

    #[ORM\OneToMany(mappedBy: 'salle', targetEntity: Manifestation::class)]
    private Collection $manifestations;

    public function __construct()
    {
        $this->manifestations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSalleNom(): ?string
    {
        return $this->salle_nom;
    }

    public function setSalleNom(string $salle_nom): self
    {
        $this->salle_nom = $salle_nom;

        return $this;
    }

    public function getSalleCapacite(): ?int
    {
        return $this->salle_capacite;
    }

    public function setSalleCapacite(int $salle_capacite): self
    {
        $this->salle_capacite = $salle_capacite;

        return $this;
    }

    public function getSalleAdresse(): ?string
    {
        return $this->salle_adresse;
    }

    public function setSalleAdresse(string $salle_adresse): self
    {
        $this->salle_adresse = $salle_adresse;

        return $this;
    }

    public function getSalleImage(): ?string
    {
        return $this->salle_image;
    }

    public function setSalleImage(string $salle_image): self
    {
        $this->salle_image = $salle_image;

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
            $manifestation->setSalle($this);
        }

        return $this;
    }

    public function removeManifestation(Manifestation $manifestation): self
    {
        if ($this->manifestations->removeElement($manifestation)) {
            // set the owning side to null (unless already changed)
            if ($manifestation->getSalle() === $this) {
                $manifestation->setSalle(null);
            }
        }

        return $this;
    }
}
