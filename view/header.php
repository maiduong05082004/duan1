<?php
session_start();
include "model/pdo.php";
include "model/danhmuc.php";
$dsdm = loadall_genre();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Flone</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icons.min.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./taikhoan/style.css"> 
</head>
<body>
    <header class="header-area header-padding-1 sticky-bar header-res-padding clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-6 col-4">
                    <div class="logo">
                        <a href="index.php">
                            <img alt="" src="assets/img/logo/logo.png">
                        </a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 d-none d-lg-block">
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li><a href="index.php">Trang chủ </a></li>
                                <li><a href="shop.html"> Laptop <i class="fa fa-angle-down"></i> </a>
                                    <ul class="mega-menu">
                                        <li>
                                            <ul>
                                                <li>
                                                    <?php
                                                    foreach ($dsdm as $dm) {
                                                        extract($dm);
                                                        $linkdm = "index.php?act=sanpham&&iddm=" . $genre_id;
                                                        echo '<li class="mega-menu-title"><a href="' . $linkdm . '">' . $genre_name . '</a></li>';
                                                    }
                                                    ?>

                                            </ul>
                                        </li>

                                        <li>
                                            <ul>
                                                <li class="mega-menu-img"><a href="shop.html"><img src="upload/logo-thuong-hieu-stussy-10-elle-man.jpg" alt="" width="400px"></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                
                                <li><a>Phụ kiện</a></li>

                                <li><a href="about.html">Giới thiệu</a></li>
                                <li><a href="contact.html">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-6 col-8">
                    <div class="header-right-wrap">
                        <div class="same-style header-search">
                            <a class="search-active" href="#"><i class="pe-7s-search"></i></a>
                            <div class="search-content">
                                <form action="#">
                                    <input type="text" placeholder="Search" />
                                    <button class="button-search"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
                            extract($_SESSION['user']);
                        ?>
                            <div class="same-style account-satting">
                                <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>
                                <div class="account-dropdown">
                                    <ul>
                                        <li><a href="index.php?act=login"><?= $acc_user ?></a></li>
                                        <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                                        <li><a href="index.php?act=edit_taikhoan&id=<?= $acc_id ?>">Cập nhật tài khoản</a></li>
                                        <li><a href="#">Lịch sử giao dịch</a></li>
                                        <?php if ($role == 1) { ?>
                                            <li><a href="admin/index.php?act=thongke">Quản lý admin</a></li>
                                        <?php } ?>
                                        <li><a href="index.php?act=exit">Thoát</a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="same-style account-satting">
                                <a class="account-satting-active" href="#"><i class="pe-7s-user-female"></i></a>
                                <div class="account-dropdown">
                                    <ul>
                                        <li><a href="index.php?act=login">Đăng nhập</a></li>
                                        <li><a href="index.php?act=register">Đăng ký</a></li>
                                        <li><a href="index.php?act=quenmk">Quên mật khẩu</a></li>
                                    </ul>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="same-style header-wishlist">
                            <a href="wishlist.html"><i class="pe-7s-like"></i></a>
                        </div>
                        <div class="same-style cart-wrap">
                            <button class="icon-cart">
                                <i class="pe-7s-shopbag"></i>
                                <span class="count-style">02</span>
                            </button>

                            <div class="shopping-cart-content">
                                <ul>
                                    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="" src="assets/img/cart/cart-1.png"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="#">T- Shart & Jeans </a></h4>
                                            <h6>Qty: 02</h6>
                                            <span>$260.00</span>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fa fa-times-circle"></i></a>
                                        </div>
                                    </li>
                                    <li class="single-shopping-cart">
                                        <div class="shopping-cart-img">
                                            <a href="#"><img alt="" src="assets/img/cart/cart-2.png"></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="#">T- Shart & Jeans </a></h4>
                                            <h6>Qty: 02</h6>
                                            <span>$260.00</span>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fa fa-times-circle"></i></a>
                                        </div>
                                    </li>
                                </ul>
                                <div class="shopping-cart-total">
                                    <h4>Shipping : <span>$20.00</span></h4>
                                    <h4>Total : <span class="shop-total">$260.00</span></h4>
                                </div>
                                <div class="shopping-cart-btn btn-hover text-center">
                                    <a class="default-btn" href="index.php?act=cart">view cart</a>
                                    <a class="default-btn" href="checkout.html">checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>