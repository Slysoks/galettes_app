<?php

$db = new PDO("mysql:host=localhost;dbname=cuisine;charset=utf8", "admin", "raspbian");

$result = $db->query("SELECT * FROM commandes");
echo ("Resultat(s) : ");
echo ($result->rowCount());

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Echo</title>
</head>
<body>
    
</body>
</html>