<?php

header('Cache-Control:no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires:0');

session_start();
if (isset($_POST["submit"]) && ($_POST["username"] !='') && ($_POST["pass"] !='')){
    $username=$_POST["username"];
    $passwd=$_POST["pass"];
    $pass=md5($passwd);
    $con = new mysqli("localhost", "root", "", "buoi3");
    //include "connect.php";
    $con->set_charset("utf8");
    if ($username == "" || $passwd == "" ){
        header("location: Bai2_dangnhap.html");
    }else{
        $sql="SELECT tendangnhap, matkhau  FROM thanhvien WHERE (tendangnhap='$username' AND matkhau='$pass')";
        $result=$con->query($sql);
        $_SESSION['username'] = $username;
    
    if(mysqli_num_rows($result)==1){
        setcookie('username', $username,time()+3600);
       setcookie('pass', $passwd,time()+3600);
       //$id=$_COOKIE['username'];
        header("location: thongtincanhan2.php");
    }else {
        header("location: Bai2_dangnhap.html");
    }
    $con->close();}
}
//$con = new mysqli("localhost", "id16225287_nghiabuddy", "123hieunghiA!", "id16225287_buoi3");
?>
