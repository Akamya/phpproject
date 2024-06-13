<?php
require_once '../helpers/helpers_DB.php';

//Besoin d'initialiser les variables car la page est dans GET à la base (pas POST)
$formError = null;
$messageEmailInscr = null;

//S'active quand on appuie sur le bouton valider (soumet le form)
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $formError = false;

    $emailInscr = htmlspecialchars($_POST['inscriptionEmail']);
    

    //Si l'email n'est pas vide il filtre l'email pour vérifier sa validité: Affiche erreur si l'email n'est pas valide
    if(!empty(!filter_var($emailInscr, FILTER_VALIDATE_EMAIL))){
        $formError = true;
        $messageEmailInscr = "Email invalide";
    }


    if($formError == false){
        try {
            // Instancier la connexion à la base de données.
            $pdo = connexion_bdd();

            $emailUtilise = loadUtilisateurByEmail($emailInscr);

            if($emailUtilise == false){
                $pseudo = $_SESSION['utilisateurPseudo'];
                // La requête permettant de modifier l'email.
                $requete = "UPDATE t_utilisateur_uti SET uti_email = :email WHERE uti_pseudo = :pseudo";
                $stmt = $pdo->prepare($requete);
                $stmt->bindValue(':email', $emailInscr, PDO::PARAM_STR);
                $stmt->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
                $stmt->execute();
            }else{
                $formError = true;
                $messageEmailInscr = "Email déjà utilisé";
            }
            
            
        }

        catch(PDOException $e){
            gerer_exceptions($e);
        }
    }

    
}




?>