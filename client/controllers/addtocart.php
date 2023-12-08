<?php
function add(){
    $tong = 0;
foreach ($_SESSION['mycart'] as $id => $item) {
    $hinh = "upload/" . $item['img'];
    $ttien = $item['price'] * $item['soluong'];
    $tong += $ttien;
    $xoasp = '<a href="index.php?act=delcart&idcart=' . $id . '"><input type="button" value="Xóa"></a>';
    $formatted_price = number_format($item['price'], 0, ',', '.') . '₫';
    $formatted_total = number_format($ttien, 0, ',', '.') . '₫';
    echo '<tr>
            <td><img src="' . $hinh . '" alt="" height="80px"></td>
            <td>' . $item['name'] . '</td>
            <td>' . $formatted_price . '</td>
            <td>' . $item['soluong'] . '</td>
            <td>' . $formatted_total . '</td>
            <td>' . $xoasp . '</td>
          </tr>';
}
$formatted_tong = number_format($tong, 0, ',', '.') . '₫';
echo '
<tr>
    <td colspan="4"><h3>Tổng đơn hàng</h3></td>
    <td><h3>' . $formatted_tong . '</h3></td>
</tr>';
}
function tongdonhang() {
    $tong = 0;
    foreach ($_SESSION['mycart'] as $id => $item) {
        $ttien = $item['price'] * $item['soluong'];
        $tong += $ttien;
    }
    // Giá trị số để lưu vào cơ sở dữ liệu
    $total_numeric = $tong;
    // Chuỗi đã được định dạng để hiển thị
    $formatted_tong = number_format($tong, 0, ',', '.') . '₫';

    // Trả về một mảng chứa cả giá trị số và chuỗi định dạng
    return ['numeric' => $total_numeric, 'formatted' => $formatted_tong];
}


function insert_bill($iduser,$name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang,$status) {
    $sql = "INSERT INTO bill (acc_id,bill_name, bill_email, bill_address, bill_tel, bill_pttt, ngaydathang, bill_total,bill_status) VALUES  ('$iduser', '$name','$email', '$address', '$tel',' $pttt',' $ngaydathang', '$tongdonhang','$status')";
    pdo_execute($sql);
    return pdo_execute_return_lastInsertId($sql);
}

function insert_cart($userId, $productId, $productName, $productImage, $price, $quantity, $totalPrice, $billId) {
    $sql = "INSERT INTO cart (user_id, product_id, product_name, product_image, product_price, product_quantity, thanhtien, idbill) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $userId, $productId, $productName, $productImage, $price, $quantity, $totalPrice, $billId);
}

function loadone_bill($idbill){
    $sql = "SELECT * FROM bill WHERE idbill = " . $idbill;
    $listbill=pdo_query_one($sql);    
    return $listbill;
}
function displayStatus($status) {
    switch ($status) {
        case 1:
            return 'Đang xử lý';
        case 2:
            return 'Đang giao hàng';
        case 3:
            return 'Đã giao hàng';
        default:
            return 'Đơn hàng đã bị hủy';
    }
}
function loadall_cart_count($idbill) {
    $sql = "SELECT SUM(product_quantity) as total_quantity FROM cart WHERE idbill = ?";
    $countResult = pdo_query_one($sql, $idbill);    
    return $countResult['total_quantity'] ?? 0;
}

?>