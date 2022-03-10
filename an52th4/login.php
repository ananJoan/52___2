<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th4");
    mysqli_query($db,"SET NAMES UTF8");
    if(!empty($_POST)){
        $checks=$_SESSION["checked"];
        $a=$_POST["acc"];
        $b=$_POST["pas"];
        $c=$_POST["checked"];
        $qwq=$_SESSION["qwq"];
        $row=mysqli_query($db,"SELECT * FROM `adminuser` WHERE `user` LIKE '$a'");
        $arr=mysqli_fetch_array($row);
        if(empty($arr[0])){
            echo "帳號輸入錯誤";
            $_SESSION["qwq"]=$_SESSION["qwq"]+1;
        }else if($b!=$arr[2]){
            echo "密碼輸入錯誤";
            $_SESSION["qwq"]=$_SESSION["qwq"]+1;
        }else if($c!=$checks){
            echo "驗證碼輸入錯誤";
            $_SESSION["qwq"]=$_SESSION["qwq"]+1;
        }else{
            $_SESSION["user"]=$arr[1];
            date_default_timezone_set('Asia/Taipei');
            $time=date('Y/m/d H:i:s');
            mysqli_query($db,"INSERT INTO `time`( `user`, `time`, `action`) VALUES ('$arr[1]','$time','登入')");
            if($arr[3]=="管理者"){
                header("location:adminpage.php");
            }else{
                header("location:userspage.php");
            }
        }
        if($_SESSION["qwq"]==3) header("location:qwq.htm");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.0.min.js"></script>
    <title>登入</title>
</head>
<body>
    <form action="login.php" method="post">
    帳號<input type="text" name="acc"><br>
    密碼<input type="password" name="pas"><br>
    <img src="checks.php" id="checks"><input type="button" value="更換驗證碼" id="new"><br>
    驗證碼<input type="text" name="checked"><br>
    <input type="submit" value="登入">
    </form>
</body>
</html>
<script>
    $("#new").click(function(){
        $("#checks").attr('src','checks.php');
    });
</script>