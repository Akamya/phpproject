<?php
$nomDuServeur = "localhost";
$nomUtilisateur = "root";
$motDePasse = "";

try
{
    // Instancier une nouvelle connexion.
    $pdo = new PDO("mysql:host=$nomDuServeur", $nomUtilisateur, $motDePasse);

    // Définir le mode d'erreur sur "exception".
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Exécuter la requête SQL pour créer la base de données "bdd_ifosup".
    $pdo->exec("CREATE DATABASE bdd_ifosup DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;");
}
catch(PDOException $e)
{
    echo "Erreur d'exécution de requête : " . $e->getMessage() . PHP_EOL;
}
?>