<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th4");
    mysqli_query($db,"SET NAMES UTF8");
    $user=$_SESSION["user"];
    $row=mysqli_query($db,"SELECT * FROM `work` WHERE `user` LIKE '$user'");
    while($arr=mysqli_fetch_array($row)){
        $arrr=array();
        array_push($arrr,$arr[0]);
        array_push($arrr,$arr[1]);
        array_push($arrr,$arr[2]);
        array_push($arrr,$arr[3]);
        array_push($arrr,$arr[4]);
        array_push($arrr,$arr[5]);
        array_push($arrr,$arr[6]);
        array_push($arrr,$arr[8]);
        echo json_encode($arrr)."###";
    }
?>