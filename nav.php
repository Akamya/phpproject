<?php 
require_once __dir__ . '/helpers/helpers.php';
require_once __dir__ . '/helpers/helpers_session.php';
?>

<header>
    <div class="banner"></div>
    <nav>
        <ul class="liens container">
            <!-- Met la classe "active" sur le lien actif -->
            <li class="<?php isActive('index.php'); ?> col-4"><a href="/index.php">Accueil</a></li>

            <li class="<?php isActive('contact.php'); ?> col-4"><a href="/contact/contact.php">Contact</a></li>

            <li class="<?php isActive('connexion.php'); cacheSiCo()?> col-4"><a href="/connexion/connexion.php">Connexion</a></li>

            <li class="<?php isActive('profil.php'); cacheSiDeco()?> col-4"><a href="/profil/profil.php">Profil</a></li>
        </ul>
    </nav>
    
</header>