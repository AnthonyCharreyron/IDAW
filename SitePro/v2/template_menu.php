<?php
function renderMenuToHTML($currentPageId) {
    $mymenu = array(
    'index' => array( 'Accueil' ),
    'cv' => array( 'Cv' ),
    'projets' => array('Mes Projets')
    );
    foreach($mymenu as $pageId => $pageParameters) {
    echo "...";
}
// ...
}
?>