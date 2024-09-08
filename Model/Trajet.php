<?php
class Trajet
{
    // Attributs privés
    private ?int $trajet_id;
    private string $point_depart;
    private string $point_arrivee;
    private string $date_depart;
    private string $date_arrivee;
    private float $prix;
    private int $conducteur_id;

    // Constructeur
    public function __construct(
        ?int $trajet_id = null,
        string $point_depart = '',
        string $point_arrivee = '',
        string $date_depart = '',
        string $date_arrivee = '',
        float $prix = 0.0,
        int $conducteur_id = 0
    ) {
        $this->trajet_id = $trajet_id;
        $this->point_depart = $point_depart;
        $this->point_arrivee = $point_arrivee;
        $this->date_depart = $date_depart;
        $this->date_arrivee = $date_arrivee;
        $this->prix = $prix;
        $this->conducteur_id = $conducteur_id;
    }

    // Getters
    public function getTrajetId(): int
    {
        return $this->trajet_id;
    }

    public function getPointDepart(): string
    {
        return $this->point_depart;
    }

    public function getPointArrivee(): string
    {
        return $this->point_arrivee;
    }

    public function getDateDepart(): string
    {
        return $this->date_depart;
    }

    public function getDateArrivee(): string
    {
        return $this->date_arrivee;
    }

    public function getPrix(): float
    {
        return $this->prix;
    }

    public function getConducteurId(): int
    {
        return $this->conducteur_id;
    }

    // Setters
    public function setTrajetId(int $trajet_id): void
    {
        $this->trajet_id = $trajet_id;
    }

    public function setPointDepart(string $point_depart): void
    {
        $this->point_depart = $point_depart;
    }

    public function setPointArrivee(string $point_arrivee): void
    {
        $this->point_arrivee = $point_arrivee;
    }

    public function setDateDepart(string $date_depart): void
    {
        $this->date_depart = $date_depart;
    }

    public function setDateArrivee(string $date_arrivee): void
    {
        $this->date_arrivee = $date_arrivee;
    }

    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }

    public function setConducteurId(int $conducteur_id): void
    {
        $this->conducteur_id = $conducteur_id;
    }
}
?>