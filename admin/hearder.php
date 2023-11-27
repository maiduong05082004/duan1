<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3pV0fGzddrjrtQb-ufTh5bebIwVDLqh7NJ00zpsr1zT1uoRBaoC3tPyX6r" crossorigin="anonymous">

<!-- Bootstrap JS and its dependencies (including Popper.js and jQuery) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="script.js"></script>
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="menu-container">
        <div class="left-menu">
            <div class="menu-logo">
                <a href="../index.php?act=home">
                    <img src="../upload/logo.png" alt="Logo" />
            </div>
            </a>
        </div>
        <nav class="menu-nav">
            <ul>

                <li><a href="../index.php?act=home">Home</a></li>
                <li class="dropdown">
                    <a href="index.php?act=showaccount">Tài khoản</a>
                    <ul class="submenu">
                        <li><a href="index.php?act=addaccount">Thêm tài khoản</a></li>
                        <li><a href="index.php?act=showcomment">Comment</a></li>
                        <li><a href="#">Thống Kê</a></li>
                    </ul>
                </li>
                <li><a href="index.php?act=showmovie">Quản lý phim</a></li>
                <li><a href="index.php?act=thongke">Thống kê</a></li>
            </ul>
        </nav>
    </div>