<?php
$kt ="";
$q = $_REQUEST["q"];
//$q=$_POST['q'];
$con = new mysqli("localhost", "root", "", "buoi3");
            //include "connect.php";
            $con->set_charset("utf8");
            $sql="SELECT tendangnhap FROM thanhvien WHERE (tendangnhap='$q')";
            $result=$con->query($sql);

  if($row=$result->fetch_assoc()>0) {
        $kt = "Tên đăng nhập đã tồn tại";
      } else {
        $kt = "Tên đăng nhập có thể sử dụng";
      }
echo $kt;
?>