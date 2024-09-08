<?php
class Utilisateur
{
    public ?int $id_utilisateur;
    public string $nom;
    public string $prenom; // Ajouté, manquant dans le constructeur
    public string $email;
    public string $mot_de_passe;
    public string $type_utilisateur;
    public string $date_creation;

    public function __construct($id = null, $nom, $prenom, $email, $mot_de_passe, $type_utilisateur, $date_creation)
    {
        $this->id_utilisateur = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
        $this->type_utilisateur = $type_utilisateur;
        $this->date_creation = $date_creation;
    }

    // Getters and setters
    public function getId_utilisateur() { return $this->id_utilisateur; }
    public function getNom() { return $this->nom; }
    public function getPrenom() { return $this->prenom; }
    public function getEmail() { return $this->email; }
    public function getMot_de_passe() { return $this->mot_de_passe; }
    public function gettype_utilisateur() { return $this->type_utilisateur; }
    public function getDate_creation() { return $this->date_creation; }

    public function setNom($nom) { $this->nom = $nom; return $this; }
    public function setPrenom($prenom) { $this->prenom = $prenom; return $this; }
    public function setEmail($email) { $this->email = $email; return $this; }
    public function setMot_de_passe($mot_de_passe) { $this->mot_de_passe = $mot_de_passe; return $this; }
    public function settype_utilisateur($type_utilisateur) { $this->type_utilisateur = $type_utilisateur; return $this; }
    public function setDate_creation($date_creation) { $this->date_creation = $date_creation; return $this; }
}
?>
