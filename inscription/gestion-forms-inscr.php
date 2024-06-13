<?php

require_once '../helpers/helpers_DB.php';

//Besoin d'initialiser les variables car la page est dans GET à la base (pas POST)
$formError = null;
$messagePseudo = null;
$messageEmailInscr = null;
$messageMdp = null;
$messageMdpConf = null;
$mdpDiff = null;

//S'active quand on appuie sur le bouton valider (soumet le form)
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $formError = false;

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $emailInscr = htmlspecialchars($_POST['inscriptionEmail']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $mdpConf = htmlspecialchars($_POST['confirmationMdp']);
    

    if(empty($pseudo) || strlen($pseudo) < 2 || strlen($pseudo) > 255){
        $formError = true;
        $messagePseudo = "Pseudo invalide";
    }

    //Si l'email n'est pas vide il filtre l'email pour vérifier sa validité: Affiche erreur si l'email n'est pas valide
    if(!empty(!filter_var($emailInscr, FILTER_VALIDATE_EMAIL))){
        $formError = true;
        $messageEmailInscr = "Email invalide";
    }

    //Si le message est vide ou moins de 10 carac. ou plus...: Affiche erreur
    if(empty($mdp) || strlen($mdp) < 8 || strlen($mdp) > 72){
        $formError = true;
        $messageMdp = "Mot de passe invalide";
    }

    //Si le message est vide ou moins de 10 carac. ou plus...: Affiche erreur
    if(empty($mdpConf) || strlen($mdpConf) < 8 || strlen($mdpConf) > 72){
        $formError = true;
        $messageMdpConf = "Mot de passe invalide";
    }

    if($mdp !== $mdpConf){
        $formError = true;
        $mdpDiff = "Les deux mots de passes doivent être identiques";
    }

    if($formError == false){
        try {
            // Instancier la connexion à la base de données.
            $pdo = connexion_bdd();

            // Calcule un hash sur base de $mdp
            $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
            
            // La requête permettant d'ajouter un nouvel utilisateur à la table "t_utilisateur_uti".
            $requete = "INSERT INTO t_utilisateur_uti (uti_pseudo, uti_email, uti_motdepasse) VALUES ('$pseudo', '$emailInscr', '$mdpHash')";

            // La méthode "exec()" permet d'exécuter les requêtes non préparées (CREATE/INSERT, UPDATE et DELETE).
            // La méthode retourne "true" si la requête a été réalisée avec succès, "false" si elle a rencontré une erreur et 0 si aucune ligne n'a été affectée.
            $pdo->exec($requete);
        }

        catch(PDOException $e){
            gerer_exceptions($e);
        }
    }

    
}




?>