<form method="post" action="index.php?act=bill">
  <div class="row mb" style="     text-align: center;width: 1210px;margin: 0 auto; ">
    <div class="boxtrai mr">
      <div class="row mb">
        <div class="breadcrumb-area pt-35 pb-35 bg-gray-3 mb-5">
          <div class="container">
            <div class="breadcrumb-content text-center">
              <ul>
                <li>
                  <a href="index.php">Trang chủ</a>
                </li>
                <li class="active">Giỏ hàng</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row boxcontent cart">
          <table>
            <tr>
              <th>Chọn</th>
              <th>Hình</th>
              <th>Sản phẩm</th>
              <th>Đơn giá</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
              <th>Thao tác</th>
            </tr>
            <?php
            $tong = 0;
            foreach ($_SESSION['mycart'] as $id => $item) {
              $hinh = "upload/" . $item['img'];
              $ttien = $item['price'] * $item['soluong'];
              $tong += $ttien;
              $xoasp = '<a href="index.php?act=delcart&idcart=' . $id . '"><input type="button" value="Xóa"></a>';
              $formatted_price = number_format($item['price'], 0, ',', '.') . '₫';
              $formatted_total = number_format($ttien, 0, ',', '.') . '₫';
              echo '<tr>
            <td><input type="checkbox" name="selected_items[]" value="' . $id . '"></td>
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
            ?>

          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb bill" style="display: flex;margin: 0 auto;justify-content: center; ">
    <a href="index.php?act=bill" style="width: 185px; ">
      <input type="submit" value="Tiếp tục thanh toán" style="border: 1px solid;margin: 20px 0;">
    </a>
    <a href="index.php?act=delcart" style="border: 1px solid;margin:20px 0;width: 185px;">
      <input type="button" value="Xóa toàn bộ sản phẩm" style="width: 184px;margin-left: -14px;">
    </a>
  </div>
  </form>