<?php
header('Cache-Control:no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires:0');
session_start();
if (!isset($_SESSION['username'])) {
    header('location: Bai2_dangnhap.html');
}else {
    $con = new mysqli("localhost", "root", "", "buoi3");
    //include "connect.php";
	$id = $_GET['idsp'];
    $sql="DELETE FROM sanpham WHERE idsp = $id ";
    $con->query($sql);
    header('location: Bai4_danhsachsp.php');
    $con->close();
}
?>