<div style="margin: 50px; width: 100%;">
    <h2>Danh Sách Hóa Đơn Chi Tiết</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            </tr>
        </thead>
        <tbody>
        <?php
                        if (is_array($listcartuser)) {
                            foreach ($listcartuser as $cart) {
                                extract($cart);
                                $hinh = "../upload/" . $product_image;
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

        </tbody>
    </table>
</div>

