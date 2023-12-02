<?php
extract($bill);
?>
<div class="container mt-5">
  <div class="card">
    <div class="card-header bg-success text-white">
      Đặt hàng thành công
    </div>
    <div class="card-body">
      <h5 class="card-title">Cảm ơn bạn đã đặt hàng tại cửa hàng của chúng tôi!</h5>
      <p class="card-text">Thông tin người đặt hàng gồm:</p>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Họ và tên:</strong><?= htmlspecialchars($bill['bill_name']); ?></li>
        <li class="list-group-item"><strong>Số điện thoại:</strong> <?= htmlspecialchars($bill['bill_tel']); ?></li>
        <li class="list-group-item"><strong>Địa chỉ nhận hàng:</strong> <?= htmlspecialchars($bill['bill_address']); ?></li>
        <li class="list-group-item"><strong>Phương thức thanh toán:</strong> <?= htmlspecialchars($bill['bill_pttt'] == 1 ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng'); ?></li>
      </ul>
      <br>
      <p class="card-text">Thông tin đơn hàng gồm:</p>
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Mã đơn hàng:</strong> <?= "LDT".$idbill ?></li>
        <li class="list-group-item"><strong>Ngày đặt hàng:</strong> <?= $ngaydathang ?></li>
        <li class="list-group-item"><strong>Tổng đơn hàng:</strong> <?= number_format($bill_total, 0, ',', '.') ?>₫</li>
      
      </ul>
      <div class="mt-4">
        <a href="index.php?act=sanpham" class="btn btn-primary">Về trang chủ</a>
      </div>
    </div>
  </div>
</div>