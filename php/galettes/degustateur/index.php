<?php

$db = new PDO("mysql:host=localhost;dbname=cuisine;charset=utf8", "admin", "raspbian");

if(isset($_POST["send"])){
    echo "<meta http-equiv='refresh' content='0'>";
    $prenom = htmlspecialchars($_POST["prenom"]);
    $viande = htmlspecialchars($_POST["viande"]);
    $oeuf = htmlspecialchars($_POST["oeuf"]);
    $fromage = htmlspecialchars($_POST["fromage"]);
    $accompagnements = htmlspecialchars($_POST["accompagnements"]);
    $note = htmlspecialchars($_POST["note"]);
    if(!empty($prenom) and (!empty($accompagnements or $note) or ($viande and $oeuf and $fromage) == ("Non"))){
        $insertCustomer = $db->prepare("INSERT INTO commandes(prenom, viande, oeuf, fromage, accompagnements, note) VALUES(?, ?, ?, ?, ?, ?)");
        $insertCustomer->execute(array($prenom, $viande, $oeuf, $fromage, $accompagnements, $note));
        echo("<script>alert('La commande au nom de $prenom à été ajouté.')</script>");
	header("Location: ../");
    }else{
        echo("<script>alert('Veuillez entrer au minimum 1 champ ainsi que votre prenom.')</script>");
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Dégustateur</title>
</head>
<body>
    <a href="../"><img src="../img/back.svg" style="filter: invert(100%); position: absolute;"></a>
    <h1>D&#233;gustateur</h1>
    <div class="container">
        <form method="post">
            <div class="choice">
                <h2>Pr&#233;nom : </h2>
                <input type="text" name="prenom">
            </div>
            <div class="choice">
                <h2>Viande et poisson : </h2>
                <select name="viande" id="ingredients">
                    <option value="Non">Non</option>
                    <?php
                    $recupViandes = $db->query("SELECT * FROM ingredients");
                    while($viandes = $recupViandes->fetch()){
                        if($viandes["Jambon"] == "1"){?>
                            <option value="Jambon">Jambon</option>
                        <?php }if($viandes["Coppa"] == "1"){?>
                            <option value="Coppa">Coppa</option>
                        <?php }if($viandes["Andouille"] == "1"){?>
                            <option value="Andouille">Andouille</option>
                        <?php }if($viandes["Saumon"] == "1"){?>
                            <option value="Saumon">Saumon</option>
                        <?php }
                        }
                    ?>
                </select>
            </div>
            <div class="choice">
                <h2>Oeuf : </h2>
                <select name="oeuf">
                    <option value="Non">Non</option>
                    <option value="Oui">Oui</option>
                </select>
            </div>
            <div class="choice">
                <h2>Fromage : </h2>
                <select name="fromage">
                <option value="Non">Non</option>
                    <?php
                    $recupViandes = $db->query("SELECT * FROM ingredients");
                    while($viandes = $recupViandes->fetch()){
                        if($viandes["Morbier"] == "1"){?>
                            <option value="Morbier">Morbier</option>
                        <?php }if($viandes["Emmental"] == "1"){?>
                            <option value="Emmental">Emmental</option>
                        <?php }if($viandes["Comte"] == "1"){?>
                            <option value="Comt&#233;">Comt&#233;</option>
                            <?php }if($viandes["Chevre"] == "1"){?>
                            <option value="Ch&#232;vre">Ch&#232;vre</option>
                            <?php }
                        } ?>
                </select>
            </div>
            <div class="choice">
                <h2>Accompagnements : </h2>
                <textarea name="accompagnements"></textarea>
            </div>
            <div class="choice">
                <h2>Note au cuisto : </h2>
                <textarea name="note" id="note"></textarea>
            </div>
            <input type="submit" value="Envoyer en cuisine" id="send" name="send">
        </form>
    </div>
</body>
<style>
    /*--- IMPORTS ---*/
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap');
    /*---------------*/


    body{
        background-color: #1b2631;
        color: #fff;
        margin: 0;
    }

    h1{
        font-family: "Poppins", sans-serif;
        text-align: center;
        font-size: 50px;
    }

    .container{
        display: flex;
        flex-direction: column;
    }

    h2{
        font-size: 30px;
        font-family: "Poppins", sans-serif;
    }

    .choice{
        display: flex;
        margin-left: 15px;
	flex-direction: column;
	margin-top: 35px;
    }

    select{
        height: 40px;
        width: 150px;
        background-color: #1b2631;
        color: #fff;
        border: #fff solid 1px;
        border-radius: 20px;
        transform: translate(20px, 35px);
        border-bottom-right-radius: 0px;
        border-top-left-radius: 0px;
        font-size: 18px;
        padding: 5px;
    }

    .choice input{
        font-size: 22px;
        height: 40px;
        width: 200px;
        color: #fff;
        border: #fff solid 1px;
        border-radius: 20px;
        background-color: #1b2631;
        border-bottom-right-radius: 0px;
        border-top-left-radius: 0px;
        transform: translate(20px, 30px);
    }

    textarea{
        font-size: 22px;
        height: 100px;
        width: 300px;
        color: #fff;
        border: #fff solid 1px;
        border-radius: 20px;
        background-color: #1b2631;
        transform: translate(20px, 15px);
        border-bottom-right-radius: 0px;
        border-top-left-radius: 0px;
    }

    textarea#note{
        width: 300px;
	    height: 200px;
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
</style>
</html>