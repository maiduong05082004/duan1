<div class="registration-form">
        <form action="index.php?act=register" method="post" enctype="multipart/form-data">
            <h1 style="color:red; text-align:center; margin:16px 0 0;">ĐĂNG KÝ</h1>
            <div class="container-add">
        <div class="form-section-add"  style=" margin:auto; width: 300px; border: 1px solid; padding: 14px; ">
      
            <div class="input-group-add-2">
                <div class="left-box">
                    <div class="nameaccount">Tài khoản</div>
                    <input type="text" id="nameaccount" name="nameaccount" placeholder="" required>
                </div>
                
            </div>
            <div class="input-group-add">
                <div class="password">Password</div>
                <input type="password" id="password" name="password" placeholder="Duong1234@" required>
            </div>
            <div class="input-group-add">
                <div class="email">Email</div>
                <input type="email" id="email" name="email" placeholder="mai123@gmail.com" required>
            </div>
            <div class="input-group-add">
                <div class="phone">Phone</div>
                <input type="tel" id="phone" name="tel" placeholder="+84" required>
            </div>
            <div class="input-group-add">
                <div class="address">Địa chỉ</div>
                <input type="text" id="address" name="address" placeholder="" required>
            </div>
            <div>
            <input type="hidden" name="role" value="2" style=" display: flex; ">
                <input type="checkbox" id="agree" name="agree" required style="     width: 25px;     margin-top: -10px; ">
                <label for="agree">Tôi đồng ý với Điều Khoản Sử Dụng Của GoMovie</label>
            </div>
            <div>
                <input class="submit-btn" type="submit" value="ĐĂNG KÝ" name="addaccount">
                <a href="index.php?act=login"> <input class="submit-btn" type="button" value="Đăng nhập"></a>
            </div>
            <?php
                if(isset($thongbao)&&($thongbao!=""))echo $thongbao;
            ?>
        </form>
    </div>
