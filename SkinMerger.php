<?php
/* Lets make the image merging work with this version of PHP */
putenv('GDFONTPATH=' . realpath('.'));
/* Making the image */

$username      = $_GET["name"];
$skintype      = $_GET["skin"];
$mcskinl       = "http://s3.amazonaws.com/MinecraftSkins/".$username.".png";
$templateskinl = "./assets/images/".$skintype.".png";
$playerskin    = imagecreatefrompng($mcskinl);
$templateskin  = imagecreatefrompng($templateskinl);

if($playerskin == False || $templateskin == False) {
    die("There was an error. Send a message on the forum thread");
} else {
    /* Transparency */
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