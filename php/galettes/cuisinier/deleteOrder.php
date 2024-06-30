<?php

$db = new PDO("mysql:host=localhost;dbname=cuisine;charset=utf8", "admin", "raspbian");

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET["id"];
    $db->exec("DELETE FROM commandes WHERE id = $getId");
    header("Location: ./");
}else{
    echo("<script>alert('Erreur 404, identifiant non trouvé.')</script>");
    header("Location: index.php");
}


?>