<?php
include "client/controllers/user.php";
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = array();
}
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $onesp = loadone_sanpham($_GET['idsp']);
                $sp_cung_loai = load_sanpham_cungloai($_GET['idsp'], $onesp['genre_id']);
                // $binhluan = load_binhluan($_GET['idsp']);
                include "client/products/chitietsp.php";
            } else {
                include "client/layout/home.php";
            }

            break;
        case 'sanpham':
            if (isset($_POST['listok']) && ($_POST['listok'] != 0)) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = "";
                $iddm = 0;
            }
            $dssp = loadall_product($kyw, $iddm);
            $tendm = loadall_genre();
            include 'client/products/sanpham.php';
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
            include "client/taikhoan/login.php";
            break;
            case "register":
                if (isset($_POST['addaccount']) && ($_POST['addaccount'])) {
                    $user = $_POST['nam'] ?? '';
                    $password = $_POST['password'] ?? '';
                    $confirm_password = $_POST['confirm_password'] ?? '';
                    $email = $_POST['email'] ?? '';
                    $accname = $_POST['accname'] ?? '';
                    $role = $_POST['role'] ?? '2'; // 2 có thể là giá trị mặc định cho người dùng
                    $tel = $_POST['tel'] ?? '';
                    $address = $_POST['address'] ?? '';
                    if ($password !== $confirm_password) {
                        $thongbao = "Mật khẩu và mật khẩu xác nhận không khớp.";
                    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*]).{8,}$/", $password)) {
                        $thongbao = "Mật khẩu phải bao gồm ít nhất 8 ký tự, bao gồm chữ thường, chữ hoa, số và ký tự đặc biệt.";
                    } elseif (empty($user) || empty($password) || empty($email)) {
                        $thongbao = "Vui lòng nhập đủ thông tin bắt buộc.";
                    } else {   
                        insert_account_user($user, $password, $email,$accname, $tel, $address, $role);
                        $thongbao = "Thêm tài khoản thành công.";
                    }
                }
                include "client/taikhoan/register.php";
                break;
                case "accinfo":
                    if (isset($_POST['capnhapuser'])) {
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $tel = $_POST['tel'];
                        $id = $_SESSION['user']['acc_id'];
                
                        // Cập nhật thông tin tài khoản trong database
                        update_capnhat_tk($id, $name, $email, $address, $tel);
                
                        // Cập nhật thông tin trong session
                        $_SESSION['user']['acc_name'] = $name;
                        $_SESSION['user']['acc_email'] = $email;
                        $_SESSION['user']['acc_address'] = $address;
                        $_SESSION['user']['acc_tel'] = $tel;
                
                        // Chuyển hướng người dùng về trang thông tin cá nhân
                        header('Location: index.php?act=accinfo');
                        exit();
                    }
                    // Lấy thông tin tài khoản từ session để hiển thị
                    $list = $_SESSION['user'] ?? null;
                    include "client/taikhoan/accinfo.php";
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
            include "client/cart/addtocart.php";
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
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selected_items'])) {
                $selected_items = $_POST['selected_items'];
                // Tính tổng tiền các sản phẩm được chọn
                $tongdonhang = 0;
                foreach ($_SESSION['mycart'] as $productId => $cartItem) {
                    if (in_array($productId, $selected_items)) {
                        $tongdonhang += $cartItem['ttien'];
                    }
                }
                // Chuyển đến trang checkout và truyền thông tin đơn hàng
                $_SESSION['selected_items'] = $selected_items; // Lưu các sản phẩm đã chọn vào session để xử lý ở bước tiếp theo
                $_SESSION['tongdonhang'] = $tongdonhang; // Lưu tổng tiền vào session
                include "client/cart/checkout.php";
            } else {
                echo "<script>alert('Giỏ hàng trống hoặc không có sản phẩm nào được chọn!'); window.location = 'index.php?act=addtocart';</script>";
            }
            break;
        
            case "billcomfim":
                if (isset($_POST['dathangthanhcong']) && isset($_SESSION['selected_items'])) {
                    $selected_items = $_SESSION['selected_items'];
                    $tongdonhang = $_SESSION['tongdonhang'];
            
                    // Xử lý đơn hàng
                    if(isset($_SESSION['user'])) {
                        $iduser = $_SESSION['user']['acc_id'];
                        $name = $_POST['kh_ten'];
                        $email = $_POST['kh_email'];
                        $address = $_POST['kh_diachi'];
                        $tel = $_POST['kh_dienthoai'];
                        $pttt = $_POST['pttt'];
                        $status = $_POST['bill_status'];
                        $ngaydathang = date('Y-m-d H:i:s');
            
                        // Chèn thông tin đơn hàng vào cơ sở dữ liệu và lấy ID của đơn hàng mới
                        $idbill = insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang, $status);
            
                        // Chèn thông tin các sản phẩm được chọn vào cơ sở dữ liệu
                        foreach ($_SESSION['mycart'] as $productId => $cartItem) {
                            if (in_array($productId, $selected_items)) {
                                insert_cart(
                                    $iduser,
                                    $productId,
                                    $cartItem['name'],
                                    $cartItem['img'],
                                    $cartItem['price'],
                                    $cartItem['soluong'],
                                    $cartItem['ttien'],
                                    $idbill
                                );
                            }
                        }
            
                        // Xóa thông tin đơn hàng và sản phẩm đã chọn khỏi session
                        unset($_SESSION['selected_items']);
                        unset($_SESSION['tongdonhang']);
                        unset($_SESSION['mycart']);
            
                        // Tải thông tin đơn hàng để hiển thị
                        $bill = loadone_bill($idbill);
                        include "client/cart/billcomfim.php";
                    } else {
                        echo "<h3 class='text-center text-danger'>Tài khoản của khách hàng chưa đăng nhập chúng tôi sẽ gửi hóa đơn thanh toán cho quý khách qua email!</h3>";
                    }
                }
                break;
            
        

    case "mybill":
        $id=$_SESSION['user']['acc_id'];
        $listbilluser=loadone_bill_user($id);
        include "./client/taikhoan/mybill.php";
    break;
    case "mybillct":
        if (isset($_GET['idbill'])) {
            $idbill = $_GET['idbill'];
        }
        $listbilluser=loadone_bill_user($idbill);
        $listcartuser=loadall_cart_user($idbill);
        include "./client/taikhoan/mybillct.php";
        break;
    case "exit":
        session_unset();
        header('location:index.php?act=sanpham');
        break;
    default:
        include "client/layout/home.php";
    break;
    }
} else {
    include "client/layout/home.php";
}
if ($isAddToCartPage) {
    echo '<style>.none { display: none;}</style>';
}
include "client/layout/footer.php";
?>