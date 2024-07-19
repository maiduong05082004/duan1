<div class="login-form">
    <div class="modal-overlay">
        <div class="register-modal">
            <span class="close-modal">&times;</span>
            <h2>Đăng nhập</h2>
            <form action="index.php?act=login" method="post" enctype="multipart/form-data">
                <input type="text" id="login-type" name="nameaccount" placeholder="Tên đăng nhập" required>
                <input type="password" id="login-type" name="password" placeholder="Mật khẩu" required>
                <input type="submit" id="login-submit" value="Đăng nhập" name="loginaccount">
                <?php
                if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                ?>
            </form>
            <a href="index.php?act=register">Chưa có tài khoản? Đăng ký ngay thôi nào</a>
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
    closeModal.onclick = function() {
        modal.style.display = "none";
        window.history.back();
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    // Get the button that opens the modal
    var openModalBtn = document.querySelector('.open-modal-btn');

    // When the user clicks the button, open the modal 
    openModalBtn.onclick = function() {
        modal.style.display = "flex";
    }
</script>