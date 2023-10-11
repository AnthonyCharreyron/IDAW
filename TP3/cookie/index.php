<!doctype html>
<html>
    <head>
        <?php
            $selectedStyle='style1';
            if(isset($_COOKIE['style'])){
                $selectedStyle=$_COOKIE['style'];
                echo '<link rel="stylesheet" type="text/css" href="'.$selectedStyle.'.css">';
            }
        ?>
    </head>
    <body>
        <form id="style_form" action="index.php" method="GET">
            <select name="css">
                <option value="style1">style1</option>
                <option value="style2">style2</option>
            </select>
            <input type="submit" value="Appliquer" />
        </form>
        <?php 
            if(isset($_GET['css'])){
                $selectedStyle = $_GET["css"];
                setcookie('style', $selectedStyle, time() + 3600, '/');
            }
        ?>
    </body>
</html>