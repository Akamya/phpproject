<?php
require_once '../helpers/helpers_DB.php';

//Besoin d'initialiser les variables car la page est dans GET à la base (pas POST)
$formError = null;
$messageMdp = null;
$messageMdpConf = null;
$mdpDiff = null;

//S'active quand on appuie sur le bouton valider (soumet le form)
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $formError = false;

    $mdp = htmlspecialchars($_POST['mdp']);
    $mdpConf = htmlspecialchars($_POST['confirmationMdp']);
    

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
            
            $id = $_SESSION['utilisateurID'];
            // La requête permettant de modifier le mdp.
            $requete = "UPDATE t_utilisateur_uti SET uti_motdepasse = :mdp WHERE uti_id = :id";
            $stmt = $pdo->prepare($requete);
            $stmt->bindValue(':mdp', $mdpHash, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_STR);

            $stmt->execute();
        }

        catch(PDOException $e){
            gerer_exceptions($e);
        }
    }

    
}




?>