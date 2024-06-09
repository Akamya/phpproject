<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <?php
    $pageTitre = "Connexion";
    $metaDescription = "Ceci est la page de connexion";
    require_once 'header.php';
    require_once 'gestion-forms-connex.php';
    require_once 'helpers.php'; ?>
    
    <h1>Connexion</h1>

    <form method="post">
        <label for="pseudoCo">Pseudo : </label><br>
        <input type="text" name="pseudoCo" id="pseudoCo" minlength="2" maxlength="255" required value=<?=$formError ? $pseudoCo : ""?>><br>
        <p><?=$messagePseudoCo?></p>

        <label for="mdpCo">Mot de passe : </label><br>
        <input type="password" id="mdpCo" name="mdpCo" minlength="8" maxlength="72" required /><br>
        <p><?=$messageMdpCo?></p>

        <input type="submit" id="bouton" name="bouton" value="Valider">
        <p><a href="/inscription.php">Pas de compte ? Inscrivez-vous ici !</a></p>
        
        <p><?php statutForm($formError)?></p>
    </form>

    <?php require_once 'footer.php'; ?>
</body>
</html>