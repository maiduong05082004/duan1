<?php   
ob_start();
session_start();
// include "model/payment.php";
include "model/pdo.php";
include "model/danhmuc.php";
$dsdm = loadall_genre();
include "client/layout/header.php";
include "model/Sanpham.php";
include "model/taikhoan.php";
include "model/comment.php";
include "model/cart.php";
include "model/wishlist.php";
$spnew = loadall_sanpham_home();
$tendm = loadall_genre();
include "client/layout/slide.php";
include "addtocart.php";
date_default_timezone_set('Asia/Ho_Chi_Minh'); 
include "layout.php";

?>