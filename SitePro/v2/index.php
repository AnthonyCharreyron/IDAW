<?php
    require_once('template_header.php');
?>
        <h1>Bienvenue sur mon site</h1>
        <?php
            require_once('template_menu.php');
            renderMenuToHTML('index');
        ?>
        <p>Ce site permet de découvrir qui je suis.</p>
        <p>En naviguant sur ce site, vous pouvez découvrir mon CV ou mes projets.</p>
        <?php
    require_once('template_footer.php');
?>
