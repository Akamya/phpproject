<?php
require_once './helpers.php';
startSession();
require_once './gestion-forms-connex.php';
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
    require_once './header.php';
    if(est_connecte() == false){
        redirect('/connexion.php');
    }else{
        $utilisateur = loadUtilisateur($_SESSION['utilisateurPseudo']);
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        deconnecter_utilisateur();
        redirect('/connexion.php');
    }
    ?>
    
    <h1>Profil</h1>
    <p>Pseudo: </p>
    <p><?=$utilisateur['uti_pseudo']?></p>
    <p>Email: </p>
    <p><?=$utilisateur['uti_email']?></p>

    <form method="post">
        <input type="submit" id="boutonDeco" name="boutonDeco" value="Déconnexion">
    </form>

    <?php require_once './footer.php'; ?>
</body>
</html>