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
        $request->bindParam(':email', $email, PDO::PARAM_STR);
        $request->execute();
    }

    function get_users($request){
        global $pdo;
        $request = $pdo->prepare("select * from users");
        $request->execute();
        $result = $request->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    // function http_response_code($value){
    // }
    
?>