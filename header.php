<?php require_once './helpers.php'?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$metametaDescription ?? ''?>">
    <title><?=$pageTitre ?? ''?></title>
    <!-- ex: $pageTitre ?? ''
    Permet de vérifier si la valeur existe(pas null), sinon '' (ex: string vide)-->
    <link rel="stylesheet" href="./assets/reset.css">
    <link rel="stylesheet" href="./assets/styles.css">
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <div class="banner"></div>
        <nav>
            <ul class="liens container">
                <!-- Met la classe "active" sur le lien actif -->
                <li class="<?php isActive('index.php'); ?> col-4"><a href="/index.php">Accueil</a></li>

                <li class="<?php isActive('contact.php'); ?> col-4"><a href="/contact.php">Contact</a></li>

                <li class="<?php isActive('connexion.php'); cacheSiCo()?> col-4"><a href="/connexion.php">Connexion</a></li>

                <li class="<?php isActive('profil.php'); cacheSiDeco()?> col-4"><a href="/profil.php">Profil</a></li>
            </ul>
        </nav>
        
    </header>