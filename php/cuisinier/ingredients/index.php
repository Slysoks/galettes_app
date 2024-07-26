<?php

ob_start();

$db = new PDO("mysql:host=localhost;dbname=cuisine;charset=utf8", "root", "");

$data = $db->query("SELECT * FROM ingredients");

if ($data->rowCount() > 0) {
    // Get the "viandes" from the table ingredients. The info is stored in a CSV format.
    $recupViandes = $db->query("SELECT viandes FROM ingredients WHERE id = 1");
    $viandes = $recupViandes->fetch(PDO::FETCH_ASSOC);
    $viandes = explode(";", $viandes["viandes"]);

    // Get the "fromages" from the table ingredients. The info is stored in a CSV format.
    $recupFromages = $db->query("SELECT fromages FROM ingredients WHERE id = 1");
    $fromages = $recupFromages->fetch(PDO::FETCH_ASSOC);
    $fromages = explode(";", $fromages["fromages"]);
} else {
    // If the table is empty, create a new row with empty values.
    $insert = $db->prepare("INSERT INTO ingredients (id, viandes, fromages) VALUES ('1', '', '')");
    $insert->execute();
    $viandes = [];
    $fromages = [];
}

// If the user submits by clicking on the input with id "submit"
// update the ingredients list in the database.
if(isset($_POST["submit"])) {
    // Update the values in a single query
    // Convert arrays back to CSV format before updating
    $viandes_csv = $_POST["viandeOutput"];
    $fromages_csv = $_POST["fromageOutput"];
    
    $update = $db->prepare("UPDATE ingredients SET viandes = ?, fromages = ? WHERE id = 1");
    $update->execute(array($viandes_csv, $fromages_csv));

    header('Location: ../');
}

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
<a href="../"><img src="../../img/back.svg" style="filter: invert(100%); position: absolute;"></a>
    <h1>Modifier les ingr&eacute;dients</h1>
    <section>
        <h2>Viandes & Poissons:</h2>
        <input type="text" id="viandeInput" class="noEnterSubmit">
        <input type="button" id="viandeSubmit" value="Ajouter">
        <div class="list" id="viandeList"></div>
    </section>
    <section>
        <h2>Fromages:</h2>
        <input type="text" id="fromageInput" class="noEnterSubmit">
        <input type="button" id="fromageSubmit" value="Ajouter">
        <div class="list" id="fromageList"></div>
    </section>
    <form method="post">
        <input class="output" type="text" id="viandeOutput" value="<?= implode(";", $viandes); ?>" name="viandeOutput">
        <input class="output" type="text" id="fromageOutput" value="<?= implode(";", $fromages); ?>" name="fromageOutput">
        <input type="submit" value="Valider" id="submit" name="submit">
    </form>
</body>
</html>

<?php
    ob_end_flush();
?>