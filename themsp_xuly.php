<?php
header('Cache-Control:no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires:0');
// lấy dữ liệu về
session_start();
$tensp=$_POST['name'];
$chitiet=$_POST['ctsp'];
$giasp=$_POST['gia'];
$duongdan="./hinh san pham/" . $_FILES['file']['name'];
$user=$_SESSION['username'];
// làm việc với CSDL
$con = new mysqli("localhost", "root", "", "buoi3");
//include "connect.php";
$con->set_charset("utf8");
$sql1="SELECT id FROM thanhvien where (tendangnhap='$user')";
$result= $con->query($sql1);
while ($row=$result->fetch_assoc()){
    $id="$row[id]";
}
move_uploaded_file($_FILES['file']['tmp_name'],$duongdan);
$sql="INSERT INTO sanpham (tensp,chitietsp,giasp,hinhsp,idtv) VALUES ('$tensp','$chitiet','$giasp','$duongdan','$id')";
$con->query($sql);
header("location:Bai4_danhsachsp.php");
$con->close();
?>