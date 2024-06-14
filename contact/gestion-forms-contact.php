<?php

//Besoin d'initialiser les variables car la page est dans GET à la base (pas POST)
$formError = null;
$messageNom = null;
$messagePrenom = null;
$messageEmail = null;
$messageMess = null;
$emailStatut = null;

//S'active quand on appuie sur le bouton valider (soumet le form)
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $formError = false;

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    //Si le nom est vide ou moins de 2 carac. ou plus de 255 carac.: Affiche erreur
    if(empty($nom) || strlen($nom) < 2 || strlen($nom) > 255){
        $formError = true;
        $messageNom = "Nom invalide";
    }

    //Si le prénom n'est pas vide et fait moins de 2 carac. ou plus de...: Affiche erreur
    if(!empty($prenom) && strlen($prenom) < 2 || strlen($prenom) > 255){
        $formError = true;
        $messagePrenom = "Prénom invalide";
    }

    //Si l'email n'est pas vide il filtre l'email pour vérifier sa validité: Affiche erreur si l'email n'est pas valide
    if(!empty(!filter_var($email, FILTER_VALIDATE_EMAIL))){
        $formError = true;
        $messageEmail = "Email invalide";
    }

    //Si le message est vide ou moins de 10 carac. ou plus...: Affiche erreur
    if(empty($message) || strlen($message) < 10 || strlen($message) > 3000){
        $formError = true;
        $messageMess = "Message invalide";
    }

    
    
    //ENVOI UN MAIL QUAND FORM ENVOYE
    if($formError==false){

        $expediteur = "$prenom $nom <$email>";
        $destinataire = "Elo Lan <elodielanglet420@gmail.com>";
        $sujet = "projet web - formulaire de contact";
        $entete = [
            "From" => $expediteur,
            "MIME-Version" => "1.0",
            "Content-Type" => 'text/html; charset="UTF-8"',
            "Content-Transfer-Encoding" => "quoted-printable"
        ];
        
        // Corps du message au format HTML.
        $text = "<html><body><p>$message</p></body></html>";
        
        // Tentative d'envoi du mail :
        //To et Subject: faut pas mettre en entête car déjà envoyé en argument mail()
        //Mail retourne faux si le mail n'a pas été envoyé (bug réseau ou quoi)
        if (mail($destinataire, $sujet, $text, $entete))
        {
            $emailStatut = "Le courriel a été envoyé avec succès.";
        }
        else
        {
            $emailStatut = "L'envoi du courriel a échoué.";
        }
    }
}




?>