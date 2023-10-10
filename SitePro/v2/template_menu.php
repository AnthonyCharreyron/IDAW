<?php
function renderMenuToHTML($currentPageId) {
    $mymenu = array(
    'index' => array( 'Accueil' ),
    'cv' => array( 'Cv' ),
    'projets' => array('Mes Projets')
    );
    echo '<nav class="menu"><ul>';
        foreach($mymenu as $pageId => $pageParameters) {
            echo '<li>';
            if ($currentPageId == $pageId) {
                echo '<a id="currentpage" href="'.$pageId.'.php">'.$pageParameters[0].'</a>';
            } else {
                echo '<a href="'.$pageId.'.php">'.$pageParameters[0].'</a>';
            }
            echo '</li>';
        }
    echo '</ul></nav>';
}
?>