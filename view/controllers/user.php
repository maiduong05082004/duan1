<?php   
ob_start();
include "view/header.php";
include "model/Sanpham.php";
include "model/taikhoan.php";
include "model/cart.php";
$spnew = loadall_sanpham_home();
include "view/slide.php";
include "addtocart.php";
?>