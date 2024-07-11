<?php

$db = new PDO("mysql:host=localhost;dbname=cuisine;charset=utf8", "root", "");

$recupOrders = $db->query("SELECT * FROM galettes");
while($orders = $recupOrders->fetch()){
    ?>
    <tr>
        <td style=""><?= $orders["prenom"];?></td>
        <td><?= $orders["viande"];?></td>
        <td>
            <?php
            if ($orders["oeuf"] == "on") {
                echo "Oui";
            } else {
                echo "Non";
            }
            ?>
        </td>
        <td><?= $orders["fromage"];?></td>
        <td><?= $orders["accompagnements"];?></td>
        <td><?= $orders["note"];?></td>
        <td><a href='deleteOrder.php?id=<?= $orders["id"]?>'><img src="../img/finished.svg" style="width: 40px; filter: invert(56%) sepia(14%) saturate(6182%) hue-rotate(106deg) brightness(95%) contrast(69%); transform: translate(5px, 5px);"></a></td>
    </tr>
    <?php
}




?>