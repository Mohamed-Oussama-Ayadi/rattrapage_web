<?php
include '../../Controller/UtilisateurController.php';

$error = "";

// Create an instance of the controller
$utilisateurC = new UtilisateurController();

if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["mot_de_passe"]) &&
    
    isset($_POST["date_creation"])
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["mot_de_passe"]) &&
     
        !empty($_POST["date_creation"])
    ) {
        // Create a new Utilisateur object using the constructor
        $utilisateur = new Utilisateur(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['mot_de_passe'],
            'passager',
            $_POST['date_creation']
        );
        
        // Add the new user using the controller's method
        $utilisateurC->ajouterUtilisateur($utilisateur);
        header('Location: login.php');
    } else {
        $error = "Informations manquantes";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Utilisateur</title>
</head>
<body>
    <a href="affichage_utilisateurs.php">Retour à la liste</a>
    <hr>
    <div id="error">
        <?php echo $error; ?>
    </div>
    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td><label for="nom">Nom:</label></td>
                <td><input type="text" name="nom" id="nom" maxlength="50"></td>
            </tr>
            <tr>
                <td><label for="prenom">Prénom:</label></td>
                <td><input type="text" name="prenom" id="prenom" maxlength="50"></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" name="email" id="email" maxlength="100"></td>
            </tr>
            <tr>
                <td><label for="mot_de_passe">Mot de passe:</label></td>
                <td><input type="password" name="mot_de_passe" id="mot_de_passe" maxlength="255"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="type_utilisateur" id="type_utilisateur" maxlength="20" value="passager"></td>
            </tr>
            <tr>
                <td><label for="date_creation">Date de création:</label></td>
                <td><input type="date" name="date_creation" id="date_creation"></td>
            </tr>
            <tr align="center">
                <td><input type="submit" value="Enregistrer"></td>
                <td><input type="reset" value="Réinitialiser"></td>
            </tr>
        </table>
    </form>
</body>
</html>
