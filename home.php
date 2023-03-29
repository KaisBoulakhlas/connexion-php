<?php
require_once 'Authentication.php';

// Vérifier si l'utilisateur est connecté
if (!Authentication::isLoggedIn()) {
    header('Location: login.php');
    exit();
}

// Récupérer le nom d'utilisateur de l'utilisateur connecté
$username = Authentication::getLoggedInUsername();
?>

<html>
<head>
    <title>Accueil</title>
</head>
<body>
    <h1>Bienvenue <?= $username ?></h1>
    <p>Vous êtes connecté.</p>
    <form method="post" action="logout.php">
        <input type="submit" name="logout" value="Se déconnecter">
    </form>
</body>
</html>