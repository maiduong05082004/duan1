<div class="container">
    <h2>Danh sách Hóa Đơn</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID Hóa Đơn</th>
                <th>Tên Khách Hàng</th>
                <th>Địa Chỉ</th>
                <th>Email</th>
                <th>Ngày Đặt Hàng</th>
                <th>Tổng Tiền</th>
                <th>Trạng Thái</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_of_bills as $bill): ?>
            <tr>
                <td><?= htmlspecialchars($bill['idbill']) ?></td>
                <td><?= htmlspecialchars($bill['bill_name']) ?></td>
                <td><?= htmlspecialchars($bill['bill_address']) ?></td>
                <td><?= htmlspecialchars($bill['bill_email']) ?></td>
                <td><?= htmlspecialchars($bill['ngaydathang']) ?></td>
                <td><?= htmlspecialchars($bill['bill_total']) ?></td>
                <td><?= htmlspecialchars($bill['bill_status']) ?></td>
                <td>
                    <!-- Các nút hành động như Xem, Sửa, Xóa -->
                    <a href="view_bill.php?id=<?= $bill['idbill'] ?>" class="view">Xem</a>
                    <a href="edit_bill.php?id=<?= $bill['idbill'] ?>" class="edit">Sửa</a>
                    <a href="delete_bill.php?id=<?= $bill['idbill'] ?>" class="delete">Xóa</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>