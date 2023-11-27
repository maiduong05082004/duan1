<?php
if (is_array($dm)){
    extract($dm);
}

?>
<div class="admin-content">
    <h1>CẬP NHẬP LOẠI HÀNG HÓA</h1>
    <div class="row2 form_content ">
        <form action="index.php?act=updatedm" method="POST">
            <div class="row2 mb10 form_content_container">
                <label> Mã loại </label> <br>
                <input type="text" name="maloai" placeholder="nhập vào mã loại" disabled id="email">
            </div>
            <div class="row2 mb10">
                <label>Tên loại </label> <br>
                <input type="text" name="tenloai" placeholder="nhập vào tên" value="<?=$genre_name?>" id="email">
            </div>
            <div class="mb10">
                <input type="hidden" name="id" value="<?=$genre_id?>">
                <input  type="submit" name="capnhat" value="CẬP NHẬP" class="submit-btn" style=" margin: 15px 15px 0 0;">
                <input  type="reset" value="NHẬP LẠI" class="submit-btn" style=" margin: 15px 15px 0 0;">
                <a href="index.php?act=listdm"><input type="button" value="DANH SÁCH" class="submit-btn"></a>
            </div>
            <?php
              if(isset($thongbao) && ($thongbao!= "")) echo $thongbao;
?>
        </form>
    </div>
</div>
