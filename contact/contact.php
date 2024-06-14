<?php
require_once '../helpers/helpers_forms.php';
require_once '../helpers/helpers_session.php';
startSession();
require_once './gestion-forms-contact.php'; 
?>

<!DOCTYPE html>
<html lang="fr">
<?php require_once '../head.php'; ?>
<body>
    <?php
    $pageTitre = "Contact";
    $metaDescription = "Ceci est la page contact";
    require_once '../nav.php'; 
    ?>

    <h1>Contact</h1>

    <div class="containerContact">
        <!-- ex : "value=<?=$formError ? $nom : ""?>" permet de mettre valeur dans le champs quand soumission a échouée -->
        <form class="formContact" method="post">
            <div class="flexInput">
                <!-- <label for="nom">Nom : </label> -->
                <input type="text" name="nom" id="nom" minlength="2" maxlength="255" required placeholder="Nom*" value=<?=$formError ? $nom : ""?>>
                <p class="messageInput"><?=$messageNom?></p>
            </div>

            <div class="flexInput">
                <!-- <label for="prenom">Prénom : </label> -->
                <input type="text" name="prenom" id="prenom" minlength="2" maxlength="255" placeholder="Prénom" value=<?=$formError ? $prenom : ""?>>
                <p class="messageInput"><?=$messagePrenom?></p>
            </div>
            

            <div class="flexInput">
                <!-- <label for="email">Email : </label> -->
                <input type="email" id="email" name="email" required placeholder="Email*" value=<?=$formError ? $email : ""?>>
                <p class="messageInput"><?=$messageEmail?></p>
            </div>
        

            <div class="flexInput">
                <!-- <label for="message">Message : </label> -->
                <textarea id="message" name="message" minlength="10" maxlength="3000" placeholder="Message*" required><?=$formError ? $message : ""?></textarea>
                <p class="messageInput"><?=$messageMess?></p>
            </div>
            

            <input type="submit" id="boutonCont" class="bouton" name="bouton" value="Valider">
            
            <p class="messageInput"><?php statutForm($formError)?></p>
            <p class="messageInput"><?=$formError==false ? $emailStatut : ""?></p>
        </form>
    </div>
    

    <?php require_once '../footer.php'; ?>
</body>
</html>