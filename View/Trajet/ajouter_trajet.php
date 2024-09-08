<?php
session_start();
include '../../Controller/TrajetController.php';

$error = "";

// Vérifiez si l'utilisateur est connecté et qu'il est un conducteur
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] !== 'conducteur') {
    // Redirige vers la page de connexion si l'utilisateur n'est pas connecté ou n'est pas un conducteur
    header('Location: ../utilisateurs/login.php');
    exit();
}

// Create an instance of the controller
$trajetC = new TrajetController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get POST data
    $point_depart = $_POST['point_depart'] ?? '';
    $point_arrivee = $_POST['point_arrivee'] ?? '';
    $date_depart = $_POST['date_depart'] ?? '';
    $date_arrivee = $_POST['date_arrivee'] ?? '';
    $prix = $_POST['prix'] ?? '';

    // Utiliser l'ID de l'utilisateur connecté comme conducteur_id
    $conducteur_id = $_SESSION['user_id'];

    if (!empty($point_depart) && !empty($point_arrivee) && !empty($date_depart) && !empty($date_arrivee) && !empty($prix)) {
        // Create a new Trajet object
        $trajet = new Trajet(
            null, // ID is auto-incremented
            $point_depart,
            $point_arrivee,
            $date_depart,
            $date_arrivee,
            $prix,
            $conducteur_id
        );
        
        // Add the new trajet using the controller's method
        $trajetC->ajouterTrajet($trajet);
        header('Location: affichage_trajets.php');
        exit();
    } else {
        $error = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Trajet</title>
</head>
<body>
    <h1>Ajouter Trajet</h1>
    <div id="error"><?php echo htmlspecialchars($error); ?></div>
    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td><label for="point_depart">Point de départ:</label></td>
                <td><input type="text" name="point_depart" id="point_depart" maxlength="100" required></td>
            </tr>
            <tr>
                <td><label for="point_arrivee">Point d'arrivée:</label></td>
                <td><input type="text" name="point_arrivee" id="point_arrivee" maxlength="100" required></td>
            </tr>
            <tr>
                <td><label for="date_depart">Date de départ:</label></td>
                <td><input type="date" name="date_depart" id="date_depart" required></td>
            </tr>
            <tr>
                <td><label for="date_arrivee">Date d'arrivée:</label></td>
                <td><input type="date" name="date_arrivee" id="date_arrivee" required></td>
            </tr>
            <tr>
                <td><label for="prix">Prix:</label></td>
                <td><input type="number" name="prix" id="prix" step="0.01" required></td>
            </tr>
            <!-- Champ conducteur_id supprimé car l'ID est pris de la session -->
            <tr align="center">
                <td colspan="2">
                    <input type="submit" value="Enregistrer">
                    <input type="reset" value="Réinitialiser">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
