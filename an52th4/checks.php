<?php
session_start();
$cans="ABCDEFGHIJKLMOPQRSTUBWXYZ1234567890";
$checks="";
$checks=$cans[rand(0,strlen($cans)-1)].$cans[rand(0,strlen($cans)-1)].$cans[rand(0,strlen($cans)-1)].$cans[rand(0,strlen($cans)-1)];
$image=imagecreate(100,30);
$backcolor=imagecolorallocate($image,200,200,200);
$fontcolor=imagecolorallocate($image,0,0,225);
imagestring($image,100,35,5,$checks,$fontcolor);
$_SESSION["checked"]=$checks;
imagepng($image);
?>