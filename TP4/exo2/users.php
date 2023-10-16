<?php
    require_once('config.php');
    $connectionString = "mysql:host=". _MYSQL_HOST;
    if(defined('_MYSQL_PORT'))
        $connectionString .= ";port=". _MYSQL_PORT;
        $connectionString .= ";dbname=" . _MYSQL_DBNAME;
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
        $pdo = NULL;
        try {
            $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $erreur) {
            echo 'Erreur : '.$erreur->getMessage();
        }
        $request = $pdo->prepare("select * from users");
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        ?>
        <?php echo '<h2>Users</h2>'?>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Email</th>
            </tr>
            <?php foreach ($result as $tab => $donnees) : ?>
                <tr>
                <?php foreach($donnees as $personne => $key) :?>
                    <td><?php echo $key; ?></td>
                <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php 
        // TODO: add your code here
        // retrieve data from database using fetch(PDO::FETCH_OBJ) and
        // display them in HTML array
        /*** close the database connection ***/
        $pdo = null;