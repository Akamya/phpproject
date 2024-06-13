<?php
require_once '../helpers/helpers.php';
require_once '../helpers/helpers_session.php';
require_once '../helpers/helpers_forms.php';
startSession();
require_once './gestion-forms-email.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <?php
    $pageTitre = "Modification de l'email";
    $metaDescription = "Ceci est la page de la modification de l'email";
    require_once '../header.php';
    if(est_connecte() == false){
        redirect('../connexion/connexion.php');
    }
    ?>
    
    <h1>Modification de l'email</h1>

    <div class="containerContact">
        <form class="formContact" method="post">
            <div class="flexInput">
                <!-- <label for="inscriptionEmail">Email : </label> -->
                <input type="email" id="inscriptionEmail" name="inscriptionEmail" required placeholder="Modifiez votre email*" value=<?=$formError ? $emailInscr : ""?>>
                <p class="messageInput"><?=$messageEmailInscr?></p>
            </div>
            

            <input type="submit" id="boutonInsc" class="bouton" name="bouton" value="Valider">
            
            <p class="messageInput"><?php statutForm($formError)?></p>
        </form>
    </div>
    

    <?php require_once '../footer.php'; ?>
</body>
</html>