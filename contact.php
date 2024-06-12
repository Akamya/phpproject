<?php
require_once './helpers.php';
require_once './gestion-forms-contact.php'; 
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
    $pageTitre = "Contact";
    $metaDescription = "Ceci est la page contact";
    require_once './header.php'; 
    ?>

    <h1>Contact</h1>

    <!-- ex : "value=<?=$formError ? $nom : ""?>" permet de mettre valeur dans le champs quand soumission a échouée -->
    <form method="post">
        <label for="nom">Nom : </label><br>
        <input type="text" name="nom" id="nom" minlength="2" maxlength="255" required value=<?=$formError ? $nom : ""?>><br>
        <p><?=$messageNom?></p>

        <label for="prenom">Prénom : </label><br>
        <input type="text" name="prenom" id="prenom" minlength="2" maxlength="255" value=<?=$formError ? $prenom : ""?>><br>
        <p><?=$messagePrenom?></p>

        <label for="email">Email : </label><br>
        <input type="email" id="email" name="email" required value=<?=$formError ? $email : ""?>><br>
        <p><?=$messageEmail?></p>

        <label for="message">Message : </label><br>
        <textarea id="message" name="message" minlength="10" maxlength="3000" required><?=$formError ? $message : ""?></textarea><br>
        <p><?=$messageMess?></p>

        <input type="submit" id="bouton" name="bouton" value="Valider">
        
        <p><?php statutForm($formError)?></p>
        <p><?=$formError==false ? $emailStatut : ""?></p>
    </form>

    <?php require_once './footer.php'; ?>
</body>
</html>