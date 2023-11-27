<div class="row mb" style="     text-align: center;     width: 66%;     margin: 0 auto; ">
  <div class="boxtrai mr">
    <div class="row mb">
      <div class="boxtitle">GIỎ HÀNG</div>
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
          $tong=0;
          $i=0;
                foreach($_SESSION['mycart'] as $cart){
                    $hinh="upload/".$cart[2];
                    $ttien=$cart[3]*$cart[4];
                    $tong+=$ttien;
                    $xoasp='<a href="index.php?act=delcart&idcart='.$i.'"><input type="button" value="Xóa"></a>';
                    $formatted_price = number_format($cart[3], 0, ',', '.').'₫';
                    $formatted_total = number_format($ttien, 0, ',', '.').'₫';
                    echo '<tr>
                    <td><img src="'.$hinh.'" alt="" height="80px"></td>
                    <td>'.$cart[1].'</td>
                    <td>'.$formatted_price.'</td>
                    <td>'.$cart[4].'</td>
                    <td>'.$formatted_total.'</td>
                    <td>'.$xoasp.'</td>
                  </tr>';
                  $i+=1;
        }
        $formatted_tong = number_format($tong, 0, ',', '.').'₫';
        echo '
        <tr>
            <td colspan="4"><h3>Tổng đơn hàng</h3></td>
            <td><h3>'.$formatted_tong.'</h3></td>
        </tr>';
            ?>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="row mb bill" style="     display: flex;     margin: 0 auto;     justify-content: center;gap: 30px; " >
    <a href="index.php?act=bill">
        <input type="submit" value="ĐỒNG Ý ĐẶT HÀNG" style="    border: 1px solid;     margin: 20px 0;     width: 30%;">
    </a>
    <a href="index.php?act=delcart" style="    border: 1px solid;     margin: 20px 0;     width: 30%;">
        <input type="button" value="XÓA GIỎ HÀNG" style="width: 555px;margin-left: -14px;">
    </a>
</div>
