<?php

include dirname(__FILE__) . '/../connection.php';
include dirname(__FILE__) . '/../Model/Trajet.php';

class TrajetController
{
    // Méthode pour ajouter un trajet
    public function ajouterTrajet($trajet)
    {
        $sql = "INSERT INTO trajet (point_depart, point_arrivee, date_depart, date_arrivee, prix, conducteur_id) 
                VALUES (:point_depart, :point_arrivee, :date_depart, :date_arrivee, :prix, :conducteur_id)";
        $db = Connection::getConnexion();
    
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':point_depart', $trajet->getPointDepart());
            $req->bindValue(':point_arrivee', $trajet->getPointArrivee());
            $req->bindValue(':date_depart', $trajet->getDateDepart());
            $req->bindValue(':date_arrivee', $trajet->getDateArrivee());
            $req->bindValue(':prix', $trajet->getPrix());
            $req->bindValue(':conducteur_id', $trajet->getConducteurId());
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur SQL : ' . $e->getMessage(); // Ajouté pour afficher l'erreur SQL
        }
    }

    // Méthode pour afficher tous les trajets
    public function afficherTrajets()
    {
        $sql = "SELECT * FROM trajet";
        $db = Connection::getConnexion();
        try {
            $trajets = $db->query($sql);
            return $trajets;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Méthode pour supprimer un trajet
    public function supprimerTrajet($id)
    {
        $sql = "DELETE FROM trajet WHERE trajet_id = :trajet_id";
        $db = Connection::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':trajet_id', $id);
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Méthode pour mettre à jour un trajet
    public function mettreAJourTrajet($trajet, $id)
    {
        $sql = "UPDATE trajet SET 
                    point_depart = :point_depart,
                    point_arrivee = :point_arrivee,
                    date_depart = :date_depart,
                    date_arrivee = :date_arrivee,
                    prix = :prix,
                    conducteur_id = :conducteur_id
                WHERE trajet_id = :trajet_id";
        $db = Connection::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':trajet_id', $id);
            $req->bindValue(':point_depart', $trajet->getPointDepart());
            $req->bindValue(':point_arrivee', $trajet->getPointArrivee());
            $req->bindValue(':date_depart', $trajet->getDateDepart());
            $req->bindValue(':date_arrivee', $trajet->getDateArrivee());
            $req->bindValue(':prix', $trajet->getPrix());
            $req->bindValue(':conducteur_id', $trajet->getConducteurId());
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Méthode pour récupérer un trajet par ID
    public function recupererTrajetParId($id)
    {
        $sql = "SELECT * FROM trajet WHERE trajet_id = :trajet_id";
        $db = Connection::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':trajet_id', $id);
            $req->execute();
            return $req->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>
