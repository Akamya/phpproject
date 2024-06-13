<?php
require_once './helpers/helpers_session.php';
startSession()
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <?php
    $pageTitre = "Accueil";
    $metaDescription = "Ceci est la page d'accueil";
    require_once './header.php'; ?>
    
    <h1>Accueil</h1>

    <?php require_once './footer.php'; ?>
</body>
</html>