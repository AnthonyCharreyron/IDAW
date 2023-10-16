<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'dbtest';
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
$dbh=null;

try {
    $dbh = new PDO("mysql:host=$host;dbname=$database", $username, $password, $options);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sqlFile = 'sql/create_db.sql';
    $sql = file_get_contents($sqlFile);

    $stmt = $dbh->exec($sql);

    if ($stmt !== false) {
        echo "Le fichier $sqlFile a été exécuté avec succès dans la base de données.";
    }
    else {
        echo "Une erreur s'est produite lors de l'exécution du fichier SQL.";
    }
}
catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
}
$dbh=null;
?>
