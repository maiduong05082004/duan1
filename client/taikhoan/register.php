<div class="registration-form">
<div class="modal-overlay" style="position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0, 0, 0, 0.7);display: flex;justify-content: center;align-items: center;    z-index: 1;">
        <div class="register-modal" style="width: 400px;background: #fff;    padding: 20px 20px 20px 37px;border-radius: 10px;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            <span class="close-modal" style="float: right;font-size: 1.2em;cursor: pointer;">&times;</span>
            <h2 style=" text-align: center;margin-bottom: 20px;color: #333;">Đăng ký thành viên</h2>
            <form action="index.php?act=register" method="post" enctype="multipart/form-data">
                <input type="text" name="username" placeholder="Tên đăng nhập" required style="width: calc(100% - 20px); padding: 10px;margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;">
                <input type="password" name="password" placeholder="Mật khẩu" required style="width: calc(100% - 20px);padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;">
                <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required style="width: calc(100% - 20px);padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;">
                <input type="text" name="accname" placeholder="Tên hiển thị" required style="width: calc(100% - 20px); padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;">
                <input type="email" id="email" name="email" placeholder="Email" required style="width: calc(100% - 20px); padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;">
                <input type="tel" id="phone" name="tel" placeholder="+84" required style="width: calc(100% - 20px); padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;">
                <input type="text" id="address" name="address" placeholder="Địa chỉ" required style="width: calc(100% - 20px); padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 5px;" >
                <input type="hidden" name="role" value="3" style=" display: flex; ">
                <input type="checkbox" id="agree" name="agree" required style="     width: 20px;     margin-top: -10px; ">
                <label for="agree" style="     width: 305px; ">Tôi đồng ý với Điều Khoản Sử Dụng Của LAPDTECH</label>
                <input type="submit" value="Đăng ký" name="addaccount" style="background-color: #48434c;color: #fff;     width: 324px;     border-radius: 9px;     text-align: center;">
                <?php
                if(isset($thongbao)&&($thongbao!=""))echo $thongbao;
            ?>
            </form>
            <a href="index.php?act=login" style="color: #007bff;display: block;text-align: center;margin-top: 15px;">Đăng nhập</a>
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