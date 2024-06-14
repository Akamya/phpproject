<?php
require_once '../helpers/helpers_session.php';
require_once '../helpers/helpers_forms.php';
startSession();
require_once './gestion-forms-connex.php';
?>

<!DOCTYPE html>
<html lang="fr">
<?php require_once '../head.php'; ?>
<body>

    <?php
    $pageTitre = "Connexion";
    $metaDescription = "Ceci est la page de connexion";
    require_once '../nav.php';
    if(est_connecte()){
        redirect('../profil/profil.php');
    }
    ?>

    <h1>Connexion</h1>

    <div  class="containerContact">
        <form class="formContact" method="post">
            <div class="flexInput">
                <!-- <label for="pseudoCo">Pseudo : </label> -->
                <input type="text" name="pseudoCo" id="pseudoCo" minlength="2" maxlength="255" required placeholder="Pseudo*" value=<?=$formError ? $pseudoCo : ""?>>
                <p class="messageInput"><?=$messagePseudoCo?></p>
            </div>
            

            <div class="flexInput">
                <!-- <label for="mdpCo">Mot de passe : </label> -->
                <input type="password" id="mdpCo" name="mdpCo" minlength="8" maxlength="72" required placeholder="Mot de passe*" />
                <p class="messageInput"><?=$messageMdpCo?></p>
            </div>
            
            <input type="submit" id="boutonCo" class="bouton" name="bouton" value="Valider">
            <p class="messageInput pageRedirect"><a href="../inscription/inscription.php" class="pageRedirect">Pas de compte ? Inscrivez-vous ici !</a></p>
            
            <p class="messageInput"><?php statutForm($formError)?></p>
        </form>
    </div>
    

    <?php require_once '../footer.php'; ?>
</body>
</html>