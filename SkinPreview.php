<?php
/* Lets make the image merging work with this version of PHP */
putenv('GDFONTPATH=' . realpath('.'));

$username = $_GET["name"];
$skinaddress = "http://s3.amazonaws.com/MinecraftSkins/".$username.".png";

$skin = imagecreatefrompng($skinaddress);
$preview = imagecreatetruecolor(16, 32);
//Transparency
imagealphablending($preview, false);
$transparency = imagecolorallocatealpha($preview, 0, 0, 0, 127);
imagefill($preview, 0, 0, $transparency);
imagesavealpha($preview, true);

//face
imagecopy($preview, $skin, 4, 0, 8, 8, 8, 8);
 
//chest
imagecopy($preview, $skin, 4, 8, 20, 20, 8, 12);
 
//arms
imagecopy($preview, $skin, 0, 8, 44, 20, 4, 12);
imagecopy($preview, $skin, 12, 8, 44, 20, 4, 12);
 
//legs
imagecopy($preview, $skin, 4, 20, 4, 20, 4, 12);
imagecopy($preview, $skin, 8, 20, 4, 20, 4, 12);
       
//hat
imagecopy($preview, $skin, 4, 0, 40, 8, 8, 8);

$resized = imagecreatetruecolor(75, 150);
//Transparency

imagealphablending($resized, false);
$transparency = imagecolorallocatealpha($resized, 0, 0, 0, 127);
imagefill($resized, 0, 0, $transparency);
imagesavealpha($resized, true);
imagecopyresized($resized, $preview, 0, 0, 0, 0, 75, 150, 16, 32);


header ("Content-type: image/png");
imagepng($resized);
?>