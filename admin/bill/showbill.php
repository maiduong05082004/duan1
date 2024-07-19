<div style="margin: 50px; width: 100%;">
    <h2>Danh sách Hóa Đơn</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
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
                <td><?= htmlspecialchars($bill['bill_name']) ?></td>
                <td><?= htmlspecialchars($bill['bill_address']) ?></td>
                <td><?= htmlspecialchars($bill['bill_email']) ?></td>
                <td><?= htmlspecialchars($bill['ngaydathang']) ?></td>
                <td><?= number_format($bill['bill_total'], 0, ',', '.') . '₫' ?></td>
                <td>
                    <select name="bill_status" onchange="updateStatus(this, <?= htmlspecialchars($bill['idbill']) ?>)" style="     width: 282px;     padding: 10px;     margin-top: 5px;     border: 1px solid #b1b0b0;     border-radius: 5px; ">
                        <option value="1" <?= $bill['bill_status'] == 1 ? 'selected' : '' ?>>Đang xử lý</option>
                        <option value="2" <?= $bill['bill_status'] == 2 ? 'selected' : '' ?>>Shipper đang giao hàng</option>
                        <option value="3" <?= $bill['bill_status'] == 3 ? 'selected' : '' ?>>Đơn hàng thành công</option>
                        <option value="4" <?= $bill['bill_status'] == 4 ? 'selected' : '' ?>>Hủy đơn hàng</option>
                    </select>
                </td>
                <td>
                    <!-- Các nút hành động như Xem, Sửa, Xóa -->
                    <a href="index.php?act=billct&idbill=<?= $bill['idbill'] ?>" class="edit">Xem sản phẩm</a>
                </td>
            </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>
<script>
function updateStatus(selectElem, billId) {
    var newStatus = selectElem.value;
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "index.php?act=updatebill", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert('Cập nhật trạng thái thành công.');
            // Cập nhật trang nếu cần
            location.reload();
        }
    };
    xhr.send("idbill=" + encodeURIComponent(billId) + "&status=" + encodeURIComponent(newStatus));
}

</script>
