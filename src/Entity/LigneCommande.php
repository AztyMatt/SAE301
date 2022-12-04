<?php

namespace App\Entity;

use App\Repository\LigneCommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LigneCommandeRepository::class)]
class LigneCommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $ligne_commande_nb_place = null;

    #[ORM\ManyToOne(inversedBy: 'ligneCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Manifestation $manifestation = null;

    #[ORM\Column]
    private ?int $manifestation_id = null;

    #[ORM\ManyToOne(inversedBy: 'ligneCommandes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $commande = null;

    #[ORM\Column]
    private ?int $commande_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLigneCommandeNbPlace(): ?int
    {
        return $this->ligne_commande_nb_place;
    }

    public function setLigneCommandeNbPlace(int $ligne_commande_nb_place): self
    {
        $this->ligne_commande_nb_place = $ligne_commande_nb_place;

        return $this;
    }

    public function getManifestation(): ?Manifestation
    {
        return $this->manifestation;
    }

    public function setManifestation(?Manifestation $manifestation): self
    {
        $this->manifestation = $manifestation;

        return $this;
    }

    public function getManifestationId(): ?int
    {
        return $this->manifestation_id;
    }

    public function setManifestationId(int $manifestation_id): self
    {
        $this->manifestation_id = $manifestation_id;

        return $this;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getCommandeId(): ?int
    {
        return $this->commande_id;
    }

    public function setCommandeId(int $commande_id): self
    {
        $this->commande_id = $commande_id;

        return $this;
    }
}
