<div class="col-md-4 order-md-2 mb-4">

<h4 class="d-flex justify-content-between align-items-center mb-3">
    <span class="text-muted">Giỏ hàng</span>
    <span class="badge badge-secondary badge-pill" style="color: rebeccapurple;"><?php echo count($_SESSION['mycart']); ?></span>
</h4>
<?php
$total = 0;
foreach ($_SESSION['mycart'] as $item) {
    $subtotal = $item[3] * $item[4];
    $total += $subtotal;
?>
    <ul class="list-group mb-3">
        <input type="hidden" name="sanphamgiohang[1][sp_ma]" value="2">
        <input type="hidden" name="sanphamgiohang[1][gia]" value="11800000.00">
        <input type="hidden" name="sanphamgiohang[1][soluong]" value="2">

        <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
                <h6 class="my-0"><?php echo $item[1]; ?></h6>
                <small class="text-muted"><?php echo number_format($item[3]) . " x " . $item[4]; // Price x Quantity 
                                            ?></small>
            </div>
            <span class="text-muted"><?php echo number_format($subtotal); ?></span>
        </li>
    <?php } ?>
    <li class="list-group-item d-flex justify-content-between">
        <span>Tổng thành tiền</span>
        <strong><?php echo number_format($total); ?></strong>
    </li>
    </ul>





    <div class="py-5 text-center">
            <p>Thông tin đơn hàng</p>
            <p class="lead">Mã đơn hàng :PR-143<?=$listbill['id'];?>43</p>
            <p class="lead">Ngày đặt hàng :<?=$listbill['ngaydathang'];?></p>
            <p class="lead">Tổng đơn hàng<?=$listbill['bill_total'];?></p>
            <p class="lead">Tổng đơn hàng<?=$listbill['bill_pptt'];?></p>
        </div>



        
        <?php
                if (isset($_SESSION['user'])) {
                    $name = $_SESSION['user']['acc_name'];
                    $address = $_SESSION['user']['acc_address'];
                    $email = $_SESSION['user']['acc_email'];
                    $tel = $_SESSION['user']['acc_tel'];
                } else {
                    $name = "";
                    $address = "";
                    $email = "";
                    $tel = "";
                }
                ?>
                

                <?php
                    $total = 0;
                    foreach ($_SESSION['mycart'] as $id => $item) {
                        $subtotal = $item['price'] * $item['soluong'];
                        $total += $subtotal;
                        echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">' . htmlspecialchars($item['name']) . '</h6>
                        <small class="text-muted">' . number_format($item['price']) . ' x ' . $item['soluong'] . '</small>
                    </div>
                    <span class="text-muted">' . number_format($subtotal) . '₫</span>
                    </li>';
                    }
                    ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng thành tiền (VND)</span>
                        <strong><?php echo number_format($total); ?>₫</strong>
                    </li>
                </ul>




                <?php
require "modules/cart/models/cartModel.php";
if (isset($_GET['id'])) {
  $productID = (int)$_GET['id'];
  $productInfo = laysanpham($productID);
  $qty = 1;
  if (isset($_SESSION['cart']['buy']) && array_key_exists($productID, $_SESSION['cart']['buy'])) {
    $qty = $_SESSION['cart']['buy'][$productID]['qty'] + 1;
  }
  $_SESSION['cart']['buy'][$productID] = array(
    'id' => $productID,
    'name' => $productInfo['ten'],
    'product_category' => $productInfo['ma_danh_muc'],
    'description' =>  $productInfo['mo_ta'],
    'price' =>  $productInfo['gia'],
    'image' =>  $productInfo['hinh_anh'],
    'qty' => $qty,
    'sub_total' => $qty * $productInfo['gia'],
  );
  foreach ($_SESSION['cart']['buy'] as &$item) {
    $item['deleteCart'] = "?mod=cart&act=delete&id={$item['id']}";
  }
  updateInfoCart();
}
function updateInfoCart()
{
  if (empty($_SESSION['cart'])) return false;
  $num_order = 0;
  $total = 0;
  foreach ($_SESSION['cart']['buy'] as $item) {
    $num_order += $item['qty'];
    $total += $item['sub_total'];
  };
  $_SESSION['cart']['info'] = array(
    'num_order' => $num_order,
    'total' => $total
  );
}
redirect_to("?mod=cart&act=main");