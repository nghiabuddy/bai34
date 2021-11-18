<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('location: Bai2_dangnhap.html');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" type="text/css" href="./css/menu.css" media="screen" />
<title>Danh sách sản phẩm</title>
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
    <h2>DANH SÁCH SẢN PHẨM</h2>
<?php
            //$sp=$_COOKIE['idsp'];
            $username=$_COOKIE['username'];
            //$ids=$row['idsp'];
            $con = new mysqli("localhost", "root", "", "buoi3");
            //include "connect.php";
            $con->set_charset("utf8");
            $sql="SELECT hinhsp, idsp, tensp FROM sanpham,thanhvien WHERE (thanhvien.id=sanpham.idtv AND tendangnhap='$username' )";
            
            $sql1="SELECT tendangnhap FROM sanpham,thanhvien WHERE (thanhvien.id=sanpham.idtv AND tendangnhap='$username' )";

            $sql2="SELECT hinhsp, idsp, tensp FROM sanpham,thanhvien WHERE (thanhvien.id=sanpham.idtv AND tendangnhap='$username' )";

            $sql3="SELECT hinhsp, idsp, tensp FROM sanpham,thanhvien WHERE (thanhvien.id=sanpham.idtv AND tendangnhap='$username' )";

            $result1=$con->query($sql1); 
            $result=$con->query($sql);
            $result2=$con->query($sql2);
            $result3=$con->query($sql3);
        ?>
         <?php 
                while ($row=$result->fetch_assoc()){
        ?>
<div class="mySlides">
  <img id="laptopImg" src="<?php echo $row['hinhsp']; ?>" style="width:30%">
</div>
<?php
}
?>
 <div class="button">
                    <input type="button" name="previous" value="Previous" onclick="plusSlides(-1)">
                    <input type="button" name="next" value="Next" onclick="plusSlides(1)">
                    <br/>
                    <form method="GET">
                      <select id="img" name="laptopSel" onchange="chooseSlide(value)">
                        <?php 
                while ($row=$result2->fetch_array()){ 
                    $ID=$row['idsp'];
                    $TEN=$row['tensp'];
                    $ANH=$row['hinhsp'];
                  ?>
        <option value="<?php echo $ID; ?>"><?php echo $TEN; ?></option>
      <?php
}
?>
</select>
</div>  
</div>
<br>
</form>
<script>
    var images = [];
       <?php 
                while ($row=$result3->fetch_array()){  
                  $masp=$row['idsp'];
                  $hinh=$row['hinhsp'];
                  ?>
                    images[ <?php echo "$masp"; ?> ] = "<?php echo "$hinh"; ?>";
                    <?php
                  }
                  ?>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slides[slideIndex-1].style.display = "block";  
  
}
function chooseSlide(pos) {
          var laptopImg = document.getElementById("img");
          laptopImg.src = images[pos];
          
      }
</script>
<div id="footer">
            <p>Họ tên SV: Chung Hiếu Nghĩa <br/> Email: nghiab1805642@student.ctu.edu.vn</p>
        </div>
</body>
</html> 
