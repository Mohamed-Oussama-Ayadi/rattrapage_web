<?php

include dirname(__FILE__) . '/../connection.php';
include dirname(__FILE__) . '/../Model/Utilisateur.php';

class UtilisateurController
{
    public function authentifierUtilisateur($email, $mot_de_passe)
    {
        $db = Connection::getConnexion();
        $sql = "SELECT * FROM utilisateurs WHERE email = :email";
        
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->execute();
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Check if user exists and verify password
            if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
                return $user;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            die("Erreur lors de l'exécution de la requête: " . $e->getMessage());
        }
    }
    
    public function ajouterUtilisateur($utilisateur)
    {
        $sql = "INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, type_utilisateur, date_creation) 
                VALUES (:nom, :prenom, :email, :mot_de_passe, :type_utilisateur, :date_creation)";
        $db = connection::getConnexion();
    
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':nom', $utilisateur->getNom());
            $req->bindValue(':prenom', $utilisateur->getPrenom());
            $req->bindValue(':email', $utilisateur->getEmail());
            $req->bindValue(':mot_de_passe', password_hash($utilisateur->getMot_de_passe(), PASSWORD_DEFAULT));
            $req->bindValue(':type_utilisateur', $utilisateur->gettype_utilisateur());
            $req->bindValue(':date_creation', $utilisateur->getDate_creation());
            $req->execute();
        } catch (Exception $e) {
            echo 'Erreur SQL : ' . $e->getMessage(); // Ajouté pour afficher l'erreur SQL
        }
    }
    


    public function afficherUtilisateurs()
    {
        $sql = "SELECT * FROM utilisateurs";
        $db = connection::getConnexion();
        try {
            $utilisateurs = $db->query($sql);
            return $utilisateurs;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function supprimerUtilisateur($id)
    {
        $sql = "DELETE FROM utilisateurs WHERE id_utilisateur = :id_utilisateur";
        $db = connection::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id_utilisateur', $id);
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    public function mettreAJourUtilisateur($utilisateur, $id)
    {
        $sql = "UPDATE utilisateurs SET 
                    nom = :nom,
                    prenom = :prenom,
                    email = :email,
                    mot_de_passe = :mot_de_passe,
                    type_utilisateur = :type_utilisateur
                WHERE id_utilisateur = :id_utilisateur";
        $db = connection::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':id_utilisateur', $id);
            $req->bindValue(':nom', $utilisateur->getNom());
            $req->bindValue(':prenom', $utilisateur->getPrenom());
            $req->bindValue(':email', $utilisateur->getEmail());
            $req->bindValue(':mot_de_passe', $utilisateur->getMot_de_passe());
            $req->bindValue(':type_utilisateur', $utilisateur->gettype_utilisateur());
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>
