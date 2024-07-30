<?php
require_once '../helpers/helpers.php';
require_once '../helpers/helpers_session.php';
require_once '../helpers/helpers_DB.php';
startSession();
?>

<!DOCTYPE html>
<html lang="fr">
<?php 
$pageTitre = "Profil";
$metaDescription = "Ceci est la page de profil";
require_once '../head.php'; 
?>
<body>

    <?php
    
    
    require_once '../nav.php';
    if(est_connecte() == false){
        redirect('../connexion/connexion.php');
    }else{
        // Cherche utilisateur dans DB
        $utilisateur = loadUtilisateurByID($_SESSION['utilisateurID']);
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        deconnecter_utilisateur();
        redirect('../connexion/connexion.php');
    }
    ?>
    
    <h1>Profil</h1>
    <figure>
        <img class="imgUser" src="../assets/img/user2.png" alt="">
    </figure>

    <div class="containerContact">
        <div class="formContact">
            <div class="profilInfo">
                <p>Pseudo: </p>
                <p><?=$utilisateur['uti_pseudo']?></p>
                <p>Email: </p>
                <p><?=$utilisateur['uti_email']?></p>
            </div>
            

            <p class="messageInput"><a class="pageRedirect" href="../mdp/changemdp.php">Modifier son mot de passe</a></p>
            <p class="messageInput"><a class="pageRedirect" href="../email/changeemail.php">Modifier son email</a></p>

            <form class="messageInput" method="post">
                <input type="submit" id="boutonDeco" class="bouton" name="boutonDeco" value="Déconnexion">
            </form>

        </div>
        
    </div>
    

    <?php require_once '../footer.php'; ?>
</body>
</html>