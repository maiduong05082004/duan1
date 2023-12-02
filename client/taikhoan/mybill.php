<div class="container mt-5">
        <h2>Lịch sử mua hàng</h2>
        <div class="row">
            <!-- Thêm các cột và menu nếu cần -->
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tổng cộng</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= $order['order_id'] ?></td>
                                <td><?= $order['order_date'] ?></td>
                                <td><?= $order['total'] ?></td>
                                <td><?= $order['status'] ?></td>
                                <td><a href="order_details.php?order_id=<?= $order['order_id'] ?>">Xem</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>