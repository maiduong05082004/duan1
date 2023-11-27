<div class="cart-page-container pt-100 pb-100">
    <div class="container">
        <h1 class="cart-heading">Giỏ hàng của bạn</h1>
        <?php if (!empty($cartItems)): ?>
            <form action="update_cart.php" method="post">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cartItems as $item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($item['product_name']); ?></td>
                                <td><?php echo number_format($item['price']); ?>đ</td>
                                <td>
                                    <input type="number" name="quantities[<?php echo $item['product_id']; ?>]" value="<?php echo $item['quantity']; ?>" min="1" class="form-control quantity">
                                </td>
                                <td><?php echo number_format($item['price'] * $item['quantity']); ?>đ</td>
                                <td>
                                    <button type="button" class="btn btn-danger remove-item" onclick="removeFromCart(<?php echo $item['product_id']; ?>)">Xóa</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="cart-buttons">
                    <button type="submit" class="btn btn-primary update-cart">Cập nhật giỏ hàng</button>
                    <a href="checkout.php" class="btn btn-success checkout">Thanh toán</a>
                </div>
            </form>
        <?php else: ?>
            <p>Giỏ hàng của bạn trống.</p>
        <?php endif; ?>
    </div>
</div>

<script>
// Thêm mã JavaScript để xử lý xóa sản phẩm từ giỏ hàng
function removeFromCart(productId) {
    if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')) {
        // Tạo một yêu cầu POST đến một file PHP để xử lý xóa
        $.ajax({
            url: 'remove_from_cart.php',
            type: 'post',
            data: { product_id: productId },
            success: function(response) {
                // Xử lý sau khi sản phẩm được xóa thành công
                location.reload(); // Tải lại trang để cập nhật giao diện giỏ hàng
            }
        });
    }
}
</script>
