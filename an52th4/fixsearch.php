<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th4");
    mysqli_query($db,"SET NAMES UTF8");
    $id=$_POST["id"];
    $row=mysqli_query($db,"SELECT * FROM `adminuser` WHERE `id` LIKE '$id'");
    $arr=mysqli_fetch_array($row);
    $ar=array();
    array_push($ar,$arr[2]);
    array_push($ar,$arr[3]);
    echo json_encode($ar)."#$";
?>