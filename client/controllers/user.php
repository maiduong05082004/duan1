<?php   
ob_start();
include "client/layout//header.php";
include "model/Sanpham.php";
include "model/taikhoan.php";
include "model/comment.php";
include "model/cart.php";
$spnew = loadall_sanpham_home();
$tendm = loadall_genre();
include "client/layout/slide.php";
include "addtocart.php";
date_default_timezone_set('Asia/Ho_Chi_Minh'); 
include "layout.php";
?>