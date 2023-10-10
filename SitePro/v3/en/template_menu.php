<?php
    function renderMenuToHTML($currentPageId) {
        $mymenu = array(
        'accueil' => array( 'Welcome' ),
        'cv' => array( 'Cv' ),
        'projets' => array('My projects'),
        'hobbies' => array('My hobbies'),
        'contact' => array('Contact me')
        );
        echo '<nav class="menu"><ul>';
            foreach($mymenu as $pageId => $pageParameters) {
                echo '<li>';
                if ($currentPageId == $pageId) {
                    echo '<a id="currentpage" href="index.php?page='.$pageId.'&lang=en">'.$pageParameters[0].'</a>';
                } else {
                    echo '<a href="index.php?page='.$pageId.'&lang=en">'.$pageParameters[0].'</a>';
                }
                echo '</li>';
            }
        echo '<li><a class="langmenu" href="index.php?page='.$currentPageId.'&lang=fr">Français</a></li></ul></nav>';
    }
?>