<?php

    $db = new PDO('mysql:host=localhost;dbname=cuisine;charset=utf8', 'admin', 'raspbian');

    $insert = $db->prepare('INSERT INTO ingredients(emmental, morbier, comte) VALUES(?, ?, ?)');
    $insert->execute(array(true, true, true));
?>