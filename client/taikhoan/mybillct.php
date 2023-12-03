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
        <div>
            <h1>Hóa đơn chi tiết</h1>
            <?php
            if (is_array($listbilluser)) {
                foreach ($listbilluser as $bill) {
                    extract($bill);

                    echo '<p>Ngày đặt hàng: ' . $bill['ngaydathang'] . '</p>
    <p>Tổng tiền:' . number_format($bill['bill_total'], 0, ',', '.') . ' ₫</p>';
                }
            }
            ?>
            <h2>Danh sách sản phẩm trong hóa đơn:</h2>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <tr>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng tiền</th>
                        </tr>
                        <?php
                        if (is_array($listcartuser)) {
                            foreach ($listcartuser as $cart) {
                                extract($cart);
                                $hinh = "upload/" . $product_image;
                                echo '<tr>
                                        <td><img src=' . $hinh . ' alt="" width=50 height=50></td>
                                        <td>' . $cart['product_name'] . '</td>
                                        <td>' . number_format($cart['product_price'], 0, ',', '.') . '₫</td>
                                        <td>' . $cart['product_quantity'] . '</td>
                                        <td>' . number_format($cart['thanhtien'], 0, ',', '.') . '₫</td>
                                        
                                    </tr>';
                            }
                        }
                        ?>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>