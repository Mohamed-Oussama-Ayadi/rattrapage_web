<?php
include '../../Controller/TrajetController.php';

// Get the trajet ID from the query string
$id = $_GET['id'] ?? '';

// Create an instance of the controller
$trajetC = new TrajetController();
$trajetC->supprimerTrajet($id);

// Redirect to the list of trajets
header('Location: affichage_trajets.php');
exit();
?>
