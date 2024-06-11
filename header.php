<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?=$metametaDescription ?? ''?>">
    <title><?=$pageTitre ?? ''?></title>
    <!-- ex: $pageTitre ?? ''
    Permet de vérifier si la valeur existe(pas null), sinon '' (ex: string vide)-->
    <link rel="stylesheet" href="assets/styles.css">
    <?php require_once 'helpers.php'?>
</head>
<body>

    <header>
        <nav>
            <ul class="liens">
                <!-- Met la classe "active" sur le lien actif -->
                <li class="<?php isActive('index.php'); ?>"><a href="index.php">Accueil</a></li>

                <li class="<?php isActive('contact.php'); ?>"><a href="contact.php">Contact</a></li>

                <li class="<?php isActive('connexion.php'); cacheSiCo()?>"><a href="connexion.php">Connexion</a></li>

                <li class="<?php isActive('profil.php'); cacheSiDeco()?>"><a href="profil.php">Profil</a></li>
            </ul>
        </nav>
    </header>
    <main>