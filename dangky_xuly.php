<?php
// lấy dữ liệu về
header('Cache-Control:no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires:0');
$username=$_POST['username'];
$passwd=$_POST['pass'];
$avatarlink="./avatar/" . $_FILES['file']['name'];
$gioitinh = $_POST['gender'];
$job=$_POST['subject'];
$pass=md5($passwd);
$st="";
foreach($_POST['sothich'] as $giatri){
    $st = $st.$giatri.", ";
}
$st1=substr(trim($st),0,-1);
// làm việc với CSDL
$con = new mysqli("localhost", "root", "", "buoi3");
//include "connect.php";
$con->set_charset("utf8");
$sql="INSERT INTO thanhvien (tendangnhap,matkhau,hinhanh,gioitinh,nghenghiep,sothich) 
VALUES ('$username','$pass','$avatarlink','$gioitinh','$job','$st1')";
$con->query($sql);
move_uploaded_file($_FILES['file']['tmp_name'],$avatarlink);
header("location:Bai2_dangnhap.html");
$con->close();
?>
