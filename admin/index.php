<?php
ob_start();
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 1 && $_SESSION['user']['role'] != 2) {
    header('Location: ../index.php?act=login');
    exit;
}
include "controllers/admin.php";
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case "showaccount":
            checkAdminRole();
            if (isset($_POST["listok"]) && $_POST["listok"]) {
                $kyw = $_POST["kyw"];
            } else {
                $kyw = '';
            }
            $listaccount = loadall_account_user($kyw);
            include "Account/show_account.php";
            break;
        case "showadmin":
            checkAdminRole();
            if (isset($_POST["listok"]) && $_POST["listok"]) {
                $kyw = $_POST["kyw"];
            } else {
                $kyw = '';
            }
            $listaccount = loadall_account_admin($kyw);
            include "Account/show_admin.php";
            break;
        case "accinfo":
            if (isset($_POST['capnhapuser'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_SESSION['user']['acc_id'];

                // Cập nhật thông tin tài khoản trong database
                update_capnhat_admin($id, $name, $email, $address, $tel);

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
            include "Account/accinfo.php";
            break;
        case "addaccount":
            checkAdminRole();
            if (isset($_POST["addaccount"]) && ($_POST["addaccount"])) {
                $firstName = $_POST['firstname'];
                $lastName = $_POST['lasttname'];
                $fullName = $firstName . ' ' . $lastName ?? '';
                $user = $_POST['nameaccount'] ?? '';
                $password = $_POST['password'] ?? '';
                $email = $_POST['email'] ?? '';
                $tel = $_POST['tel'];
                $address = $_POST['address'];
                $role = $_POST['role'] ?? '';
                if (empty($firstName) || empty($lastName) || empty($user) || empty($password) || empty($email)) {
                    $thongbao = "Vui lòng nhập đủ thông tin bắt buộc.";
                } else {
                    insert_account($user, $password, $email, $tel, $address, $fullName,  $role);
                    $thongbao = "thêm tài khoản thành công";
                }
            }
            include "Account/add_account.php";
            break;
        case "updateaccount":
            checkAdminRole();
            if (isset($_POST['acc_id'])) {
                $id = $_GET['acc_id'];
                $account = check_account_user($id);
            }
            include "Account/update_account.php";
            break;
        case 'editkh':
            checkAdminRole();
            if (isset($_POST['btn_updatekh'])) {
                $id = $_POST['id'];
                $user = $_POST['nameaccount'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $role = $_POST['role'];
                $name = $_POST['name'];
                $password = $_POST['password'];
                update_account_user($id, $user, $password, $email, $tel, $address, $name, $role);
                $thongbao = "Sửa thành công";
            }
            $listaccount = loadall_account_user($kyw = "");
            require 'Account/show_account.php';
            break;
        case "block":

            $id = $_GET['acc_id'];
            block_account_user($id);
            header('location: index.php?act=showaccount');

            break;
        case "unblock":

            $id = $_GET['acc_id'];
            unblock_account_user($id);
            header('location: index.php?act=showaccount');

            break;
        case 'xoaaccount':
            $id = $_GET['acc_id'];
            delete_account_admin($id);
            $listaccount = loadall_account_user($kyw = "");
            $thongbao = "Xóa thành công";
            include 'Account/show_account.php';
            break;
        case 'showcomment':
            $listcomment = loadall_comment();
            include "Account/comment_account.php";
            break;
        case 'showcommentofid':
            checkAdminRole();
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $product_id = $_GET['product_id'];
                $listcomment = loadall_comment_by_product_id($product_id);

                if (count($listcomment) > 0) {
                    include "Account/comment_account.php";
                } else {
                    echo "<h1>Sản phẩm không có bình luận</h1>";
                }
            } else {
                echo "ID sản phẩm không hợp lệ";
            }
            break;

        case 'xoacomment':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_comment($_GET['id']);
            }
            $listcomment = loadall_comment();
            include "Account/comment_account.php";
            break;
        case "adddm":
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "thêm thành công";
            }
            include "genre/add_genre.php";
            break;
        case "listdm":
            $listdanhmuc = loadall_danhmuc();
            include "genre/show_genre.php";
            break;
        case "xoadm":
            if (isset($_GET['genre_id']) && ($_GET['genre_id'] > 0)) {
                delete_danhmuc($_GET['genre_id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "genre/show_genre.php";
            break;
        case "suadm":
            if (isset($_GET['genre_id']) && ($_GET['genre_id'] > 0)) {
                $dm = loadone_danhmuc($_GET['genre_id']);
            }
            include "genre/update_genre.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "genre/show_genre.php";
            break;
        case 'addsp':
            //kiểm tra xem người dùng có nhấn nút add hay không
            if (isset($_POST["themmoi"]) && ($_POST["themmoi"])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $view = $_POST['view'];
                $soluong = $_POST['soluong'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }

                insert_product($tensp, $giasp, $hinh, $mota, $soluong, $view, $iddm);
                $thongbao = "thêm sản phẩm thành công";
            }
            $listdanhmuc = loadall_danhmuc();

            include "product/add_product.php";
            break;
        case 'listsp':
            if (isset($_POST["listok"]) && ($_POST["listok"])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_product($kyw, $iddm);

            include "product/show_product.php";
            break;


        case "xoasp":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_product($_GET['id']);
            }
            $kyw = ''; // Truyền giá trị mặc định cho $kyw
            $iddm = 0; // Truyền giá trị mặc định cho $iddm
            $listsanpham = loadall_product($kyw, $iddm);
            include "product/show_product.php";
            break;
        case "suasp":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include "product/update_product.php";
            break;
        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $genre_id = $_POST['iddm'];
                $name = $_POST['tensp'];
                $price = $_POST['giasp'];
                $content = $_POST['mota'];
                $soluong = $_POST['soluong'];
                $view = $_POST['view'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);

                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }

                update_sanpham($id, $name, $price, $hinh, $content, $soluong, $view, $genre_id);
                $thongbao = "Cập nhật thành công";
            }
            $kyw = ''; // Truyền giá trị mặc định cho $kyw
            $iddm = 0; // Truyền giá trị mặc định cho $iddm
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_product($kyw, $iddm);

            include "sanpham/list.php";
        case "home":
            include "./layout/home.php";
            break;
        case "bieudosp":
            $listsanpham = loadall_sp_of_genre();
            include "./product/bieudo.php";
            break;
        case "thongkepage":
            checkAdminRole();
            $doanhthu = tongdoanhthutheongay();
            $tonghangban = tonghangdaban();
            include "./thongke/thongkepage.php";
            break;
        case "showbill":
            checkAdminRole();
            $list_of_bills = loadbill();
            include "./bill/showbill.php";
            break;
        case "updatebill":
            checkAdminRole(); // Kiểm tra quyền Admin
            if (isset($_POST['idbill']) && isset($_POST['status'])) {
                $idbill = $_POST['idbill'];
                $status = $_POST['status'];
                // Cập nhật trạng thái của hóa đơn
                $sql = "UPDATE bill SET bill_status = ? WHERE idbill = ?";
                pdo_execute($sql, $status, $idbill);
                echo "Cập nhật trạng thái thành công";
            } else {
                echo "Thông tin không hợp lệ";
            }
            exit;
            break;
        case "billct":
        case "mybillct":
            if (isset($_GET['idbill'])) {
                $idbill = $_GET['idbill'];
            }
            $listbilluser = loadone_bill_user($idbill);
            $listcartuser = loadall_cart_user($idbill);
            include "./bill/billct.php";
            break;
        case "exit":
            session_unset();
            session_destroy();
            header('location:index.php');
            exit;
            break;
    }
} else {
    include "layout/home.php";
}

include "layout/footer.php";
