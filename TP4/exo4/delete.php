<?php
    require_once("template_head_action.php");
        try {
            if(isset($_POST['id']) )
                $id=$_POST['id'];
            $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $request = $pdo->prepare("DELETE FROM `users` WHERE  id=?");
            $request->execute([$id]);

            header("Location: users.php");
            exit();
        }
        catch (PDOException $erreur) {
            echo 'Erreur : '.$erreur->getMessage();
        }

