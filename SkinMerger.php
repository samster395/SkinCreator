<?php
/* Making the image */

$username      = $_GET["name"];
$skintype      = $_GET["skin"];
$mcskinl       = "http://s3.amazonaws.com/MinecraftSkins/".$username.".png";
$templateskinl = "./assets/images/".$skintype.".png";
$playerskin    = imagecreatefrompng($mcskinl);
$templateskin  = imagecreatefrompng($templateskinl);

if(!$playerskin) {$playerskin = imagecreatefrompng("./assets/images/steve.png");}
if($templateskin == False) {
    die("There was an error. Send a message on the forum thread");
} else {
    imagealphablending($playerskin, false);
    $transparency = imagecolorallocatealpha($playerskin, 0, 0, 0, 127);
    imagefill($playerskin, 0, 0, $transparency);
    imagesavealpha($playerskin, true);
    imagealphablending($playerskin, true);
    imagesavealpha($templateskin, true);
    imagealphablending($templateskin, true);

    imagecopy($playerskin, $templateskin, 0, 0, 0, 0, 64, 32);
    //lets display it
    header("Content-type: image/png");
    imagepng($playerskin);
    //cleaning up the crime scene
    imagedestroy($templateskin);
    imagedestroy($playerskin);
}
?>