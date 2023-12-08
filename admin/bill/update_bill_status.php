<?php
include "pdo.php"; // Đảm bảo rằng file này chứa các hàm kết nối và truy vấn cơ sở dữ liệu

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['idbill']) && isset($_POST['status'])) {
    $idbill = $_POST['idbill'];
    $status = $_POST['status'];

    // Hãy chắc chắn rằng chỉ admin hoặc người có quyền mới có thể thực hiện cập nhật này
    if (isset($_SESSION['user']) && ($_SESSION['user']['role'] == 1 || $_SESSION['user']['role'] == 2)) {
        $sql = "UPDATE bill SET bill_status = ? WHERE idbill = ?";
        pdo_execute($sql, $status, $idbill);
        echo "Cập nhật thành công";
    } else {
        echo "Bạn không có quyền cập nhật";
    }
} else {
    echo "Yêu cầu không hợp lệ";
}
?>