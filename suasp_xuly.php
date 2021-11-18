<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: Bai2_dangnhap.html');
}else {
$tensp=$_POST['tensp'];
$chitiet=$_POST['chitiet'];
$gia=$_POST['giasp'];
$hinhsp="./hinh san pham/" . $_FILES['file']['name'];
$user=$_SESSION['username'];
// Create connection
$con = new mysqli("localhost", "root", "", "buoi3");
//include "connect.php";
// Check connection
move_uploaded_file($_FILES['file']['tmp_name'],$hinhsp);
$sql1="SELECT idsp FROM sanpham,thanhvien where (tendangnhap='$user' AND thanhvien.id=sanpham.idtv)";
$result= $con->query($sql1);
while ($row=$result->fetch_assoc()){
    $id="$row[idsp]";
}
$sql = "UPDATE sanpham SET tensp='$tensp', chitietsp='$chitiet', giasp='$gia', hinhsp='$hinhsp' WHERE idsp='$id'";
$con->query($sql);
header('location: Bai4_danhsachsp.php');
$con->close();
}
?>