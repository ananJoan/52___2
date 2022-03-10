<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th4");
    mysqli_query($db,"SET NAMES UTF8");
    if(!empty($_POST)){
        $b=$_POST["pas"];
        $c=$_POST["permission"];
        $id=$_POST["id"];
        mysqli_query($db,"UPDATE `adminuser` SET `password`='$b',`permission`='$c' WHERE `id` LIKE '$id'");
        header("location:adminpage.php");
    }
?>