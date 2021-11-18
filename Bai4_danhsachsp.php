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
    <meta name="viewport" content="width=device-width, initial-scale=1" rel="alternate" media="only screen and (max-width: 640px)" />
    <link href="./css/menu.css" rel="stylesheet" type="text/css" />
    <title>Danh sách sản phẩm</title>
    <script>
    //GET SP
    function showSp(str) {
        if (str == "") {
        document.getElementById("tmp").innerHTML = "";
        return;
    } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("tmp").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","get_product.php?q="+str,true);
    xmlhttp.send();
  }
}
//LIVESEARCH
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function(){
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
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
            //$sp=$_COOKIE['idsp'];
            //$username=$_COOKIE['username'];
            $username=$_SESSION['username'];
            //$ids=$row['idsp'];
            $con = new mysqli("localhost", "root", "", "buoi3");
            //include "connect.php";
            $sql1="SELECT tendangnhap, idsp, tensp, chitietsp, giasp, hinhsp FROM sanpham,thanhvien WHERE 
            thanhvien.id=sanpham.idtv AND tendangnhap='$username' 
            ORDER BY idsp DESC
            LIMIT 2";
//SẮP XẾP MỚI NHẤT
            $result1=$con->query($sql1);
            
        ?>
        <div class="daumuc" align="center">
        <h1>Danh sách sản phẩm </h1>
        <p>Tìm kiếm</p>
        <input type="text" size="30" onkeyup="showResult(this.value)">
            <div id="livesearch"></div>
            <br>
        </div>
        
        <div class="main" align="center">
        <form method="GET" enctype="multipart/form-data">
            <table border="1px">
        <tr>

        <tr>
        
        <th colspan="7">Danh sách sản phẩm của bạn là:</th>
    </tr>
       
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th colspan="4">Lựa chọn</th>
        </tr>
        <?php 
                while ($row=$result1->fetch_assoc()){
        ?>
    <tr>
        <th><?php echo $row['idsp']; ?></th>
        <td><?php echo $row['tensp']; ?></td>
        <td><?php echo $row['giasp']; ?> VND</td>
        <td >
        <a href="chitiet.php?idsp=<?php echo $row['idsp']; ?>" > Xem chi tiết 1 </a>
        </td>
        <td>
        <a href="#"  onclick="showSp(<?php echo $row['idsp']; ?>)"> Xem chi tiết 2 </a>
        </td>
        <td>
        <a href="sua.php?idsp=<?php echo $row['idsp']; ?>"><img src="./icon/edit.png" alt="edit" width="32" height="32"></td>
        <td>
        <a href="xoa.php?idsp=<?php echo $row['idsp']; ?>"><img src="./icon/delete.png" alt="edit" width="32" height="32"></a>
        </td>
    </tr>
    <?php
}
?>
    <tr>
    <td colspan=7>
    <center>
             <a href="./dangxuat.php" > <button name="button" type="button">Đăng Xuất</button> </a> 
    </center>
    </td>
    </tr>
                </tr>
                </form>
        </div>
        </table>
        <br>
        <div id="tmp">
            
        </div>
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
