<?php
    session_start();
    $db=mysqli_connect("localhost","admin","1234","an52th4");
    mysqli_query($db,"SET NAMES UTF8");
    $user=$_SESSION["user"];
    $_SESSION["user"]=$user;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.6.0.min.js"></script>
    <script src="jquery-ui.min.js"></script>
    <link rel="stylesheet" href="jquery-ui.min.css">
    <link rel="stylesheet" href="jquery-ui.structure.min.css">
    <link rel="stylesheet" href="jquery-ui.theme.min.css">
    <title>管理帳號</title>
    <style>
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<div id="newuser" title="新增使用者">
        <form action="adduser.php" method="post">
        帳號<input type="text" name="acc"><br>
        密碼<input type="text" name="pas"><br>
        權限<input type="text" name="permission"><br>
        <input type="submit" value="確認">
        </form>
    </div>
    <div id="xifuser" title="修改使用者">
        <form action="fixuser.php" method="post">
        <input type="text" name="id" id="di">
        密碼<input type="text" name="pas" id="pas"><br>
        權限<input type="text" name="permission" id="per"><br>
        <input type="submit" value="確認">
        </form>
    </div>
    <input type="button" value="新增使用者" id="adduser">
    <input type="button" value="登出" id="outuser">
    <table border="1">
    <tr>
        <th>使用者</th>
        <th>密碼</th>
        <th>權限</th>
        <th>修改</th>
        <th>刪除</th>
    </tr>
    <?php
        $row=mysqli_query($db,"SELECT * FROM `adminuser` WHERE 1");
        while($arr=mysqli_fetch_array($row)){
            echo "
                <tr>
                    <th>$arr[1]</th>
                    <th>$arr[2]</th>
                    <th>$arr[3]</th>
                    <th><input type='button' value='修改使用者' id='fixuser$arr[0]' class='fixuser'></th>
                    <th><a href='deluser.php?id=$arr[0]'>刪除</a></th>
                </tr>
            ";
        }
    ?>
    </table>
</body>
</html>
<script>
$("#newuser").dialog({
    autoOpen:false,
});
$("#adduser").click(function(){
    $("#newuser").dialog("open");
});
$("#xifuser").dialog({
    autoOpen:false,
});
$(".fixuser").click(function(){
    $www=$(this).attr('id').substr(7);
    $.post({
        url:"fixsearch.php",
        data:{
            id:$www,
        },
        success:function(e){
            $("#xifuser").dialog("open");
            var n=e.split("#$");
            n.pop();
            rr=JSON.parse(n[0]);
            $("#pas").val(rr[0]);
            $("#per").val(rr[1]);
            $("#di").val($www);
            $("#di").hide();
        }
    });
   
});
$("#outuser").click(function(){
    window.location.href="outuser.php";
});
</script>