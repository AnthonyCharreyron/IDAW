<?php
    require_once('template_header.php');
?>
        <h1>Mes projets</h1>
        <?php
            require_once('template_menu.php');
            renderMenuToHTML('projets');
        ?>
        <h3>Mes différents projets</h3>

        <h4>Création de site web</h4>
        <p>Je suis en collaboration avec une association pour leur faire un site web. Cette association est une association écologique communale qui cherche à atteindre le 0 déchet.</p>
        
        <h4>Création d'une réplique du jeu dino</h4>
        <p>Dans le cadre de mes études, j'ai réalisé un jeu en Smalltalk. J'ai choisi de re-visiter le jeu de dino à ma manière.</p>
        <?php
    require_once('template_footer.php');
?>