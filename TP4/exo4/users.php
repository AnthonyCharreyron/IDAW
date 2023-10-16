<?php
    require_once('config.php');

    $modif=false;
    if (isset($_POST['change']) && isset($_POST['id'])){
        $modif=$_POST['change'];
        $identication=$_POST['id'];
    }

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
                <th>Actions</th>
            </tr>
            <?php foreach ($result as $tab => $donnees) : ?>
                <tr>
                <?php foreach($donnees as $personne => $key) :?>
                    <td><?php echo $key; ?></td>
                    <?php if ($personne=='id'){
                        $id=$key;
                    }
                    ?>
                <?php endforeach; ?>
                    <form id="modifyUser" action="users.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <input type="hidden" name="change" value="true">
                        <td><input type="submit" value="Modify" /></td>
                    </form>
                    <form id="deleteUser" action="delete.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <td><input type="submit" value="Delete" /></td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </table>
    
        <form id="addNew" action="create.php" method="POST">
                <table>
                    <tr>
                        <th>Name :</th>
                    <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <th>email :</th>
                        <td><input type="text" name="email"></td>
                    </tr>
                    <tr>
                    <th></th>
                    <td><input type="submit" value="Add" /></td>
                    </tr>
                </table>
            </form>

        <?php if ($modif==true): ?>
            <form id="update" action="update.php" method="POST">
                <table>
                    <input type="hidden" name="id" value="<?php echo $identication?>">
                    <tr>
                        <th>Name :</th>
                    <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <th>email :</th>
                        <td><input type="text" name="email"></td>
                    </tr>
                    <tr>
                    <th></th>
                    <td><input type="submit" value="Update" /></td>
                    </tr>
                </table>
            </form>
        <?php endif; ?>
        <?php 
        /*** close the database connection ***/
        $pdo = null;