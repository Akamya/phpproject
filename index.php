<?php
require_once './helpers/helpers_session.php';
// Pour la nav
startSession()
?>

<!DOCTYPE html>
<html lang="fr">
<?php 
 $pageTitre = "Accueil";
 $metaDescription = "Ceci est la page d'accueil";
require_once './head.php'; ?>
<body>

    <?php
   
    require_once './nav.php'; ?>
    
    <h1>Accueil</h1>

    <figure>
        <img class="imgAccueil" src="./assets/img/PHP-8.webp" alt="">
    </figure>

    <div>
        <p class="text">Mon premier site PHP.</p>
    </div>

    <?php require_once './footer.php'; ?>
</body>
</html>