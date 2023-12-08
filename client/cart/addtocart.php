<script>
function updateTotal() {
    var total = 0;
    document.querySelectorAll('input[type="checkbox"][name="selected_items[]"]:checked').forEach(function(checkbox) {
        var productId = checkbox.value;
        var quantityInput = document.querySelector('input[name="quantity[' + productId + ']"]');
        var price = parseFloat(quantityInput.dataset.price);
        var quantity = parseInt(quantityInput.value);
        total += price * quantity;
    });
    document.getElementById('total').textContent = new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(total);
}
</script>
<form method="post" action="index.php?act=bill" id="cartForm">
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
                $xoasp = '<a href="index.php?act=delcart&idcart=' . $id . '"><input type="button" value="Xóa" style="color: #fff; background-color: #6c757d; border-color: #6c757d; border: 1px solid; margin: 20px 0; padding: 10px; border-radius: 5px;"></a>';
                $formatted_price = number_format($item['price'], 0, ',', '.') . '₫';
                $formatted_total = number_format($ttien, 0, ',', '.') . '₫';
                echo '<tr>
                        <td><input type="checkbox" name="selected_items[]" value="' . $id . '"  onclick="updateTotal()"></td>
                        <td><img src="' . $hinh . '" alt="" height="80px"></td>
                        <td>' . $item['name'] . '</td>
                        <td>' . $formatted_price . '</td>
                        <td>
                            <input type="number" name="quantity[' . $id . ']" value="' . $item['soluong'] . '" min="1" class="form-control quantity-field" data-price="' . $item['price'] . '" style="     width: 100px;     margin-left: 24px; ">
                        </td>
                        <td>' . $formatted_total . '</td>
                        <td>' . $xoasp . '</td>
                    </tr>';
            }
            $formatted_tong = number_format($tong, 0, ',', '.') . '₫';
            ?>
            <tr>
                <td colspan="4"><h3>Tổng đơn hàng:</h3></td>
                <td><h3 id="total">0₫</h3></td>
            </tr>
        </table>
    </div>
      </div>
    </div>
  </div>
<!-- Đặt button cập nhật giỏ hàng trước thẻ đóng form -->
<button type="submit" onclick="updateAction('updatecart')" name="updatecart" value="updatecart" style="color: #fff; background-color: #6c757d; border-color: #6c757d; border: 1px solid; margin: 20px 0; padding: 10px; border-radius: 5px; display: block; width: 173px; margin: 0 auto;">Cập nhật giỏ hàng</button>
  <div class="row mb bill" style="display: flex;margin: 0 auto;justify-content: center; ">
    <a href="index.php?act=bill" style="width: 185px; ">
      <input type="submit" onclick="updateAction('bill')" value="Tiếp tục thanh toán" style="color: #fff;background-color: #6c757d;border-color: #6c757d;border: 1px solid;margin: 20px 0;padding: 10px;border-radius: 5px; width: 176px;">
    </a>
    <a href="index.php?act=delcart" style="width: 185px;">
      <input type="button" value="Xóa toàn bộ sản phẩm" style="width: 184px;color: #fff;background-color: #6c757d;border-color: #6c757d;border: 1px solid;margin: 20px 0;padding: 10px;border-radius: 5px;">
    </a>
  </div>
  </form>
  <script>
function updateAction(action) {
    document.getElementById('cartForm').action = 'index.php?act=' + action;
}
</script>