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
            <th>Hình</th>
            <th>Sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            <th>Thao tác</th>
          </tr>
          <?php
add();
?>

        </table>
      </div>
    </div>
  </div>
</div>

<div class="row mb bill" style="display: flex;margin: 0 auto;justify-content: center;gap: 30px; ">
  <a href="index.php?act=bill" style="width: 531px; ">
    <input type="submit" value="ĐỒNG Ý ĐẶT HÀNG" style="border: 1px solid;margin: 20px 0;">
  </a>
  <a href="index.php?act=delcart" style="border: 1px solid;margin:20px 0;width: 531px;">
    <input type="button" value="XÓA GIỎ HÀNG" style="width: 529px;margin-left: -14px;">
  </a>
</div>
