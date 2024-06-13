<?php
require_once '../helpers/helpers.php';
require_once '../helpers/helpers_session.php';
require_once '../helpers/helpers_DB.php';
startSession();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <?php
    $pageTitre = "Profil";
    $metaDescription = "Ceci est la page de profil";
    require_once '../header.php';
    if(est_connecte() == false){
        redirect('../connexion/connexion.php');
    }else{
        $utilisateur = loadUtilisateurByID($_SESSION['utilisateurID']);
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        deconnecter_utilisateur();
        redirect('../connexion/connexion.php');
    }
    ?>
    
    <h1>Profil</h1>
    <p>Pseudo: </p>
    <p><?=$utilisateur['uti_pseudo']?></p>
    <p>Email: </p>
    <p><?=$utilisateur['uti_email']?></p>

    <p class="messageInput"><a href="../mdp/changemdp.php">Modifier son mot de passe</a></p>
    <p class="messageInput"><a href="../email/changeemail.php">Modifier son email</a></p>

    <form class="messageInput" method="post">
        <input type="submit" id="boutonDeco" class="bouton" name="boutonDeco" value="Déconnexion">
    </form>

    <?php require_once '../footer.php'; ?>
</body>
</html>