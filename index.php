<?php
ob_start();
include "view/header.php";
include "model/Sanpham.php";
include "model/taikhoan.php";
$spnew = loadall_sanpham_home();
include "view/slide.php";
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = array();
}
$isAddToCartPage = isset($_GET['act']) && $_GET['act'] == 'addtocart';
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $onesp = loadone_sanpham($_GET['idsp']);
                $sp_cung_loai = load_sanpham_cungloai($_GET['idsp'], $onesp['genre_id']);
                // $binhluan = load_binhluan($_GET['idsp']);
                include "view/chitietsp.php";
            } else {
                include "view/home.php";
            }

            break;
        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != 0)) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {

                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include 'view/home.php';
            break;
        case "register":
            if (isset($_POST['addaccount']) && ($_POST['addaccount'])) {

                $user = $_POST['nameaccount'] ?? '';
                $password = $_POST['password'] ?? '';
                $email = $_POST['email'] ?? '';
                $role = $_POST['role'];
                $tel = $_POST['tel'];
                $address = $_POST['address'];
                if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]).{8,}$/", $password)) {
                    $thongbao = "Mật khẩu phải bao gồm ít nhất 8 ký tự, bao gồm chữ thường, chữ hoa, số và ký tự đặc biệt.";
                } elseif (empty($user) || empty($password) || empty($email)) {
                    $thongbao = "Vui lòng nhập đủ thông tin bắt buộc.";
                } else {

                    insert_account_user($user, $password, $email, $tel, $address, $role);
                    $thongbao = "thêm tài khoản thành công";
                }
            }
            include "view/taikhoan/register.php";
            break;
        case "login":
            if (isset($_POST['loginaccount']) && ($_POST['loginaccount'])) {
                $user = $_POST['nameaccount'];
                $password = $_POST['password'];
                $checkuser = checkuser($user, $password);
                if (is_array($checkuser)) {
                    // Nếu đăng nhập thành công, lưu thông tin người dùng vào phiên làm việc
                    $_SESSION['user'] = $checkuser;
                    header('location:index.php?act=home');
                } else {
                    $thongbao = "Tài khoản hoặc mật khẩu không đúng!";
                }
            }
            include "view/taikhoan/login.php";
            break;
            include "view/cart.php";
            break;
        case "addtocart":
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id=$_POST['id'];
                $name=$_POST['name'];
                $img=$_POST['img'];
                $price=$_POST['price'];
                $cleaned_price = str_replace(array('.', '₫'), '', $price);
                $number = intval($cleaned_price);
                $soluong=$_POST['quantity'];
                $ttien=$soluong*$number;
                $spadd=[$id,$name,$img,$number,$soluong,$ttien];
                array_push($_SESSION['mycart'],$spadd);
            }
            include "addtocart.php";
            break;
        case "delcart":
            if(isset($_GET['idcart']))  {
                array_splice($_SESSION['mycart'],$_GET['idcart'],1);
            }else{
                $_SESSION['mycart']=[];
            }
            header('location:index.php?act=addtocart');
        break;
        case "bill";
        
        break;
        case "exit":
            session_unset();
            header('location:index.php?act=sanpham');
            break;
        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
if ($isAddToCartPage) {
    echo '<style>.none { display: none;}</style>';
}
include "view/footer.php";
?>