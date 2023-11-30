<?php
// billcomfim.php

// Start the session if not already started


// Include the database connection file // Adjust the path to where your pdo.php file is located
// Get the bill ID from the URL query paramete
// print_r($bill);
// echo 1;
// die();

extract($bill);

?>

    <h1>Thông tin đơn hàng</h1>
    <p>Mã đơn hàng: <?= $idbill ?></p>
    <p>Ngày đặt hàng: <?= $ngaydathang ?></p>
    <p>Tổng đơn hàng: <?= $bill_total ?>₫</p>
    <p>Phương thức thanh toán: <?= htmlspecialchars($bill['bill_pttt'] == 1 ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng'); ?></p>
    <h2>Thông tin thanh toán</h2>
    <p>Họ tên: <?= htmlspecialchars($bill['bill_name']); ?></p>
    <p>Email: <?= htmlspecialchars($bill['bill_email']); ?></p>
    <p>Địa chỉ: <?= htmlspecialchars($bill['bill_address']); ?></p>
    <p>Điện thoại: <?= htmlspecialchars($bill['bill_tel']); ?></p>

