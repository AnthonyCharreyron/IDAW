<?php
    function renderMenuToHTML($currentPageId) {
        $mymenu = array(
        'accueil' => array( 'Accueil' ),
        'projets' => array('Mes Projets'),
        );
        echo '<nav class="menu"><ul>';
            foreach($mymenu as $pageId => $pageParameters) {
                echo '<li>';
                echo '<a href="index.php?page='.$pageId.'">'.$pageParameters[0].'</a>';
                echo '</li>';
            }
        echo '</ul></nav>';
    }
?>