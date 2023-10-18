<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Heure Courante</title>
</head>
<body>
    <h3>L'heure courante est :</h3>
    <p>
        <?php
        $date = new DateTime('now', new DateTimeZone('Europe/Paris')); 
        echo $date->format('H:i:s');
        ?>
    </p>
    <form>
        <p>Entrez votre prenom, puis validez : </p>
        <input type="text" name="prenom">
        <input type="submit" value="Valider">
    </form>

    <?php
        if(isset($_GET["prenom"])) {
            echo "Vous vous appelez :".$_GET["prenom"],"</br>";
        }
    ?>


    <?php function afficher($prenom, $nom){
        echo "Bonjour, ";
        echo $prenom;
        echo " ";
        echo $nom;
        echo " amuse toi bien sur le site!";
        echo "<br>";
    }
    
    $matrice = array (
        array ("Anna","Ruiz"),
        array ("Adèle","Patarot"),
        array ("Anthony","Charreyron")
    );

    for ($k=0;$k<sizeof($matrice);$k++){
        afficher($matrice[$k][0],$matrice[$k][1]);
    }
    ?>
    
</body>
</html>
