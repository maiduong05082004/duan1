<div class="registration-form">
<div class="modal-overlay">
        <div class="register-modal" >
            <span class="close-modal">&times;</span>
            <h2>Đăng ký thành viên</h2>
            <form action="index.php?act=register" method="post" enctype="multipart/form-data">
                <input type="text" class="register-type" name="username" placeholder="Tên đăng nhập" required autocomplete="new-password">
                <input type="password" class="register-type" name="password" placeholder="Mật khẩu" required autocomplete="new-password">
                <input type="password" class="register-type" name="confirm_password" placeholder="Nhập lại mật khẩu" required>
                <input type="text" class="register-type" name="accname" placeholder="Tên hiển thị" required>
                <input type="email" class="register-type" id="email" name="email" placeholder="Email" required>
                <input type="tel" class="register-type" id="phone" name="tel" placeholder="+84" required>
                <input type="text" class="register-type" id="address" name="address" placeholder="Địa chỉ" required>
                <input type="hidden" name="role" value="3">
                <div class="box">
                    <input type="checkbox" id="agree" name="agree" required>
                    <label for="agree">Tôi đồng ý với Điều Khoản Sử Dụng Của LAPDTECH</label>
                </div>
                <input type="submit" id="register-submit" value="Đăng ký" name="addaccount">
                <?php
                if(isset($thongbao)&&($thongbao!=""))echo $thongbao;
            ?>
            </form>
            <a class="come-login" href="index.php?act=login"><h4>Đăng nhập</h4></a>
        </div>
    </div>
    </form>
    </div>







    <script>
        // Get the modal
        var modal = document.querySelector('.modal-overlay');

        // Get the <span> element that closes the modal
        var closeModal = document.querySelector('.close-modal');

        // When the user clicks on <span> (x), close the modal
        closeModal.onclick = function () {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        // Get the button that opens the modal
        var openModalBtn = document.querySelector('.open-modal-btn');

        // When the user clicks the button, open the modal 
        openModalBtn.onclick = function () {
            modal.style.display = "flex";
        }

    </script>