<?php
require_once '../helpers/helpers.php';
require_once '../helpers/helpers_session.php';
require_once '../helpers/helpers_forms.php';
startSession();
require_once './gestion-forms-mdp.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <?php
    $pageTitre = "Modification du mot de passe";
    $metaDescription = "Ceci est la page de la modification du mot de passe";
    require_once '../header.php';
    if(est_connecte() == false){
        redirect('../connexion/connexion.php');
    }
    ?>
    
    <h1>Modification du mot de passe</h1>

    <div class="containerContact">
        <form class="formContact" method="post">
            
            <div class="flexInput">
                <!-- <label for="mdp">Mot de passe : </label> -->
                <input type="password" id="mdp" name="mdp" minlength="8" maxlength="72" required placeholder="Nouveau mot de passe*"/>
                <p class="messageInput"><?=$messageMdp?></p>
            </div>
            
            <div class="flexInput">
                <!-- <label for="confirmationMdp">Confirmez votre mot de passe : </label> -->
                <input type="password" id="confirmationMdp" name="confirmationMdp" minlength="8" maxlength="72" required placeholder="Confirmez votre nouveau mot de passe*"/>
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