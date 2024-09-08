<?php
class Reservation {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Ajouter une réservation
    public function create($trajet_id, $passager_id) {
        $sql = "INSERT INTO reservation (trajet_id, passager_id) VALUES (:trajet_id, :passager_id)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['trajet_id' => $trajet_id, 'passager_id' => $passager_id]);
    }

    // Lire toutes les réservations
    public function read() {
        $sql = "SELECT * FROM reservation";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    // Mise à jour de la réservation
    public function update($id, $trajet_id, $passager_id) {
        $sql = "UPDATE reservation SET trajet_id = :trajet_id, passager_id = :passager_id WHERE reservation_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['trajet_id' => $trajet_id, 'passager_id' => $passager_id, 'id' => $id]);
    }

    // Supprimer une réservation
    public function delete($id) {
        $sql = "DELETE FROM reservation WHERE reservation_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    // Vérifier la réservation unique
    public function isUniqueReservation($trajet_id, $passager_id) {
        $sql = "SELECT * FROM reservation WHERE trajet_id = :trajet_id AND passager_id = :passager_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['trajet_id' => $trajet_id, 'passager_id' => $passager_id]);
        return $stmt->rowCount() == 0;
    }
}

