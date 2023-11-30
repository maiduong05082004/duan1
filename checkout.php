<div class="container mt-4">
    <form class="needs-validation" name="frmthanhtoan" method="post" action="index.php?act=billcomfim">
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
                        <li class="active">Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="py-5 text-center">
            <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
        </div>
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Giỏ hàng</span>
                    <span class="badge badge-secondary badge-pill" style="color: rebeccapurple;"><?php echo count($_SESSION['mycart']); ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    $total = 0;
                    foreach ($_SESSION['mycart'] as $id => $item) {
                        $subtotal = $item['price'] * $item['soluong'];
                        $total += $subtotal;
                        echo '<li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">' . htmlspecialchars($item['name']) . '</h6>
                        <small class="text-muted">' . number_format($item['price']) . ' x ' . $item['soluong'] . '</small>
                    </div>
                    <span class="text-muted">' . number_format($subtotal) . '₫</span>
                    </li>';
                    }
                    ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng thành tiền (VND)</span>
                        <strong><?php echo number_format($total); ?>₫</strong>
                    </li>
                </ul>


                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Mã khuyến mãi">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-secondary">Xác nhận</button>
                    </div>
                </div>


            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Thông tin khách hàng</h4>

                <?php
                if (isset($_SESSION['user'])) {
                    $name = $_SESSION['user']['acc_name'];
                    $address = $_SESSION['user']['acc_address'];
                    $email = $_SESSION['user']['acc_email'];
                    $tel = $_SESSION['user']['acc_tel'];
                } else {
                    $name = "";
                    $address = "";
                    $email = "";
                    $tel = "";
                }
                ?>



                <div class="row">
                    <div class="col-md-12">
                        <label for="kh_ten">Họ tên</label>
                        <input type="text" class="form-control" name="kh_ten" id="kh_ten" value="<?= $name ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="kh_diachi">Địa chỉ</label>
                        <input type="text" class="form-control" name="kh_diachi" id="kh_diachi" value="<?= $address ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="kh_dienthoai">Điện thoại</label>
                        <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai" value="<?= $email ?>">
                    </div>
                    <div class="col-md-12">
                        <label for="kh_email">Email</label>
                        <input type="text" class="form-control" name="kh_email" id="kh_email" value="<?= $tel ?>">
                    </div>
                </div>

                <h4 class="mb-3">Hình thức thanh toán</h4>

                <div class="d-block my-3">
                    <div class="custom-control custom-radio">
                        <input id="httt-1" name="pttt" type="radio" class="custom-control-input" required="" value="1" style="     height: auto;     width: auto; ">
                        <label class="custom-control-label" for="httt-1">Thanh toán khi nhận hàng</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input id="httt-2" name="pttt" type="radio" class="custom-control-input" required="" value="2" style="     height: auto;     width: auto; ">
                        <label class="custom-control-label" for="httt-2">Chuyển khoản ngân hàng</label>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit" name="dathangthanhcong">Đặt hàng</button>

            </div>
        </div>
    </form>

</div>