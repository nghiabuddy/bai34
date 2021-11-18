<?php
    session_start();
    if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){
        unset($_SESSION['username']);
       header("location: Bai2_dangnhap.html");
    }
    //unset($_COOKIE['username']);
    //unset($_COOKIE['passwd']);
    header('Cache-Control:no-cache, no-store, must-revalidate');
    header('Pragma: no-cache');
    header('Expires:0');
?>