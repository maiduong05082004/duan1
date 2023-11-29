    <div class="container mt-4">
        <div class="breadcrumb-area pt-35 pb-35 bg-gray-3 mb-5">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="index.php">Trang chủ</a>
                        </li>
                        <li>
                            <a href="index.php?act=addtocart">Giỏ hàng</a>
                        </li>
                        <li class="active">Thông tin đơn hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    <?php
   $idbill = $_GET['idbill'] ?? ''; // Lấy ID đơn hàng từ URL
    var_dump($idbill);
    exit;
   if (!empty($idbill)) {
       echo "Không tìm thấy thông tin đơn hàng.";
       exit;
   }
   
   $sql = "SELECT * FROM bill WHERE idbill = ?";
   $bill = pdo_query_one($sql, $idbill);
   


    ?>
        <!-- Hiển thị thông tin đơn hàng -->
        <p>Mã đơn hàng: PR-143<?= $bill['idbill']; ?>43</p>
        <p>Ngày đặt hàng: <?= $bill['ngaydathang']; ?></p>
        <p>Tổng đơn hàng: <?= number_format($bill['bill_total']); ?>₫</p>
        <p>Phương thức thanh toán: <?= $bill['bill_pptt']; ?></p>

        <!-- Hiển thị thông tin thanh toán -->
        <h4>Thông tin thanh toán</h4>
        <p>Họ tên: <?= $bill['bill_name']; ?></p>
        <p>Email: <?= $bill['bill_email']; ?></p>
        <p>Địa chỉ: <?= $bill['bill_address']; ?></p>
        <p>Điện thoại: <?= $bill['bill_tel']; ?></p>
    </div>
