<?php
    function renderMenuToHTML($currentPageId, $lang) {
        $mymenu = array(
        'accueil' => array( 'Accueil', 'Home' ),
        'cv' => array( 'Cv', 'Resume' ),
        'projets' => array('Mes Projets', 'My projects'),
        'hobbies' => array('Mes Hobbies', 'My hobbies'),
        'contact' => array('Me Contacter', 'My contacts')
        );
        $numlang;
        if ($lang=='fr'){
            $numlang=0;
        }
        else {
            $numlang=1;
        }
        echo '<nav class="menu"><ul>';
            foreach($mymenu as $pageId => $pageParameters) {
                echo '<li>';
                if ($currentPageId == $pageId) {
                    echo '<a id="currentpage" href="index.php?page='.$pageId.'&lang='.$lang.'">'.$pageParameters[$numlang].'</a>';
                } else {
                    echo '<a href="index.php?page='.$pageId.'&lang='.$lang.'">'.$pageParameters[$numlang].'</a>';
                }
                echo '</li>';
            }
        if ($lang=='fr'){
            echo '<li><a class="langmenu" href="index.php?page='.$currentPageId.'&lang=en">English</a></li></ul></nav>';
        }
        else {
            echo '<li><a class="langmenu" href="index.php?page='.$currentPageId.'&lang=fr">Français</a></li></ul></nav>';
        }
    }
?>