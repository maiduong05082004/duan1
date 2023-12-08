<?php
// Khởi động session PHP
session_start();

// Kiểm tra xem yêu cầu đến có phải là AJAX POST không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Kiểm tra xem giỏ hàng đã được khởi tạo trong session hay chưa
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Lấy product_id gửi đến từ yêu cầu AJAX
    $productId = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;

    // Tăng số lượng cho sản phẩm trong giỏ hàng
    if ($productId > 0) {
        if (!isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = 0;
        }
        $_SESSION['cart'][$productId]++;
    }

    // Tính tổng số lượng sản phẩm trong giỏ hàng
    $totalQuantity = array_sum($_SESSION['cart']);

    // Gửi phản hồi JSON về cho client
    echo json_encode(['cart_count' => $totalQuantity]);
    exit; // Đây là điểm quan trọng để dừng việc thực thi script ở đây nếu đây là một yêu cầu AJAX
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart Demo</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<!-- Nút để thêm sản phẩm vào giỏ hàng -->
<div>
    <h3>Tên Sản Phẩm</h3>
    <button onclick="addToCart(1)">Thêm vào giỏ hàng</button>
</div>

<!-- Khu vực hiển thị số lượng sản phẩm trong giỏ hàng -->
<div class="cart">
    Số lượng sản phẩm trong giỏ hàng: <span class="cart-count">0</span>
</div>

<script>
// Hàm JavaScript để thêm sản phẩm vào giỏ hàng
function addToCart(productId) {
    $.ajax({
        url: '', // URL trống vì chúng ta gửi yêu cầu đến cùng một file
        type: 'POST',
        data: { product_id: productId },
        dataType: 'json', // Quan trọng: Chỉ định kiểu dữ liệu mong muốn từ server là JSON
        success: function(response) {
            // Cập nhật số lượng sản phẩm hiển thị
            $('.cart-count').text(response.cart_count);
        },
        error: function() {
            // Hiển thị thông báo lỗi nếu có
            alert('Không thể thêm sản phẩm vào giỏ hàng');
        }
    });
}
</script>

</body>
</html>
