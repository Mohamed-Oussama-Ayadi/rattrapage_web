<?php
include '../../Controller/TrajetController.php';

// Create an instance of the controller
$trajetC = new TrajetController();
$trajets = $trajetC->afficherTrajets();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des Trajets</title>
</head>
<body>
    <h1>Liste des Trajets</h1>
    <a href="ajouter_trajet.php">Ajouter un Trajet</a>
    <hr>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Point de départ</th>
                <th>Point d'arrivée</th>
                <th>Date de départ</th>
                <th>Date d'arrivée</th>
                <th>Prix</th>
                <th>Conducteur ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($trajet = $trajets->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($trajet['trajet_id']); ?></td>
                    <td><?php echo htmlspecialchars($trajet['point_depart']); ?></td>
                    <td><?php echo htmlspecialchars($trajet['point_arrivee']); ?></td>
                    <td><?php echo htmlspecialchars($trajet['date_depart']); ?></td>
                    <td><?php echo htmlspecialchars($trajet['date_arrivee']); ?></td>
                    <td><?php echo htmlspecialchars($trajet['prix']); ?></td>
                    <td><?php echo htmlspecialchars($trajet['conducteur_id']); ?></td>
                    <td>
                        <a href="modifier_trajet.php?id=<?php echo $trajet['trajet_id']; ?>">Modifier</a>
                        <a href="supprimer_trajet.php?id=<?php echo $trajet['trajet_id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce trajet ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
