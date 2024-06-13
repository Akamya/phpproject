<?php

// A lancer dans chaque script necessitant la session avant d'afficher de l'HTML.
function startSession(){
    // Cette options passée à 1 permet au serveur de rejeter un identifiant de session qui n'aurait pas été initialisé par celui-ci.
    ini_set('session.use_strict_mode', 1);

    // Empêcher la récupération du cookie de session via l'URL (1 est sa valeur par défaut, mais on est jamais trop prudent).
    ini_set('session.use_only_cookies', 1);

    // Configuration sécurisée de la variable de session avant de démarrer celle-ci.
    session_set_cookie_params([
        'path' => '/',
        'secure' => false,
        'httponly' => true,
        'samesite' => 'lax'
    ]);
    
    // Démarrer la gestion des variables de session.
    session_start();
}


// Crée une variable de session qui servira à identifier l'utilisateur actif (pseudo est unique).
function connecter_utilisateur($utilisateurID){ 
    // Créer une variable de session
    $_SESSION['utilisateurID'] = $utilisateurID;
}


// Vérifie si l'utilisateur est connecté.
function est_connecte(){
    return isset($_SESSION['utilisateurID']);
}


// Déconnecte l'ulisateur en supprimant la variable de session.
function deconnecter_utilisateur(){
    unset($_SESSION['utilisateurID']);
}


// Classe HTML qui cache quand utilisateur est connecté
function cacheSiCo(){
    if(est_connecte()){
        echo "hidden";
    }
}


// Classe HTML qui cache quand utilisateur est déconnecté
function cacheSiDeco() {
    if(est_connecte() == false){
        echo "hidden";
    }
}

?>