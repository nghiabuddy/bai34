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
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" rel="alternate" media="only screen and (max-width: 640px)" />
    <link href="./css/info.css" rel="stylesheet" type="text/css" />
    <title>Chi tiết sản phẩm</title>
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
            <a href="./Bai1_dangky.html">Bài 1-Existed User</a>
                <a href="./Bai4_danhsachsp.php">Bài 2-Product's Details</a>
                <a href="./Bai4_danhsachsp.php">Bài 3-Popup Image</a>
                <a href="./Bai4_danhsachsp.php">Bài 4-Livesearch</a>
            </div>
        </li>
    </ul>
    <br>
<p>
        Chung Hiếu Nghĩa
    </p>
    <p>
        B1805642
    </p>
        <?php
         $id=$_GET['idsp'];
           $user=$_SESSION['username'];
         //  while ($row=$sql1->fetch_array()){
           //    $id="$row[idsp]";
         //  }

            $con = new mysqli("localhost", "root", "", "buoi3");
            //include "connect.php";
            $con->set_charset("utf8");
            $sql="SELECT tendangnhap, idsp, tensp, chitietsp, giasp, hinhsp FROM thanhvien, sanpham WHERE idsp='$id' AND tendangnhap='$user'";
            $result=$con->query($sql);
           
        ?>
        <h1>
            Chi tiết sản phẩm
        </h1>
        <table id="main2" align ="center"> 
            <?php
                while ($row=$result->fetch_assoc()){ ?>
                <tr>
                    <th colspan=2>Chào bạn <?php echo $row['tendangnhap']; ?></th>
                    </tr>
                    <tr>
                        <td id='image'><img src=" <?php echo $row['hinhsp']; ?>" width=75%></td>
                        <td id='line'>
                            <p>STT:<?php echo $row['idsp']; ?></p>
                            <p>Tên sản phẩm:<?php echo $row['tensp']; ?></p>
                            <p>Chi tiết sản phẩm:<?php echo $row['chitietsp']; ?></p>
                            <p>Giá sản phẩm:<?php echo $row['giasp']; ?> VND</p>
                            <br>
                            <?php  } ?>
                            <a href='./dangxuat.php'> <input type='submit' value='Đăng xuất'> </a>
                        </td>
                </tr>
             
        </table>
        <center>
        <a href='./Bai4_danhsachsp.php'> <input type='submit' value='Quay lại'> </a>
                </center>
        <?php $con->close(); ?>
</body>

</html>