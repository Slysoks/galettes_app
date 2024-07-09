<?php

$db = new PDO("mysql:host=db:3306;dbname=cuisine;charset=utf8", "admin", "raspbian");

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET["id"];
    $db->exec("DELETE FROM galettes WHERE id = $getId");
    header("Location: ./");
}else{
    echo("<script>alert('Erreur 404, identifiant non trouvé.')</script>");
    header("Location: index.php");
}


?>