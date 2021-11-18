<?php
        session_start();
        if (!isset($_SESSION['username'])) {
            header('location: Bai2_dangnhap.html');
        }
    ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" rel="alternate" media="only screen and (max-width: 640px)" />
    <link href="./css/info.css" rel="stylesheet" type="text/css" />
    <title>Thông tin cá nhân</title>
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
        header('Cache-Control:no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires:0');
            $username=$_COOKIE['username'];
            $passwd = $_COOKIE['pass'];
            $pass=md5($passwd);
            $con = new mysqli("localhost", "root", "", "buoi3");
            //include "connect.php";
            $con->set_charset("utf8");
            $sql="SELECT tendangnhap, gioitinh, nghenghiep, sothich, hinhanh  FROM thanhvien WHERE (tendangnhap='$username')";
            $result=$con->query($sql);
        ?>
        <h1>
            Thông tin cá nhân
        </h1>
        <table id="main2" align ="center"> 
            <?php
                while ($row=$result->fetch_assoc()){
                    echo "<tr>
                    <th colspan=2>Chào bạn ".$row['tendangnhap']."!</th>
                    </tr>
                    <tr>
                        <td id='image'><img src='".$row['hinhanh']."'width=75% align=center></td>
                        <td id='line'>
                            <p>Tên đăng nhập: ".$row['tendangnhap']."</p>
                            <p>Giới tính: ".$row['gioitinh']."</p>
                            <p>Nghề nghiệp: ".$row['nghenghiep']."</p>
                            <p>Sở thích: ".$row['sothich']."</p>
                            <br>
                            <a href='./dangxuat.php'> <input type='submit' value='Đăng xuất'> </a>
                        </td>
                    </tr>";
                }
            ?>
        </table>
      <br>
    <center>
          <a href="./Bai3_themsp.php" > <button name="button" type="button">Thêm sản phẩm</button> </a> 
          <br>
          <br>
         <a href="./Bai4_danhsachsp.php" > <button name="button" type="button">Danh sách sản phẩm</button> </a> 
         <br>
         <br>
         <a href="./Buoi4_Bai4.php" > <button name="button" type="button">Danh sách sản phẩm (Slide Show)</button> </a> 
      </center>
      <br>
    <footer>
        <table>
            <div class="lienhe">
                <table>
                    <tr align="center">
                        <td>
                            <a href="https://www.facebook.com/hieunghia15" target="blank">
                                <img src="./image/facebook.png" alt="facebook" width="10%"></a>
                        </td>
                        <td>
                            <a href="https://www.instagram.com/n_nghiabuddy/" target="blank">
                                <img src="./image/instagram.png" alt="Instagram" width="10%"></a>
                        </td>
                        <td>
                            <a href="https://twitter.com/nghia_buddy" target="blank">
                                <img src="./image/twitter.png" alt="Twitter" width="10%"></a>
                        </td>

                    </tr>
                </table>
            </div>
            <p><strong>
                <center>© 2021 Copyright | Design by Nghia Buddy</center>
            </strong></p>
            </tr>
            </div>
        </table>
    </footer>
</body>

</html>