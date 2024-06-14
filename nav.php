<?php 
require_once __dir__ . '/helpers/helpers.php';
require_once __dir__ . '/helpers/helpers_session.php';
require_once __dir__ . '/helpers/helpers_forms.php';


?>

<header>
    <div class="banner"></div>
    <nav>
        <ul class="liens container">
            <!-- Met la classe "active" sur le lien actif -->
            <?php if(est_connecte()){
                echo $navProfil;
            }
            else{
                echo $nav;
            }
            ?>
        </ul>
    </nav>
    
</header>