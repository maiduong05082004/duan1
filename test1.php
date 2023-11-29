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