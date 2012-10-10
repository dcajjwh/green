<?php 
session_start();
$str_array=range(0,9);
$str=array_rand($str_array,4);
$vcode=implode("", $str);
$_SESSION['vcode']=$vcode;
header("Content-type: image/png");
$im =imagecreatetruecolor(67, 20);
$black = imagecolorallocate($im, 255, 255, 255); 
imagefill($im, 0, 0, $black);
$white = imagecolorallocate($im, 0, 0, 0); 
for($i=0;$i<4;$i++){
$randcolor = imagecolorallocate($im,rand(0,180),rand(0,255),rand(0,255));
$char=$str[$i];
$pos=16*$i+3;
imagettftext($im, 16, 0, $pos, 17, $randcolor, "bold.otf", $char);
}
imagepng($im);
imagedestroy($im); 
?>