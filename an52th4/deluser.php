<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th4");
    mysqli_query($db,"SET NAMES UTF8");
    $id=$_GET["id"];
    mysqli_query($db,"DELETE FROM `adminuser` WHERE `id` LIKE '$id'");
    header("location:adminpage.php");
?>