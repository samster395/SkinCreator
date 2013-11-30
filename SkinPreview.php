<?php
function flip($src) { //Function for flipping the image horizontally
    $out = imagecreatetruecolor(4, 12);
    for($i = 0; $i < 4; $i++) {
        for($j = 0; $j < 12; $j++) {
            $col = imagecolorat($src, 3-$i, $j);
            imagesetpixel($out, $i, $j, $col);
                }
        }
    return $out;
}
//Get resources
$username = $_GET["name"];
$link = $_GET["skin"];
//Check if it's for previewing generated image
if($link != "") {
	$mcskinl = "http://zachary.site88.net/SkinCreator/SkinMerger.php?name=".$username."&skin=".$link;
}
else {
	$mcskinl = "http://s3.amazonaws.com/MinecraftSkins/".$username.".png";
}
$skin = imagecreatefrompng($mcskinl);

if(!$skin | imagesx($skin) != 64 | imagesy($skin) != 32) {
	$skin = imagecreatefrompng("steve.png");
}
//Create images
$body = imagecreatetruecolor(128, 260);
$ratmp = imagecreatetruecolor(4, 12);
$rltmp = imagecreatetruecolor(4, 12);
//Make the background transparent
$transparency = imagecolorallocatealpha($body, 0, 0, 0, 127);
imagefill($body, 0, 0, $transparency);
imagecolordeallocate($body);
imagesavealpha($body, true);
//Copying
imagecopyresized($body, $skin, 32, 4, 8, 8, 64, 64, 8, 8); //Head
imagecopyresized($body, $skin, 32, 68, 20, 20, 64, 128, 8, 16); //Body
imagecopyresized($body, $skin, 0, 68, 44, 20, 32, 96, 4, 12); //Left arm
imagecopy($ratmp, $skin, 0, 0, 44, 20, 4, 12);
$ratmp = flip($ratmp);
imagecopyresized($body, $ratmp, 96, 68, 0, 0, 32, 96, 4, 12); //Right arm
imagecopyresized($body, $skin, 32, 164, 4, 20, 32, 96, 4, 12); //Left leg
imagecopy($rltmp, $skin, 0, 0, 4, 20, 4, 12);
$rltmp = flip($rltmp);
imagecopyresized($body, $rltmp, 64, 164, 0, 0, 32, 96, 4, 12); //Right leg
imagecopyresized($body, $skin, 28, 0, 40, 8, 72, 72, 8, 8); //Hat
//Generate the result
header("Content-type: image/png");
imagepng($body);
imagedestroy($body);
imagedestroy($skin);
imagedestroy($ratmp);
imagedestroy($rltmp);
?>