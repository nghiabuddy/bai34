<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: Bai2_dangnhap.html');
}
header('Cache-Control:no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires:0');

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta value="viewport" content="width=device-width, initial-scale=1" rel="alternate" media="only screen and (max-width: 640px)" />
    <link href="./css/menu.css" rel="stylesheet" type="text/css" />
    <title>Sửa sản phẩm</title>
    <style>
        h1 {
            color: red
        }
        
        h1 {
            margin-left: 40px;
        }
        
        .main {
            background-color: lightgrey;
            width: 380px;
            border: 15px white;
            outline: 1px solid black;
            outline-offset: 15px;
            padding: 30px;
            margin: 20px
        }
    </style>
</head>
    <body>
     <ul>
        <li><a href="#">Bài Tập</a></li>

        <li class="dropdown">
            <a class="dropbtn">Buổi 1</a>
            <div class="dropdown-content">
                <a href="buoi1/bai1.html">Bài 1</a>
                <a href="buoi1/bai2.html">Bài 2</a>
                <a href="buoi1/bai3.html">Bài 3</a>
            </div>
        </li>
        <li class="dropdown">
            <a class="dropbtn">Buổi 2</a>
            <div class="dropdown-content">
                <a href="Buoi2_Bai2/bai1.html">Bài 1</a>
                <a href="Buoi2_Bai2/div.html">Bài 2</a>
                <a href="Buoi2_Bai3/index.html">Bài 3</a>

            </div>
        </li>
        <li class="dropdown">
            <a class="dropbtn">Buổi 3</a>
            <div class="dropdown-content">
                <a href="./Bai1_dangky.html">Bài 1-Đăng kí</a>
                <a href="./Bai2_dangnhap.html">Bài 2-Đăng nhập</a>
                <a href="./Bai3_themsp.php">Bài 3-Thêm sản phẩm</a>
                <a href="./Bai4_danhsachsp.php">Bài 4-Danh sách sản phẩm</a>
            </div>
        </li>
        <li class="dropdown">
            <a class="dropbtn">Buổi 4</a>
            <div class="dropdown-content">
                <a href="./Bai1_dangky.html">Bài 1-Đăng kí</a>
                <a href="./Bai2_dangnhap.html">Bài 1-Đăng nhập</a>
                <a href="./Buoi4_Bai2.html">Bài 2-Slider</a>
                <a href="./Buoi4_Bai3.html">Bài 3-Timer</a>
                <a href="./Buoi4_Bai4.php">Bài 4-Images from database</a>
            </div>
        </li>
        <li class="dropdown">
            <a class="dropbtn">Buổi 5</a>
            <div class="dropdown-content">
                <a href="#">Bài 1</a>
                <a href="#">Bài 2</a>
                <a href="#">Bài 3</a>
                <a href="#">Bài 4</a>
            </div>
        </li>
    </ul>
    <br>
    <?php
    $id=$_GET['idsp'];
    $username=$_SESSION['username'];
$con = new mysqli("localhost", "root", "", "buoi3");
//include "connect.php";
$sql="SELECT idsp,tensp,giasp,tendangnhap,chitietsp,hinhsp FROM sanpham,thanhvien WHERE idsp='$id' AND tendangnhap='$username'";
$result=$con->query($sql);
$con->set_charset("utf8");
        ?>
    <p>
        Chung Hiếu Nghĩa
    </p>
    <p>
        B1805642
    </p>
        <h1>Sửa sản phẩm</h1>
        <div class="main">
            <table>
                <form action="suasp_xuly.php" method="POST" enctype="multipart/form-data">
              <?php  
               while ($row=$result->fetch_array()){ 
                ?>
             
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td><input type="text" value="<?php echo $row['tensp']; ?>" name="tensp"><br></td>
                    </tr>
                    <tr>
                        <td>Chi tiết sản phẩm</td>
                        <td><textarea rows="10" cols="30" name ="chitiet"> <?php echo $row['chitietsp']; ?> </textarea><br></td>

                    </tr>
                    <tr>
                        <td>Giá sản phẩm</td>
                        <td><input type="text" value="<?php echo $row['giasp']; ?>" name="giasp">(VND)</td>
                    </tr>
                    <tr>
                        <td>Hình đại diện</td>
                        <td>
                            <input type="file" id="file" name ="file" value="<?php echo $row['hinhsp']; ?>" multiple>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <!-- type="submit" -->
                            <input type="submit" name="update" value="Cập nhật" >
                        </td>
                    </tr>
                   <?php
               } 
               ?>
                </form>
        </div>
        </table>
     <?php

      $con->close(); 

      ?>

    </body>

</html>