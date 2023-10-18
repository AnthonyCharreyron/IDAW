<?php
    session_start();
    
    if(isset($_GET['disconnect'])){
        session_unset();
        session_destroy();
    }

    $username='anonyme';
    $is_connected=False;

    if(isset($_SESSION['login'])) {
		$username = $_SESSION['login'];
		$is_connected = True;
	}

    if(isset($_POST['login'])){
        $username=$_POST['login'];
        $_SESSION['login']=$username;
        $is_connected=True;
    }

    require_once('template_header.php');
    require_once('template_menu.php');


    if(!$is_connected){
        echo '<form id="login_form" action="connected.php" method="POST">
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
        </form>';
        } 
        else {
            echo '<h1>Hello '.$username.'</h1>';
            
        }
        ?>
        <section class="corps">
            <?php
            $currentPageId='accueil';
            if(isset($_GET['page'])) {
                $currentPageId = $_GET['page'];
            }
            renderMenuToHTML($currentPageId);
            if(isset($_SESSION['login'])){
                $pageToInclude = $currentPageId.".php";
                if(is_readable($pageToInclude)){
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