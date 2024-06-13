<?php

require_once __dir__. '/helpers.php';

// Permet de se connecter à la DB
function connexion_bdd(): ?PDO
{
    try
    {

        // recupere les info du .env
        parseEnv();

        // Instancier une nouvelle connexion.
        $pdo = new PDO("mysql:host=" . getEnv("DBHOST") . ";dbname=" . getEnv("DBNAME") . ";charset=utf8", getEnv("DBUSER"), getEnv("DBPASSWORD"));

        // Définir le mode d'erreur sur "exception".
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Retourner l'objet PDO après la connexion.
        return $pdo;
    }
    catch(PDOException $e)
    {
        // Relancer l'exception pour qu'elle soit capturée par le bloc "try/catch" parent.
        throw $e;
    }
}


// Prendre l'utilisateur dans la DB
function loadUtilisateur($pseudo){

    // Instancier la connexion à la base de données.
    $pdo = connexion_bdd();
            
    // Récupérer utilisateur en DB grâce à son pseudo
    $requete = "SELECT * FROM t_utilisateur_uti WHERE uti_pseudo = '$pseudo'";
    
    // Exécute la requête
    $stmt = $pdo->query($requete);

    // Récupérer le résultat sous le format de tableau associatif
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    return $utilisateur;
}

?>