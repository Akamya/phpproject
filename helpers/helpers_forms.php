<?php

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

function nav(string $chemin, string $nom_lien): string
{
    // $_SERVER['REQUEST_URI'] => permet de prendre le chemin sur lequel on est(plus precisement, le chemin apres le domaine dans URL)
    if($_SERVER['REQUEST_URI'] === $chemin) {
        $CSS = 'active'; // applique la classe active si elle correspond au chemin
    }
    else {
        $CSS = ''; // pas de classe
    }

    ob_start(); // mettre en tampon(en suspend) le code html comme un copier coller
?>
    <li class="col-4"><a class="<?php echo $CSS?>" href="<?php echo $chemin ?>"><?php echo $nom_lien ?></a></li>
<?php
    return ob_get_clean();
}

$nav =  nav("/index.php", "Accueil") .
    nav("/contact/contact.php", "Contact") .
    nav("/connexion/connexion.php", "Connexion");

$navProfil = nav("/index.php", "Accueil") .
nav("/contact/contact.php", "Contact") .
nav("/profil/profil.php", "Profil");



?>
