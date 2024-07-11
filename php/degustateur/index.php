<?php

ob_start();

$db = new PDO("mysql:host=localhost;dbname=cuisine;charset=utf8", "root", "");

if(isset($_POST["send"])){
    echo "<meta http-equiv='refresh' content='0'>";
    $prenom = htmlspecialchars($_POST["prenom"]);

    // Check if a name is entered
    if (empty($prenom)) {
        echo "<script>alert('Veuillez entrer un prénom')</script>";
        exit();
    }

    $viande = htmlspecialchars($_POST["viande"]);
    $oeuf = htmlspecialchars($_POST["egg"]);
    $fromage = htmlspecialchars($_POST["fromage"]);
    $accompagnements = htmlspecialchars($_POST["accompagnements"]);
    $note = htmlspecialchars($_POST["note"]);

    if (empty($accompagnements) and empty($note) and empty($viande) and empty($fromage) and empty($oeuf)) {
        echo "<script>alert('Veuillez entrer au moins un ingrédient')</script>";
        exit();
    }

    // Check if the name is already in the database
    $check = $db->prepare("SELECT * FROM galettes WHERE prenom = ?");
    $check->execute(array($prenom));
    $check = $check->fetch();
    if ($check) {
        // Update the order
        $update = $db->prepare("UPDATE galettes SET viande = ?, oeuf = ?, fromage = ?, accompagnements = ?, note = ? WHERE prenom = ?");
        $update->execute(array($viande, $oeuf, $fromage, $accompagnements, $note, $prenom));
    } else {
        // Insert the order
        $insert = $db->prepare("INSERT INTO galettes(prenom, viande, oeuf, fromage, accompagnements, note) VALUES(?, ?, ?, ?, ?, ?)");
        $insert->execute(array($prenom, $viande, $oeuf, $fromage, $accompagnements, $note));
    }

    // Return to the main page
    header("Location: ../");

}

ob_end_flush();

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
                <h2>Viande & poisson : </h2>
                <select name="viande" id="ingredients">
                    <option value="Non">Non</option>
                    <?php
                    $recupViandes = $db->query("SELECT * FROM ingredients");
                    while($viandes = $recupViandes->fetch()){
                        if($viandes["Jambon"]){?>
                            <option value="Jambon">Jambon</option>
                        <?php }if($viandes["Coppa"]){?>
                            <option value="Coppa">Coppa</option>
                        <?php }if($viandes["Andouille"]){?>
                            <option value="Andouille">Andouille</option>
                        <?php }if($viandes["Saumon"]){?>
                            <option value="Saumon">Saumon</option>
                        <?php }
                        }
                    ?>
                </select>
            </div>
            <div class="choice">
                <h2>Oeuf : </h2>
                <input id="egg" name="egg" type="checkbox">
            </div>
            <div class="choice">
                <h2>Fromage : </h2>
                <select name="fromage">
                <option value="Non">Non</option>
                    <?php
                    $recupViandes = $db->query("SELECT * FROM ingredients");
                    while($viandes = $recupViandes->fetch()){
                        if($viandes["Morbier"]){?>
                            <option value="Morbier">Morbier</option>
                        <?php }if($viandes["Emmental"]){?>
                            <option value="Emmental">Emmental</option>
                        <?php }if($viandes["Comte"]){?>
                            <option value="Comt&#233;">Comt&#233;</option>
                            <?php }if($viandes["Chevre"]){?>
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
</html>
