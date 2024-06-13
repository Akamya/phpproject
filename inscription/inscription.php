<?php
require_once '../helpers/helpers.php';
require_once '../helpers/helpers_forms.php';
require_once '../helpers/helpers_session.php';
startSession();
require_once './gestion-forms-inscr.php';

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
    require_once '../header.php';
    if(est_connecte()){
        redirect('../profil/profil.php');
    }
    ?>
    
    <h1>Inscription</h1>

    <div class="containerContact">
        <form class="formContact" method="post">
            <div class="flexInput">
                <!-- <label for="pseudo">Pseudo : </label> -->
                <input type="text" name="pseudo" id="pseudo" minlength="2" maxlength="255" required placeholder="Pseudo*" value=<?=$formError ? $pseudo : ""?>>
                <p class="messageInput"><?=$messagePseudo?></p>
            </div>

            <div class="flexInput">
                <!-- <label for="inscriptionEmail">Email : </label> -->
                <input type="email" id="inscriptionEmail" name="inscriptionEmail" required placeholder="Email*" value=<?=$formError ? $emailInscr : ""?>>
                <p class="messageInput"><?=$messageEmailInscr?></p>
            </div>
            
            <div class="flexInput">
                <!-- <label for="mdp">Mot de passe : </label> -->
                <input type="password" id="mdp" name="mdp" minlength="8" maxlength="72" required placeholder="Mot de passe*"/>
                <p class="messageInput"><?=$messageMdp?></p>
            </div>
            
            <div class="flexInput">
                <!-- <label for="confirmationMdp">Confirmez votre mot de passe : </label> -->
                <input type="password" id="confirmationMdp" name="confirmationMdp" minlength="8" maxlength="72" required placeholder="Confirmez votre mot de passe*"/>
                <p class="messageInput"><?=$messageMdpConf?></p>
                <p class="messageInput"><?=$mdpDiff?></p>
            </div>
            

            <input type="submit" id="boutonInsc" class="bouton" name="bouton" value="Valider">
            
            <p class="messageInput"><?php statutForm($formError)?></p>
        </form>
    </div>
    

    <?php require_once '../footer.php'; ?>
</body>
</html>