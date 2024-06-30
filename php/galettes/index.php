<?php


declare(strict_types=1);
$host = gethostbyname('raspberrypi');

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

require_once('./vendor/autoload.php');

$options = new QROptions(
  [
    'eccLevel' => QRCode::ECC_L,
    'outputType' => QRCode::OUTPUT_MARKUP_SVG,
    'version' => 5,
  ]
);

$qrcode = (new QRCode($options))->render('192.168.1.120');

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Accueil</title>
</head>
<body>
    <h1 class="title">Qui es-tu ?</h1>
    <div class="container">
        <div class="content">
            <a href="./degustateur" class="box" id="eater">
                Je suis un degustateur
                <img src="./img/eater.svg" id="eaterImg" class="svgLogo">
            </a>
            <a href="./cuisinier" class="box" id="cooker">
                Je suis un cuisinier
                <img src="./img/cooker.svg" id="cookerImg" class="svgLogo">
            </a>
        </div>
    </div>
    <a href="./bigqrcode.php"><img src="<?= $qrcode ?>" style="position: absolute; filter: invert(0); width: 100px; right: 0; bottom: 0;" id="qrcode"></a></body>
</html>