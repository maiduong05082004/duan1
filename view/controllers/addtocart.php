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
function tongdonhang(){
    $tong = 0;
foreach ($_SESSION['mycart'] as $id => $item) {
    $ttien = $item['price'] * $item['soluong'];
    $tong += $ttien;
}
$formatted_tong = number_format($tong, 0, ',', '.') . '₫';
    return $formatted_tong;
}

function insert_bill($name, $email, $address, $tel, $pptt, $ngaydathang, $tongdonhang) {
    $sql = "INSERT INTO bill (bill_name, bill_email, bill_address, bill_tel, bill_pptt, ngaydathang, bill_total) VALUES (?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $name, $email, $address, $tel, $pptt, $ngaydathang, $tongdonhang);
    return pdo_execute_return_lastInsertId($sql, $name, $email, $address, $tel, $pptt, $ngaydathang, $tongdonhang);
}

function insert_cart($userId, $productId, $productName, $productImg, $price, $quantity, $totalPrice, $billId) {
    $sql = "INSERT INTO cart (user_id, product_id, product_name, product_img, price, quantity, total_price, bill_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $userId, $productId, $productName, $productImg, $price, $quantity, $totalPrice, $billId);
}
function loadone_bill($idbill){
    $sql="select * from bill where idbill=".$idbill;
    $bill=pdo_query_one($sql);    
    return $bill;
}

?>