<?php


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


function connecter_utilisateur($utilisateurPseudo){ 
    // Créer une variable de session
    $_SESSION['utilisateurPseudo'] = $utilisateurPseudo;
    }


function est_connecte(){
    return isset($_SESSION['utilisateurPseudo']);
}


function deconnecter_utilisateur(){
    unset($_SESSION['utilisateurPseudo']);
}

// Redirection sur une autre page
function redirect($url) {
    header('Location: '.$url);
    die();
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

function cacheSiCo(){
    if(est_connecte()){
        echo "hidden";
    }
}

function cacheSiDeco() {
    if(est_connecte() == false){
        echo "hidden";
    }
}

// 
// 
// 


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



?>