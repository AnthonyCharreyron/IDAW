<?php
    require_once("template_head_action.php");      
        try {
            if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['email']))
                $id = $_POST['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];

                $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $request = $pdo->prepare('UPDATE `users` 
                SET `name`= :name, `email`= :email 
                WHERE `users`.`id` = :id');

                $request->bindParam(':name', $name, PDO::PARAM_STR);
                $request->bindParam(':email', $email, PDO::PARAM_STR);
                $request->bindParam(':id', $id, PDO::PARAM_STR);
                $request->execute();

                header("Location: users.php");
                exit();
            }
            catch (PDOException $erreur) {
                echo 'Erreur : '.$erreur->getMessage();
            }

