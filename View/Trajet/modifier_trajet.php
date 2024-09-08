<?php
include '../../Controller/TrajetController.php';

// Get the trajet ID from the query string
$id = $_GET['id'] ?? '';

// Create an instance of the controller
$trajetC = new TrajetController();
$trajet = $trajetC->recupererTrajetParId($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get POST data
    $point_depart = $_POST['point_depart'] ?? '';
    $point_arrivee = $_POST['point_arrivee'] ?? '';
    $date_depart = $_POST['date_depart'] ?? '';
    $date_arrivee = $_POST['date_arrivee'] ?? '';
    $prix = $_POST['prix'] ?? '';
    $conducteur_id = $_POST['conducteur_id'] ?? '';

    if (!empty($point_depart) && !empty($point_arrivee) && !empty($date_depart) && !empty($date_arrivee) && !empty($prix) && !empty($conducteur_id)) {
        // Create a new Trajet object
        $trajet = new Trajet(
            $id, // ID remains the same
            $point_depart,
            $point_arrivee,
            $date_depart,
            $date_arrivee,
            $prix,
            $conducteur_id
        );
        
        // Update the trajet using the controller's method
        $trajetC->mettreAJourTrajet($trajet, $id);
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
    <title>Modifier Trajet</title>
</head>
<body>
    <h1>Modifier Trajet</h1>
    <div id="error"><?php echo $error; ?></div>
    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td><label for="point_depart">Point de départ:</label></td>
                <td><input type="text" name="point_depart" id="point_depart" value="<?php echo htmlspecialchars($trajet['point_depart']); ?>" maxlength="100"></td>
            </tr>
            <tr>
                <td><label for="point_arrivee">Point d'arrivée:</label></td>
                <td><input type="text" name="point_arrivee" id="point_arrivee" value="<?php echo htmlspecialchars($trajet['point_arrivee']); ?>" maxlength="100"></td>
            </tr>
            <tr>
                <td><label for="date_depart">Date de départ:</label></td>
                <td><input type="date" name="date_depart" id="date_depart" value="<?php echo htmlspecialchars($trajet['date_depart']); ?>"></td>
            </tr>
            <tr>
                <td><label for="date_arrivee">Date d'arrivée:</label></td>
                <td><input type="date" name="date_arrivee" id="date_arrivee" value="<?php echo htmlspecialchars($trajet['date_arrivee']); ?>"></td>
            </tr>
            <tr>
                <td><label for="prix">Prix:</label></td>
                <td><input type="number" name="prix" id="prix" value="<?php echo htmlspecialchars($trajet['prix']); ?>" step="0.01"></td>
            </tr>
            <tr>
                <td><label for="conducteur_id">Conducteur ID:</label></td>
                <td><input type="number" name="conducteur_id" id="conducteur_id" value="<?php echo htmlspecialchars($trajet['conducteur_id']); ?>"></td>
            </tr>
            <tr align="center">
                <td><input type="submit" value="Enregistrer"></td>
                <td><input type="reset" value="Réinitialiser"></td>
            </tr>
        </table>
    </form>
</body>
</html>
