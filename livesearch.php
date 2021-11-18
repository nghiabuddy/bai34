<?php
session_start();
$user=$_SESSION['username'];
$con = new mysqli("localhost", "root", "", "buoi3");
 //include "connect.php";
    $data = $_REQUEST['q'];
    $sql="SELECT tensp,idsp FROM sanpham,thanhvien WHERE (tendangnhap='$user' AND tensp LIKE '%$data%' AND thanhvien.id=sanpham.idtv)";
    $result=$con->query($sql);
    while($row=$result->fetch_assoc()){
    echo "<a href='chitiet.php?idsp=$row[idsp]' >$row[tensp]</a>";
    echo "<br>";
    }
    //Đóng kết nối
    $con->close();
    
?>