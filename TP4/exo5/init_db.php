<?php
    require_once('config.php');

    $connectionString = "mysql:host=" . _MYSQL_HOST;
    if (defined('_MYSQL_PORT'))
        $connectionString .= ";port=" . _MYSQL_PORT;
        $connectionString .= ";dbname=" . _MYSQL_DBNAME;
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        
        try {
            $pdo = new PDO($connectionString, _MYSQL_USER, _MYSQL_PASSWORD, $options);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
            catch (PDOException $erreur) {
            echo 'Erreur : ' . $erreur->getMessage();
        }
    
    function create_user($name, $mail){
        global $pdo;

        $request = $pdo->prepare('INSERT INTO `users` (`id`, `name`, `email`) VALUES (NULL, :name, :email);');
        $request->bindParam(':name', $name, PDO::PARAM_STR);
        $request->bindParam(':email', $mail, PDO::PARAM_STR);
        $request->execute();
        
        return ['id'=> $pdo -> lastInsertId()];
    }

    function update_user($id, $name, $email){
        global $pdo;
        $request = $pdo->prepare('UPDATE `users` SET `name`= :name, `email`= :email WHERE `users`.`id` = :id');
        $request->bindParam(':name', $name, PDO::PARAM_STR);
        $request->bindParam(':email', $email, PDO::PARAM_STR);
        $request->bindParam(':id', $id, PDO::PARAM_STR);
        $request->execute();

        return ['name'=> $name, 'email' => $email];
    }

    function delete_user($id){
        global $pdo;
        $request = $pdo->prepare("DELETE FROM `users` WHERE  id=?");
        $request->execute([$id]);

        return $request->rowCount()>0;
    }

    function read_user($id){
        global $pdo;
        $request = $pdo->prepare("select id, name, email from users WHERE id=?");
        $request->execute([$id]);
        $result = $request->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    function get_users($request){
        global $pdo;
        $request = $pdo->prepare("select * from users");
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }    
?>