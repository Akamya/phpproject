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

?>