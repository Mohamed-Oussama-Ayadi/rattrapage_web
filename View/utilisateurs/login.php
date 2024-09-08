<?php
session_start();
$error = "";

// Vérifiez si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    header('Location: index.php'); // Redirige vers la page d'accueil
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Inclure le contrôleur d'utilisateur
    require_once '../../Controller/UtilisateurController.php';
    $utilisateurC = new UtilisateurController();

    $email = $_POST['email'] ?? '';
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';

    if (!empty($email) && !empty($mot_de_passe)) {
        // Appel de la méthode pour vérifier les informations de connexion
        $result = $utilisateurC->authentifierUtilisateur($email, $mot_de_passe);

        if ($result) {
            // Connexion réussie, stocker l'ID de l'utilisateur dans la session
            $_SESSION['user_id'] = $result['id_utilisateur'];
            $_SESSION['user_type'] = $result['type_utilisateur']; 
            $_SESSION['email'] = $result['email'];

            // Redirection selon le type d'utilisateur
            if ($_SESSION['user_type'] === 'conducteur') {
                header('Location: index.php');
            } else {
                header('Location: index.php');
            }
            exit();
        } else {
            $error = "Identifiants invalides.";
        }
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
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <?php if ($error): ?>
        <div id="error"><?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>
    <form action="login.php" method="POST">
        <table border="1" align="center">
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" name="email" id="email" maxlength="100" required></td>
            </tr>
            <tr>
                <td><label for="mot_de_passe">Mot de passe:</label></td>
                <td><input type="password" name="mot_de_passe" id="mot_de_passe" maxlength="255" required></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input type="submit" value="Se connecter"></td>
            </tr>
        </table>
    </form>
</body>
</html>
