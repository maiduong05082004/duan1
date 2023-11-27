<div class="admin-content">
    <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
    <div class="row2 form_content ">
        <form action="index.php?act=adddm" method="POST">
            <div class="row2 mb10 form_content_container">
                <label> Mã loại </label> <br>
                <input type="text" name="maloai" id="email" placeholder="Mã loại" disabled>
            </div>
            <div class="row2 mb10">
                <label>Tên loại </label> <br>
                <input type="text" name="tenloai" id="email" placeholder="nhập vào tên">
            </div>
            <div class="mb10 ">
                <input  type="submit" name="themmoi" value="THÊM MỚI" class="submit-btn" style=" margin: 15px 15px 0 0;">
                <input  type="reset" value="NHẬP LẠI" class="submit-btn" style=" margin: 15px 15px 0 0;">
                <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH" class="submit-btn" style=" margin: 15px 15px 0 0;"></a>
            </div>
            <?php
              if(isset($thongbao) && ($thongbao!= "")) {
                echo $thongbao;
              }
?>
        </form>
    </div>
</div>