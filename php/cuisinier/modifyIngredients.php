<?php
$db = new PDO("mysql:host=localhost;dbname=cuisine;charset=utf8", "admin", "raspbian");

if(isset($_POST["send"])){
    echo "<meta http-equiv='refresh' content='0'>";
    if(isset($_POST["Jambon"])){
        $jambon = 1;
    }else{
        $jambon = 0;
    }
    if(isset($_POST["Coppa"])){
        $coppa = 1;
    }else{
        $coppa = 0;
    }
    if(isset($_POST["Andouille"])){
        $andouille = 1;
    }else{
        $andouille = 0;
    }
    if(isset($_POST["Saumon"])){
        $saumon = 1;
    }else{
        $saumon = 0;
    }
    if(isset($_POST["Morbier"])){
        $morbier = 1;
    }else{
        $morbier = 0;
    }
    if(isset($_POST["Emmental"])){
        $emmental = 1;
    }else{
        $emmental = 0;
    }
    if(isset($_POST["Comte"])){
        $comte = 1;
    }else{
        $comte = 0;
    }
    if(isset($_POST["Chevre"])){
        $chevre = 1;
    }else{
        $chevre = 0;
    }

    $updateIngredients = $db->prepare("UPDATE ingredients SET Jambon = $jambon, Coppa = $coppa, Andouille = $andouille, Saumon = $saumon, Morbier = $morbier, Emmental = $emmental, Comte = $comte, Chevre = $chevre");
    $updateIngredients->execute();
    header("Location: ./index.html");
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <p>Jambon : <input type="checkbox" name="Jambon"<?php if($viandes["Jambon"] == "1"){ ?> checked <?php } ?></p>
                    <p>Coppa : <input type="checkbox" name="Coppa"<?php if($viandes["Coppa"] == "1"){ ?> checked <?php } ?></p>
                    <p>Andouille : <input type="checkbox" name="Andouille"<?php if($viandes["Andouille"] == "1"){ ?> checked <?php } ?></p>
                    <p>Saumon : <input type="checkbox" name="Saumon"<?php if($viandes["Saumon"] == "1"){ ?> checked <?php } ?></p>
                </div>
                <h2>Fromages</h2>
                <div class="container">   
                    <p>Morbier : <input type="checkbox" name="Morbier"<?php if($viandes["Morbier"] == "1"){ ?> checked <?php } ?></p>
                    <p>Emmental : <input type="checkbox" name="Emmental"<?php if($viandes["Emmental"] == "1"){ ?> checked <?php } ?></p>
                    <p>Comt&#233; : <input type="checkbox" name="Comte"<?php if($viandes["Comte"] == "1"){ ?> checked <?php } ?></p>
<p>Ch&#232;vre : <input type="checkbox" name="Chevre"<?php if($viandes["Chevre"] == "1"){ ?> checked <?php } ?></p>
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