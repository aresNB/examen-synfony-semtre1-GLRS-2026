<?php

namespace App\Entity;

use App\Enum\StatutDemande;
use App\Enum\Prestation;
use App\Enum\Specialite;
use App\Repository\RendezVousRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RendezVousRepository::class)]
class RendezVous
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $dateHeure = null;

    #[ORM\Column(length: 100)]
    private ?string $statut = StatutDemande::EN_ATTENTE->value;

    #[ORM\Column(length: 100)]
    private ?string $prestation = null;

    #[ORM\Column(length: 100)]
    private ?string $specialite = null;

    #[ORM\ManyToOne(inversedBy: 'rendezVouses')]
    private ?Patient $patient = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateHeure(): ?\DateTime
    {
        return $this->dateHeure;
    }

    public function setDateHeure(\DateTime $dateHeure): static
    {
        $this->dateHeure = $dateHeure;

        return $this;
    }

    // Méthodes pour le statut avec Enum
    public function getStatut(): ?StatutDemande
    {
        return $this->statut ? StatutDemande::from($this->statut) : null;
    }

    public function setStatut(StatutDemande $statut): static
    {
        $this->statut = $statut->value;
        return $this;
    }

    // Méthodes pour la prestation avec Enum
    public function getPrestation(): ?Prestation
    {
        return $this->prestation ? Prestation::from($this->prestation) : null;
    }

    public function setPrestation(Prestation $prestation): static
    {
        $this->prestation = $prestation->value;
        return $this;
    }

    // Méthodes pour la spécialité avec Enum
    public function getSpecialite(): ?Specialite
    {
        return $this->specialite ? Specialite::from($this->specialite) : null;
    }

    public function setSpecialite(Specialite $specialite): static
    {
        $this->specialite = $specialite->value;
        return $this;
    }

    public function getPatient(): ?Patient
    {
        return $this->patient;
    }

    public function setPatient(?Patient $patient): static
    {
        $this->patient = $patient;
        return $this;
    }
}
