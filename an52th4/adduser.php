<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th4");
    mysqli_query($db,"SET NAMES UTF8");
    if(!empty($_POST)){
        $a=$_POST["acc"];
        $b=$_POST["pas"];
        $c=$_POST["permission"];
        mysqli_query($db,"INSERT INTO `adminuser`( `user`, `password`, `permission`) VALUES ('$a','$b','$c')");
        header("location:adminpage.php");
    }
?>