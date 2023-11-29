<?php
function addcart() {
    $product_id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['acc_id']; 
    $sql = "INSERT INTO cart (user_id, product_id, quantity, added_on) VALUES (?, ?, ?, NOW())";
    pdo_execute($sql,[$user_id, $product_id, $quantity]);
}

function viewcart(){
    $tong = 0;
          $i = 0;
          foreach ($_SESSION['mycart'] as $cart) {
            $hinh = "upload/" . $cart[2];
            $ttien = $cart[3] * $cart[4];
            $tong += $ttien;
            $xoasp = '<a href="index.php?act=delcart&idcart=' . $i . '"><input type="button" value="Xóa"></a>';
            $formatted_price = number_format($cart[3], 0, ',', '.') . '₫';
            $formatted_total = number_format($ttien, 0, ',', '.') . '₫';
            echo '<tr>
                    <td><img src="' . $hinh . '" alt="" height="80px"></td>
                    <td>' . $cart[1] . '</td>
                    <td>' . $formatted_price . '</td>
                    <td>' . $cart[4] . '</td>
                    <td>' . $formatted_total . '</td>
                    <td>' . $xoasp . '</td>
                  </tr>';
            $i += 1;
          }
          $formatted_tong = number_format($tong, 0, ',', '.') . '₫';
          echo '
        <tr>
            <td colspan="4"><h3>Tổng đơn hàng</h3></td>
            <td><h3>' . $formatted_tong . '</h3></td>
        </tr>';
}
function tonghoadon(){
  $tong = 0;
        foreach ($_SESSION['mycart'] as $cart) {
          $ttien = $cart[3] * $cart[4];
          $tong += $ttien;
        }
        $formatted_tong = number_format($tong, 0, ',', '.') . '₫';
        return $formatted_tong;
}
?>