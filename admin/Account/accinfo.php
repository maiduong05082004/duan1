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
                        <label for="edit-name" style="     margin-right: 24px; ">Họ và tên:</label>
                        <input type="text" class="inpu" id="email" name="name" value="<?= $acc_name ?>" ><br>

                        <label for="edit-tel">Số điện thoại:</label>
                        <input type="text" class="inpu" id="email" name="tel" value="<?= $acc_tel ?>"><br>

                        <label for="edit-email" style="     margin-right: 53px; ">Email:</label>
                        <input type="email" class="inpu" id="email" name="email" value="<?= $acc_email ?>"><br>

                        <label for="edit-address" style="     margin-right: 45px; ">Địa chỉ:</label>
                        <input type="text" class="inpu" id="email" name="address" value="<?= $acc_address ?>" ><br>
                        
                        <button type="submit" class="submit-btn" name="capnhapuser" onclick="saveProfile() ">Lưu</button>
                        <button type="button" class="submit-btn" onclick="cancelEdit()" style="     margin-top: 20px; ">Hủy</button>
                    </form>
                    <div class="text-center mt-4">
                        <!-- Nút hiển thị form chỉnh sửa -->
                        <button class="btn btn-danger" onclick="editProfile()">Chỉnh sửa thông tin</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
    function editProfile() {
        // Ẩn thông tin hiển thị, hiển thị form chỉnh sửa
        document.getElementById('profile-name').style.display = 'none';
        document.getElementById('profile-tel').style.display = 'none';
        document.getElementById('profile-email').style.display = 'none';
        document.getElementById('profile-address').style.display = 'none';

        document.getElementById('edit-profile-form').style.display = 'block';
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
