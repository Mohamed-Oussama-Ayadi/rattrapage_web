<?php
session_start();

// Vérifiez si l'utilisateur est connecté

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Bienvenue</h1>
    <p>Vous êtes connecté en tant que : <?php echo htmlspecialchars($_SESSION['user_type']); ?></p>
    <a href="logout.php">Déconnexion</a>
</body>
</html>
