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
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Big QrCode Preview</title>
</head>
<body>
  <a href="./" style="width: 200px; text-decoration: none; color: #000;"><img src="./img/back.svg" alt=""></a>
  <img src="<?= $qrcode ?>" style="position: absolute; filter: invert(0);" id="qrcode">
</body>
</html>