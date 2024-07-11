<?php

ob_start();

$db = new PDO("mysql:host=localhost;dbname=cuisine;charset=utf8", "root", "");

// Get the "viandes" from the table ingredients. The info is stored in a CSV format.
$recupViandes = $db->query("SELECT viandes FROM ingredients");
$viandes = $recupViandes->fetch(PDO::FETCH_ASSOC);
$viandes = explode(";", $viandes["viandes"]);

// Get the "fromages" from the table ingredients. The info is stored in a CSV format.
$recupFromages = $db->query("SELECT fromages FROM ingredients");
$fromages = $recupFromages->fetch(PDO::FETCH_ASSOC);
$fromages = explode(";", $fromages["fromages"]);

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="./app.js" defer></script>
    <title>CSV Ingredients</title>
</head>
<body>
<a href="../"><img src="../img/back.svg" style="filter: invert(100%); position: absolute;"></a>
    <h1>Modifier les ingr&eacute;dients</h1>
    <section>
        <h2>Viandes & Poissons:</h2>
        <input type="text" id="viandeInput">
        <input type="submit" id="viandeSubmit" value="Ajouter">
        <div class="list" id="viandeList"></div>
        <div class="output" id="viandeOutput" name="viandeOutput"><?= implode(";", $viandes); ?></div>
    </section>
    <section>
        <h2>Fromages:</h2>
        <input type="text" id="fromageInput">
        <input type="submit" id="fromageSubmit" value="Ajouter">
        <div class="list" id="fromageList"></div>
        <div class="output" id="fromageOutput" name="fromageOutput"><?= implode(";", $fromages) ?></div>
    </section>
    <input type="submit" value="Valider" id="submit" name="submit">
</body>
</html>

<?php
    ob_end_flush();
?>