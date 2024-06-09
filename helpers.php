<?php
//Met la classe "active" sur le lien actif
function isActive($parametre){

    if(str_ends_with($_SERVER['REQUEST_URI'], $parametre)){
        echo "active";
    }
    else{
        echo "";
    }
}

//Affiche un message à la soumission du formulaire
function statutForm($error){
    if($error){
        echo "Le formulaire n'a pas été envoyé!";
    }
    else if(is_null($error)){
        echo "";
    }
    else{
        echo "Le formulaire a bien été envoyé!";
    }
}

// Constante globale permettant de préciser que l'application est en mode "développement".
define('DEV_MODE', true);

// Fonction permettant de centraliser la gestion des erreurs liées à une requête :
function gerer_exceptions(PDOException $e): void
{
    // Limiter l'affichage des erreurs au mode "développement" pour éviter le risque de communiquer des données sensibles
    // lorsqu'une erreur se produit en mode "production" (lorsque le site est en ligne) :
    if (defined('DEV_MODE') && DEV_MODE === true)
    {
        echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
    }
}

// Permet de se connecter à la DB
function connexion_bdd(): ?PDO
{
    $nomDuServeur = "localhost";
    $nomUtilisateur = "root";
    $motDePasse = "";
    $nomBDD = "bdd_ifosup";

    try
    {
        // Instancier une nouvelle connexion.
        $pdo = new PDO("mysql:host=$nomDuServeur;dbname=$nomBDD", $nomUtilisateur, $motDePasse);

        // Définir le mode d'erreur sur "exception".
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Retourner l'objet PDO après la connexion.
        return $pdo;
    }
    catch(PDOException $e)
    {
        // Relancer l'exception pour qu'elle soit capturée par le bloc "try/catch" parent.
        throw e;
    }
}



?>