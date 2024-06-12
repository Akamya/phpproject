<?php
require_once './helpers.php';
require_once './gestion-forms-inscr.php';
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
    $pageTitre = "Inscription";
    $metaDescription = "Ceci est la page d'inscription";
    require_once './header.php';
    if(est_connecte()){
        redirect('/profil.php');
    }
    ?>
    
    <h1>Inscription</h1>

    <form method="post">
        <label for="pseudo">Pseudo : </label><br>
        <input type="text" name="pseudo" id="pseudo" minlength="2" maxlength="255" required value=<?=$formError ? $pseudo : ""?>><br>
        <p><?=$messagePseudo?></p>

        <label for="inscriptionEmail">Email : </label><br>
        <input type="email" id="inscriptionEmail" name="inscriptionEmail" required value=<?=$formError ? $emailInscr : ""?>><br>
        <p><?=$messageEmailInscr?></p>

        <label for="mdp">Mot de passe : </label><br>
        <input type="password" id="mdp" name="mdp" minlength="8" maxlength="72" required /><br>
        <p><?=$messageMdp?></p>

        <label for="confirmationMdp">Confirmez votre mot de passe : </label><br>
        <input type="password" id="confirmationMdp" name="confirmationMdp" minlength="8" maxlength="72" required /><br>
        <p><?=$messageMdpConf?></p>
        <p><?=$mdpDiff?></p>

        <input type="submit" id="bouton" name="bouton" value="Valider">
        
        <p><?php statutForm($formError)?></p>
    </form>

    <?php require_once './footer.php'; ?>
</body>
</html>