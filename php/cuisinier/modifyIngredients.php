<?php

ob_start();

$db = new PDO("mysql:host=db:3306;dbname=cuisine;charset=utf8", "admin", "raspbian");

// If the table don't exist

if(isset($_POST["send"])){
    echo "<meta http-equiv='refresh' content='0'>";
    if(isset($_POST["Jambon"])){
        $jambon = "on";
    }else{
        $jambon = "off";
    }
    if(isset($_POST["Coppa"])){
        $coppa = "on";
    }else{
        $coppa = "off";
    }
    if(isset($_POST["Andouille"])){
        $andouille = "on";
    }else{
        $andouille = "off";
    }
    if(isset($_POST["Saumon"])){
        $saumon = "on";
    }else{
        $saumon = "off";
    }
    if(isset($_POST["Morbier"])){
        $morbier = "on";
    }else{
        $morbier = "off";
    }
    if(isset($_POST["Emmental"])){
        $emmental = "on";
    }else{
        $emmental = "off";
    }
    if(isset($_POST["Comte"])){
        $comte = "on";
    }else{
        $comte = "off";
    }
    if(isset($_POST["Chevre"])){
        $chevre = "on";
    }else{
        $chevre = "off";
    }

    $updateIngredients = $db->prepare("UPDATE ingredients SET Jambon = $jambon, Coppa = $coppa, Andouille = $andouille, Saumon = $saumon, Morbier = $morbier, Emmental = $emmental, Comte = $comte, Chevre = $chevre");
    $updateIngredients->execute();
    header("Location: ./index.html");
}

ob_flush();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale="on"."off"">
    <title>Modifier La Liste Des Ingr&#233;dients</title>
</head>
<body>
    <a href="./"><img src="../img/back.svg" style="filter: invert(100%); position: absolute;"></a>
    <form method="post">
        <?php
            $recupViandes = $db->query("SELECT * FROM ingredients");
            while($viandes = $recupViandes->fetch()){?>
                <h2>Viandes & Poisson</h2>
                <div class="container">   
                    <p>Jambon : <input type="checkbox" name="Jambon"<?php if($viandes["Jambon"] == "on"){ ?> checked <?php } ?></p>
                    <p>Coppa : <input type="checkbox" name="Coppa"<?php if($viandes["Coppa"] == "on"){ ?> checked <?php } ?></p>
                    <p>Andouille : <input type="checkbox" name="Andouille"<?php if($viandes["Andouille"] == "on"){ ?> checked <?php } ?></p>
                    <p>Saumon : <input type="checkbox" name="Saumon"<?php if($viandes["Saumon"] == "on"){ ?> checked <?php } ?></p>
                </div>
                <h2>Fromages</h2>
                <div class="container">   
                    <p>Morbier : <input type="checkbox" name="Morbier"<?php if($viandes["Morbier"] == "on"){ ?> checked <?php } ?></p>
                    <p>Emmental : <input type="checkbox" name="Emmental"<?php if($viandes["Emmental"] == "on"){ ?> checked <?php } ?></p>
                    <p>Comt&#233; : <input type="checkbox" name="Comte"<?php if($viandes["Comte"] == "on"){ ?> checked <?php } ?></p>
<p>Ch&#232;vre : <input type="checkbox" name="Chevre"<?php if($viandes["Chevre"] == "on"){ ?> checked <?php } ?></p>
                </div>
            <?php } ?>
            <input type="submit" value="Confirmer" id="send" name="send">
    </form>
</body>
<style>
    body{
        display: flex;
        flex-direction: column;
        background-color: #1b2631;
        font-family: Arial, Helvetica, sans-serif;
        color: #fff;
    }
    .container{
        display: flex;
    }
    h2{
        font-size: 38px;
    }
    p{
        font-size: 28px;
    }
    p:not(:first-child){
        margin-left: 50px;
    }
    input{
        width: 28px;
        height: 28px;
    }
    input#send{
        font-size: 22px;
        height: 60px;
        width: 350px;
        color: #fff;
        border: #fff solid 1px;
        border-radius: 20px;
        background-color: #1b2631;
        transform: translate(20px, 15px);
        border-bottom-right-radius: 0px;
        border-top-left-radius: 0px;
	    margin-top: 35px;
        cursor: pointer;
    }
    form{
        margin-top: 25px;
        margin-left: 25px;
    }
</style>
</html>