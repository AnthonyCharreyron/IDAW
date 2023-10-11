<?php
    require_once("template_header.php");
    $currentPageId = 'accueil';
    if(isset($_GET['page'])) {
    $currentPageId = $_GET['page'];
    }
    $lang = isset($_GET['lang']) ? $_GET['lang'] : 'fr';
    require_once($lang."/template_menu.php");
?>

<header class="bandeau_haut">
    <h1 class="titre">Anthony Charreyron</h1>
</header>
<?php
    renderMenuToHTML($currentPageId);
?>
<section class="corps">
    <?php
    $pageToInclude = $lang."/".$currentPageId . ".php";
    if(is_readable($pageToInclude))
    require_once($pageToInclude);
    else
    require_once("error.php");
    ?>
</section>
<?php
    require_once("template_footer.php");
?>
