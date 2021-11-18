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
    <link href="./css/info2.css" rel="stylesheet" type="text/css" />
</head>

<body>
        <?php
         //$id=$_GET['idsp'];
         $q = $_REQUEST["q"];
           $user=$_SESSION['username'];
         //  while ($row=$sql1->fetch_array()){
           //    $id="$row[idsp]";
         //  }
            $con = new mysqli("localhost", "root", "", "buoi3");
            //include "connect.php";
            $con->set_charset("utf8");
            $sql="SELECT tendangnhap, idsp, tensp, chitietsp, giasp, hinhsp FROM thanhvien, sanpham WHERE idsp='$q' AND tendangnhap='$user'";
            $result=$con->query($sql);
           
        ?>
        <h1>
            Chi tiết sản phẩm
        </h1>
        <table id="main2"> 
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
                        </td>
                </tr>
             
        </table>
      
        <?php $con->close(); ?>
</body>

</html>