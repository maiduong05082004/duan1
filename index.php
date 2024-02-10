
<?php
include "client/controllers/user.php";
include "./model/payment.php";
if (!isset($_SESSION['mycart'])) {
    $_SESSION['mycart'] = array();
}
if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'lienHe':
            include './client/lienHe/lienhe.php';
            break;
        case 'submit_form_lienHe':
            if (isset($_POST['submit_lienHe']) && ($_POST['submit_lienHe'])) {
            $contract_name=$_POST['name'];
            $contract_email=$_POST['email'];
            $contract_content=$_POST['content'];
            insert_content_lienHe($contract_name,$contract_email,$contract_content);
            $thongbao = "Đã gửi tin thành công! Chúng tôi sẽ liên lạc lại với bạn trong 24h tới";
        }
                break;
        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $onesp = loadone_sanpham($_GET['idsp']);
                $sp_cung_loai = load_sanpham_cungloai($_GET['idsp'], $onesp['genre_id']);
                $listbinhluan = load_binhluan($_GET['idsp']);
                // $binhluan = load_binhluan($_GET['idsp']);
                include "client/products/chitietsp.php";
            } else {
                include "client/layout/home.php";
            }

            break;
            case 'sanpham':
                // Lấy giá trị từ GET hoặc POST
                $kyw = isset($_POST['kyw']) ? $_POST['kyw'] : "";
                $iddm = isset($_GET['iddm']) ? $_GET['iddm'] : (isset($_POST['iddm']) ? $_POST['iddm'] : 0);
            
                // Lấy danh sách sản phẩm dựa trên từ khoá tìm kiếm và ID danh mục
                $dssp = loadall_product($kyw, $iddm);
                $tendm = loadall_genre();
            
                // Include trang hiển thị sản phẩm
                include 'client/products/sanpham.php';
                break;
            
        case 'wishlist':
            if (isset($_SESSION['user'])) {
                $iduser = $_SESSION['user']['acc_id'];
                $dssp = loadall_wishlist($iduser);
                include 'client/products/wishlist.php';
            }
            break;
        case "addwishlist":
            add_wishlist();
            break;
        case "login":
            if (isset($_POST['loginaccount']) && ($_POST['loginaccount'])) {
                $user = $_POST['nameaccount'];
                $password = $_POST['password'];
                $checkuser = checkuser($user, $password);
                if (is_array($checkuser)) {
                    // Kiểm tra role của người dùng, nếu bằng 4 thì thông báo tài khoản bị chặn
                    if ($checkuser['role'] == 4) {
                        $thongbao = "Tài khoản của bạn đã bị chặn !!";
                    } else {
                        // Nếu không bị chặn, lưu thông tin người dùng vào phiên làm việc và chuyển hướng
                        $_SESSION['user'] = $checkuser;
                        if ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2) {
                            header('location:admin/index.php?act=home');
                        } else {
                            header('location:index.php?act=home');
                        }
                        exit; // Thêm exit để ngăn không chạy thêm mã sau khi chuyển hướng
                    }
                } else {
                    $thongbao = "Tài khoản hoặc mật khẩu không đúng!";
                }
            }
            include "client/taikhoan/login.php";
            break;

        case "register":
            if (isset($_POST['addaccount']) && ($_POST['addaccount'])) {
                $user = $_POST['username'] ?? '';
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
                    insert_account_user($user, $password, $email, $accname, $tel, $address, $role);
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
            if (!isset($_SESSION['user'])) {
                header('Location: index.php?act=login');
                unset($_SESSION['selected_items']);
                unset($_SESSION['tongdonhang']);
                unset($_SESSION['mycart']);
                exit();
            }
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
                header('location:index.php?act=addtocart');
            }
            include "client/cart/addtocart.php";
            break;
        case "updatecart":
            if (isset($_POST['updatecart'])) {
                foreach ($_POST['quantity'] as $id => $newQuantity) {
                    if (isset($_SESSION['mycart'][$id])) {
                        $_SESSION['mycart'][$id]['soluong'] = $newQuantity;
                        // Cập nhật tổng tiền cho sản phẩm này
                        $_SESSION['mycart'][$id]['ttien'] = $_SESSION['mycart'][$id]['price'] * $newQuantity;
                    }
                }
                // Chuyển hướng người dùng hoặc refresh trang
                header('Location: index.php?act=addtocart');
            }
            break;
        case "delcart":
            if (isset($_GET['idcart'])) {
                array_splice($_SESSION['mycart'], $_GET['idcart'], 1);
            } else {
                $_SESSION['mycart'] = [];
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
            //     case 'thanh_toan_vnpay':

            //         $vnpay=new c_payment();
            //         $vnpay->thanh_toan_vnpay();
            //         break;

            // case "online-bill":
            //     if (isset($_POST['pttt']) == 2) {
            //         $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            //         $vnp_Returnurl = "http://localhost/php/duan20/index.php?act=billcomfim";
            //         $vnp_TmnCode = "6J76YRSN"; //Mã website tại VNPAY 
            //         $vnp_HashSecret = "BOGCJPFEHKTFQDMJZMFMCTCHSJMFUSJY"; //Chuỗi bí mật

            //         $vnp_TxnRef = $_POST['bill_id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            //         $vnp_OrderInfo = $_POST['order_desc'];
            //         $vnp_OrderType = $_POST['order_type'];
            //         $vnp_Amount = $_POST['total'] * 100;
            //         $vnp_Locale = $_POST['language'];
            //         $vnp_BankCode = $_POST['bank_code'];
            //         $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            //         //Add Params of 2.0.1 Version
            //         $vnp_ExpireDate = $_POST['txtexpire'];
            //         //Billing
            //         $vnp_Bill_Mobile = $_POST['txt_billing_mobile'];
            //         $vnp_Bill_Email = $_POST['txt_billing_email'];
            //         $fullName = trim($_POST['txt_billing_fullname']);
            //         if (isset($fullName) && trim($fullName) != '') {
            //             $name = explode(' ', $fullName);
            //             $vnp_Bill_FirstName = array_shift($name);
            //             $vnp_Bill_LastName = array_pop($name);
            //         }
            //         $vnp_Bill_Address = $_POST['txt_inv_addr1'];
            //         $vnp_Bill_City = $_POST['txt_bill_city'];
            //         $vnp_Bill_Country = $_POST['txt_bill_country'];
            //         $vnp_Bill_State = $_POST['txt_bill_state'];
            //         // Invoice
            //         $vnp_Inv_Phone = $_POST['txt_inv_mobile'];
            //         $vnp_Inv_Email = $_POST['txt_inv_email'];
            //         $vnp_Inv_Customer = $_POST['txt_inv_customer'];
            //         $vnp_Inv_Address = $_POST['txt_inv_addr1'];
            //         $vnp_Inv_Company = $_POST['txt_inv_company'];
            //         $vnp_Inv_Taxcode = $_POST['txt_inv_taxcode'];
            //         $vnp_Inv_Type = $_POST['cbo_inv_type'];
            //         $inputData = array(
            //             "vnp_Version" => "2.1.0",
            //             "vnp_TmnCode" => $vnp_TmnCode,
            //             "vnp_Amount" => $vnp_Amount,
            //             "vnp_Command" => "pay",
            //             "vnp_CreateDate" => date('YmdHis'),
            //             "vnp_CurrCode" => "VND",
            //             "vnp_IpAddr" => $vnp_IpAddr,
            //             "vnp_Locale" => $vnp_Locale,
            //             "vnp_OrderInfo" => $vnp_OrderInfo,
            //             "vnp_OrderType" => $vnp_OrderType,
            //             "vnp_ReturnUrl" => $vnp_Returnurl,
            //             "vnp_TxnRef" => $vnp_TxnRef,
            //             "vnp_ExpireDate" => $vnp_ExpireDate,
            //             "vnp_Bill_Mobile" => $vnp_Bill_Mobile,
            //             "vnp_Bill_Email" => $vnp_Bill_Email,
            //             "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
            //             "vnp_Bill_LastName" => $vnp_Bill_LastName,
            //             "vnp_Bill_Address" => $vnp_Bill_Address,
            //             "vnp_Bill_City" => $vnp_Bill_City,
            //             "vnp_Bill_Country" => $vnp_Bill_Country,
            //             "vnp_Inv_Phone" => $vnp_Inv_Phone,
            //             "vnp_Inv_Email" => $vnp_Inv_Email,
            //             "vnp_Inv_Customer" => $vnp_Inv_Customer,
            //             "vnp_Inv_Address" => $vnp_Inv_Address,
            //             "vnp_Inv_Company" => $vnp_Inv_Company,
            //             "vnp_Inv_Taxcode" => $vnp_Inv_Taxcode,
            //             "vnp_Inv_Type" => $vnp_Inv_Type
            //         );

            //         if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            //             $inputData['vnp_BankCode'] = $vnp_BankCode;
            //         }
            //         if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            //             $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            //         }

            //         //var_dump($inputData);
            //         ksort($inputData);
            //         $query = "";
            //         $i = 0;
            //         $hashdata = "";
            //         foreach ($inputData as $key => $value) {
            //             if ($i == 1) {
            //                 $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            //             } else {
            //                 $hashdata .= urlencode($key) . "=" . urlencode($value);
            //                 $i = 1;
            //             }
            //             $query .= urlencode($key) . "=" . urlencode($value) . '&';
            //         }

            //         $vnp_Url = $vnp_Url . "?" . $query;
            //         if (isset($vnp_HashSecret)) {
            //             $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            //             $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            //         }
            //         $returnData = array(
            //             'code' => '00', 'message' => 'success', 'data' => $vnp_Url
            //         );
            //         if (isset($_POST['redirect'])) {
            //             header('Location: ' . $vnp_Url);
            //             die();
            //         } else {
            //             echo json_encode($returnData);
            //         }
            //         // vui lòng tham khảo thêm tại code demo
            //     }
            //     break;
        case "billcomfim":
            if (isset($_POST['dathangthanhcong']) && isset($_SESSION['selected_items'])) {
                $selected_items = $_SESSION['selected_items'];
                $tongdonhang = $_SESSION['tongdonhang'];

                // Xử lý đơn hàng
                if (isset($_SESSION['user'])) {
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
                    delete_bill();
                    // Tải thông tin đơn hàng để hiển thị
                    $bill = loadone_bill($idbill);
                    include "client/cart/billcomfim.php";
                } else {
                    echo "<h3 class='text-center text-danger'>Tài khoản của khách hàng chưa đăng nhập chúng tôi sẽ gửi hóa đơn thanh toán cho quý khách qua email!</h3>";
                }
            }
            break;



        case "mybill":
            $id = $_SESSION['user']['acc_id'];
            $listbilluser = loadone_bill_user($id);
            include "./client/taikhoan/mybill.php";
            break;
        case "mybillct":
            if (isset($_GET['idbill'])) {
                $idbill = $_GET['idbill'];
            }
            $listbilluser = loadone_bill_user($idbill);
            $listcartuser = loadall_cart_user($idbill);
            include "./client/taikhoan/mybillct.php";
            break;
        case "comment":
            if (!isset($_SESSION['user'])) {
                header('Location: index.php?act=login');
                unset($_SESSION['selected_items']);
                unset($_SESSION['tongdonhang']);
                unset($_SESSION['mycart']);
                exit();
            }
            $acc_id = $_SESSION['user']['acc_id'];

            break;
        case "comment_add":
            $acc_id = $_SESSION['user']['acc_id']; // ID của người dùng, bạn cần lấy từ session hoặc một biến đã xác định
            $product_id = $_POST['product_id']; // ID của sản phẩm, bạn cần lấy từ biến GET hoặc POST
            $content = $_POST['content']; // Nội dung bình luận, lấy từ form
            $date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO comment (acc_id, product_id, content, date) VALUES (?, ?, ?, ?)";

            // Thực hiện lệnh SQL
            pdo_execute($sql, $acc_id, $product_id, $content, $date);

            // Chuyển hướng người dùng về trang sản phẩm hoặc thông báo thành công
            header("Location: index.php?act=sanphamct&idsp=" . $product_id);
            exit();
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
