<?php
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

    $requete = "CREATE TABLE t_utilisateur_uti (
        uti_id INT AUTO_INCREMENT PRIMARY KEY UNIQUE,
        uti_pseudo VARCHAR(255) NOT NULL UNIQUE,
        uti_email VARCHAR(255) UNIQUE NOT NULL,
        uti_motdepasse VARCHAR(255) NOT NULL,
        uti_compte_active BOOLEAN DEFAULT TRUE,
        uti_code_activation VARCHAR(5)
    ) ENGINE=InnoDB";

    // Exécuter la requête SQL pour créer la table "t_utilisateur_uti".
    $pdo->exec($requete);
}
catch(PDOException $e)
{
    echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
}
?>