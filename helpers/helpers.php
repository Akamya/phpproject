<?php

// Constante globale permettant de préciser que l'application est en mode "développement".
define('DEV_MODE', true);


// Récupère le contenu de .env
function parseEnv() {
    //Parse .env
    $env = file_get_contents(__DIR__ . "/.env");
    $lines = explode("\n", $env);
    
    foreach ($lines as $line) {
        preg_match("/([^#]+)\=(.*)/", $line, $matches);
        if (isset($matches[2])) {
            putenv(trim($line));
        }
    }
}


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


//Met la classe "active" sur le lien actif
function isActive($parametre){

    if(str_ends_with($_SERVER['REQUEST_URI'], $parametre)){
        echo "active";
    }
    else{
        echo "";
    }
}


// Redirection sur une autre page
function redirect($url) {
    header('Location: '.$url);
    die();
}

?>