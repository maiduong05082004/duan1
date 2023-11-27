<div class="login-form">
        <form action="index.php?act=login" method="post" enctype="multipart/form-data">
            <h1 style="color:red; text-align:center; margin:16px 0 0;">ĐĂNG NHẬP</h1>
            <div class="container-add">
        
        <div class="form-section-add" style=" margin: auto; width: 300px; border: 1px solid; padding: 14px; ">
            <div class="input-group-add-2">
                <div class="left-box">
                    <div class="nameaccount">Tài khoản</div>
                    <input type="text" id="nameaccount" name="nameaccount" placeholder="Nhập tài khoản hoặc số điện thoại">
                </div>
            </div>
            <div class="input-group-add">
                <div class="password">Password</div>
                <input type="password" id="password" name="password" placeholder="Duong1234@">
            </div>
            
            <div>
                <input class="submit-btn" type="submit" value="ĐĂNG NHẬP" name="loginaccount" style="     border: 1px solid;     color: red;     margin-top: 10px; ">
            </div>
            <?php
                if(isset($thongbao)&&($thongbao!=""))echo $thongbao;
            ?>
        </form>
    </div>

    