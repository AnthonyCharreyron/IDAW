<?php
    function renderMenuToHTML($currentPageId) {
        $mymenu = array(
        'accueil' => array( 'Accueil' ),
        'cv' => array( 'Cv' ),
        'projets' => array('Mes Projets'),
        'hobbies' => array('Mes Hobbies'),
        'contact' => array('Me Contacter')
        );
        echo '<nav class="menu"><ul>';
            foreach($mymenu as $pageId => $pageParameters) {
                echo '<li>';
                if ($currentPageId == $pageId) {
                    echo '<a id="currentpage" href="index.php?page='.$pageId.'&lang=fr">'.$pageParameters[0].'</a>';
                } else {
                    echo '<a href="index.php?page='.$pageId.'&lang=fr">'.$pageParameters[0].'</a>';
                }
                echo '</li>';
            }
        echo '<li><a class="langmenu" href="index.php?page='.$currentPageId.'&lang=en">English</a></li></ul></nav>';
    }
?>