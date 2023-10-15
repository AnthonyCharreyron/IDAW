<?php
    session_start();
    $currentPageId='accueil';
    $is_connected=False;
    if(isset($_GET['disconnect'])){
        session_unset();
        session_destroy();
    }
    require_once('template_header.php');
    require_once('template_menu.php');
    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    }
    renderMenuToHTML($currentPageId);

    if(isset($_POST['login'])){
        
    }
    ?>
    <?php if($is_connected)?>  
        <form id="login_form" action="connected.php" method="POST">
            <table>
                <tr>
                    <th>Login :</th>
                <td><input type="text" name="login"></td>
                </tr>
                <tr>
                    <th>Mot de passe :</th>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                <th></th>
                <td><input type="submit" value="Se connecter..." /></td>
                   </tr>
            </table>
        </form>;
    <?php else: ?>
        <h1> Hello </h1>

    <header class="bandeau_haut">
        <h1 class="titre">Anthony Charreyron</h1>
    </header>
        <section class="corps">
            <?php
            if(isset($_SESSION['login'])){
                $pageToInclude = $currentPageId.".php";
                if(is_readable($pageToInclude)){
                    require_once('connected.php');
                    require_once($pageToInclude);
                }
                else{
                require_once("error.php");
                }
            }
            else{
                header('Location: index.php');
            }
            ?>
        </section>
    </body>
</html>