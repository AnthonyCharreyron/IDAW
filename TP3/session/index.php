<?php
    session_start();
    $selectedPage='accueil.html';
    if(isset($_SESSION['page'])){
        $selectedPage=$_SESSION['page'];
    }
    if
?>
<!doctype html>
<html>  
    <head>
        <?php
            echo '<a href="'.$selectedPage.'"></a>';
        ?>
    </head>
    <body>
        <?php if(!isset($_SESSION['page'])){      
        echo'
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
        </form>';}
        ?>
        <p>Lorem ipsum</p>
        <?php

        ?>
    </body>
</html>