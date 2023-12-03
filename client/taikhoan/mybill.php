
<div class="container mt-5">
    <div class="row">
        <!-- Side menu -->
        <div class="col-md-4">
            <div class="side-menu">
                <h2>Lịch sử mua hàng</h2>
                <div><a href="index.php?act=accinfo">Thông tin cá nhân</a></div>
                <div><a href="index.php?act=mybill">Lịch sử mua hàng</a></div>
                <div>Quên mật khẩu</div>
                <div>Đăng xuất</div>
                <!-- Các mục menu khác -->
            </div>
        </div>
        <h2>Lịch sử mua hàng</h2>
        <div class="row">
            <!-- Thêm các cột và menu nếu cần -->
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Số lượng mặt hàng</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Chi tiết</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        if(is_array($listbilluser)){
                            foreach ($listbilluser as $billuser){
                                $status=displayStatus($billuser['bill_status']);
                                $countsp=loadall_cart_count($billuser['idbill']);
                                if ($countsp > 0) {
                                    echo '<tr>
                                        <td>LDT-' . $billuser['idbill'] . '</td>
                                        <td>' . $billuser['ngaydathang'] . '</td>
                                        <td>'.$countsp.'</td>
                                        <td>' . number_format($billuser['bill_total'], 0, ',', '.') . '₫</td>
                                        <td>' . $status . '</td>
                                        <td><a href="index.php?act=mybillct&idbill=' . $billuser['idbill'] . '">Xem chi tiết</a></td>
                                    </tr>';
                                }
                            }
                        }
                         ?>
                            
                    </tbody>
                </table>
            </div>
        </div>
    </div>