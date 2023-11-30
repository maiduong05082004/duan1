<?php
include "view/controllers/user.php";
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = array();
}
$isAddToCartPage = isset($_GET['act']) && ($_GET['act'] == 'addtocart' || $_GET['act'] == 'bill');
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
        case "addtocart":
            if (isset($_POST['addtocart']) && ($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $cleaned_price = str_replace(array('.', '₫'), '', $price);
                $priceNumber = intval($cleaned_price);
                $quantity = $_POST['quantity'];
        
                // Check if the product is already in the cart
                if (isset($_SESSION['mycart'][$id])) {
                    // If it is, update the quantity
                    $_SESSION['mycart'][$id]['soluong'] += $quantity;
                    $_SESSION['mycart'][$id]['ttien'] = $_SESSION['mycart'][$id]['soluong'] * $priceNumber;
                } else {
                    // If it's not, add it as a new entry
                    $_SESSION['mycart'][$id] = [
                        'name' => $name,
                        'img' => $img,
                        'price' => $priceNumber,
                        'soluong' => $quantity,
                        'ttien' => $quantity * $priceNumber
                    ];
                }
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
        case "bill":
        if (empty($_SESSION['mycart'])) {
            // Giỏ hàng trống
            echo "<script>alert('Giỏ hàng trống, vui lòng chọn sản phẩm!'); window.location = 'index.php?act=addtocart';</script>";
        } else {
            include "checkout.php";
        }
        break;
        // case "billcomfim1":
        //     if (isset($_POST['btnDatHang']) && ($_POST['btnDatHang'])) {
        //         $name = $_POST['kh_ten'];
        //         $email = $_POST['kh_email'];
        //         $address = $_POST['kh_diachi'];
        //         $tel = $_POST['kh_dienthoai'];
        //         $pptt = $_POST['pttt'];
        //         $ngaydathang = date('h:i:sa d/m/Y');
        //         $tongdonhang = tongdonhang();
        
        //         // Thực hiện truy vấn để chèn dữ liệu đơn hàng vào cơ sở dữ liệu
        //         $idbill = insert_bill($name, $email, $address, $tel, $pptt, $ngaydathang, $tongdonhang);
        //         var_dump($idbill);
        //         exit;
        //         // Lặp qua các sản phẩm trong giỏ hàng và chèn chúng vào cơ sở dữ liệu
        //         foreach ($_SESSION['mycart'] as $productId => $cartItem) {
        //             insert_cart(
        //                 $_SESSION['user']['id'],
        //                 $productId,
        //                 $cartItem['name'],
        //                 $cartItem['img'],
        //                 $cartItem['price'],
        //                 $cartItem['soluong'],
        //                 $cartItem['ttien'],
        //                 $idbill
        //             );
        //         }
        
        //         // Xóa session sau khi đã xử lý đơn hàng thành công
        //         $_SESSION = [];
        
        //         // Chuyển hướng hoặc hiển thị thông báo thành công
        //         // hoặc: echo "Đặt hàng thành công!";
        //         exit;
        //     }
        //     include "billcomfim.php";
            // break;
            // case "billcomfim2":
            //     if (isset($_POST['dathangthanhcong']) && ($_POST['dathangthanhcong'])) {
            //         $name=$_POST['kh_ten'];
            //         $email=$_POST['kh_email'];
            //         $address=$_POST['kh_diachi'];
            //         $tel=$_POST['kh_dienthoai'];
            //         $pttt=$_POST['pttt'];
            //         $ngaydathang=date("h:i:s a d-m-y");
            //         $tongdonhang=tonghoadon();
            //         $idbill = insert_bill($name, $email, $address, $tel, $pptt, $ngaydathang, $tongdonhang);

            //         foreach ($_SESSION['mycart'] as $productId => $cartItem) {
            //             insert_cart(
            //                 $_SESSION['user']['id'],
            //                 $productId,
            //                 $cartItem['name'],
            //                 $cartItem['img'],
            //                 $cartItem['price'],
            //                 $cartItem['soluong'],
            //                 $cartItem['ttien'],
            //                 $idbill
            //             );
            //         }
            //     }
            //     $listbill=loadone_bill($idbill);
            //     include "billcomfim.php";
            // break;
            // Phần này thuộc file index.php
// Phần này thuộc file index.php
case "billcomfim":
    if (isset($_POST['dathangthanhcong'])) {
        // Tiến hành lấy dữ liệu từ form và gán vào các biến
        $name = $_POST['kh_ten'];
        $email = $_POST['kh_email'];
        $address = $_POST['kh_diachi'];
        $tel = $_POST['kh_dienthoai'];
        $pttt = $_POST['pttt'];
        $ngaydathang = date('Y-m-d H:i:s'); // Định dạng datetime cho SQL
        $tongdonhang = tongdonhang()['numeric']; // Lấy giá trị số
   
        // Chèn thông tin đơn hàng vào cơ sở dữ liệu và lấy ID của đơn hàng mới
        $idbill = insert_bill($name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang);
        if (isset($_SESSION['user']['acc_id'])) {
            foreach ($_SESSION['mycart'] as $productId => $cartItem) {
                insert_cart(
                    $_SESSION['user']['acc_id'],
                    $productId,
                    $cartItem['name'],
                    $cartItem['img'],
                    $cartItem['price'],
                    $cartItem['soluong'],
                    $cartItem['ttien'],
                    $idbill
                );
            }
        } else {
            // Xử lý khi không tìm thấy user_id (có thể chuyển hướng người dùng về trang đăng nhập, hiển thị thông báo, hoặc thực hiện các hành động khác)
            echo "Không tìm thấy thông tin đăng nhập!";
        }

        // Xóa thông tin giỏ hàng từ session sau khi đã xử lý xong đơn hàng
        // unset($_SESSION['mycart']);
        $bill = loadone_bill($idbill);
        include "billcomfim.php";

    }
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