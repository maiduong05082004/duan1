<div class="container mt-5">
    <div class="row">
        <!-- Side menu -->
        <div class="col-md-4">
            <div class="side-menu">
                <h2><a href="index.php?act=accinfo">Người dùng</a></h2>
                <div><a href="index.php?act=mybill">Lịch sử mua hàng</a></div>
                <div>Quên mật khẩu</div>
                <div>Đăng xuất</div>
                <!-- Các mục menu khác -->
            </div>
        </div>
        <!-- Profile card -->
        <?php
        if (isset($list)) {
            extract($list);
        }
        ?>

        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Thông tin cá nhân</h5>
                    <!-- Hiển thị thông tin -->
                    <div class="profile-info" id="profile-name" name="name"><strong>Họ và tên:</strong> <?= $acc_name ?></div>
                    <div class="profile-info" id="profile-tel" name="tel"><strong>Số điện thoại:</strong><?= $acc_tel ?></div>
                    <div class="profile-info" id="profile-email" name="email"><strong>Email:</strong> <?= $acc_email ?></div>
                    <div class="profile-info" id="profile-address" name="address"><strong>Địa chỉ:</strong> <?= $acc_address ?></div>

                    <!-- Form chỉnh sửa thông tin (ẩn đầu tiên) -->
                    <form id="edit-profile-form" style="display: none;" action="index.php?act=accinfo"  method="post">
                        <label for="edit-name">Họ và tên:</label>
                        <input type="text" class="inpu" id="edit-name" name="name" value="<?= $acc_name ?>">

                        <label for="edit-tel">Số điện thoại:</label>
                        <input type="text" class="inpu" id="edit-tel" name="tel" value="<?= $acc_tel ?>">

                        <label for="edit-email">Email:</label>
                        <input type="email" class="inpu" id="edit-email" name="email" value="<?= $acc_email ?>">

                        <label for="edit-address">Địa chỉ:</label>
                        <input type="text" class="inpu" id="edit-address" name="address" value="<?= $acc_address ?>">
                        
                        <button type="submit" class="btn btn-success" name="capnhapuser">Lưu</button>
                        <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Hủy</button>
                    </form>

                    <div class="text-center mt-4">
                        <!-- Nút hiển thị form chỉnh sửa -->
                        <button class="btn btn-danger" onclick="editProfile()">Chỉnh sửa thông tin</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
     function saveProfile() {
        // Gửi dữ liệu thông tin cập nhật lên server
        document.getElementById('updateProfileForm').submit();
    }
    function editProfile() {
        // Ẩn thông tin hiển thị, hiển thị form chỉnh sửa
        document.getElementById('profile-name').style.display = 'none';
        document.getElementById('profile-tel').style.display = 'none';
        document.getElementById('profile-email').style.display = 'none';
        document.getElementById('profile-address').style.display = 'none';

        document.getElementById('edit-profile-form').style.display = 'block';
    }

    function saveProfile() {
        // Xử lý lưu thông tin sau khi chỉnh sửa (gửi dữ liệu cập nhật lên server nếu cần)
        // ...

        // Hiển thị thông tin mới
        document.getElementById('profile-name').innerHTML = '<strong>Họ và tên:</strong> ' + document.getElementById('edit-name').value;
        document.getElementById('profile-tel').innerHTML = '<strong>Số điện thoại:</strong> ' + document.getElementById('edit-tel').value;
        document.getElementById('profile-email').innerHTML = '<strong>Email:</strong> ' + document.getElementById('edit-email').value;
        document.getElementById('profile-address').innerHTML = '<strong>Địa chỉ:</strong> ' + document.getElementById('edit-address').value;

        // Ẩn form chỉnh sửa, hiển thị thông tin
        document.getElementById('edit-profile-form').style.display = 'none';
        document.getElementById('profile-name').style.display = 'block';
        document.getElementById('profile-tel').style.display = 'block';
        document.getElementById('profile-email').style.display = 'block';
        document.getElementById('profile-address').style.display = 'block';
    }

    function cancelEdit() {
        // Hủy chỉnh sửa, ẩn form chỉnh sửa, hiển thị thông tin
        document.getElementById('edit-profile-form').style.display = 'none';
        document.getElementById('profile-name').style.display = 'block';
        document.getElementById('profile-tel').style.display = 'block';
        document.getElementById('profile-email').style.display = 'block';
        document.getElementById('profile-address').style.display = 'block';
    }
</script>
