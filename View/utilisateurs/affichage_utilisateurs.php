<?php
include '../../Controller/UtilisateurController.php';

// Create an instance of the controller
$utilisateurC = new UtilisateurController();
$utilisateurs = $utilisateurC->afficherUtilisateurs();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des Utilisateurs</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .actions {
            text-align: center;
        }
    </style>
</head>
<body>
    <a href="create.php">Ajouter un Utilisateur</a>
    <hr>
    <h1>Liste des Utilisateurs</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($utilisateurs->rowCount() > 0) {
                while ($row = $utilisateurs->fetch()) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['utilisateur_id']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['nom']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['prenom']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['email']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['type_utilisateur']) . '</td>';
                    echo '<td class="actions">';
                    echo '<a href="edit.php?id=' . htmlspecialchars($row['utilisateur_id']) . '">Modifier</a> | ';
                    echo '<a href="delete.php?id=' . htmlspecialchars($row['utilisateur_id']) . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cet utilisateur ?\')">Supprimer</a>';
                    echo '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="6">Aucun utilisateur trouvé.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
