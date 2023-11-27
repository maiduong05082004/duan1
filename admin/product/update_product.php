<?php
if (is_array($sanpham)) {
    extract($sanpham);
}
$hinhpart = "../upload/" . $product_img;
if (is_file($hinhpart)) {
    $hinh = "<img src='" . $hinhpart . "' height='80'>";
} else {
    $hinh = "no poto";
}
?>
<div class="admin-content">
    <h1>CẬP NHẬP SẢN PHẨM</h1>

    <div class="row2 form_content ">
        <form action="index.php?act=updatesp" method="POST" enctype="multipart/form-data" class="form-add">
            <div class="container-add">
                <select name="iddm">
                    <option value="0" selected>tất cả</option>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        if ($iddm == $danhmuc['genre_id']) {
                            $s = "selected";
                        } else {
                            $s = "";
                        }
                        echo '<option value="' . $danhmuc['genre_id'] . '"' . $s . '>' . $danhmuc['genre_name'] . '</option>';
                    }
                    ?>
                </select>

            </div>
            <div class="row2 mb10">
                <label>Tên sản phẩm </label> <br>
                <input type="text" name="tensp" value="<?= $product_name ?>">
            </div>

            <div class="row2 mb10">
                <label>giá </label> <br>
                <input type="text" name="giasp" value="<?= $product_price ?>">
            </div>
            <div class="row2 mb10">
                <label>hình </label> <br>
                <input type="file" name="hinh">
                <?= $hinh ?>
            </div>
            <div class="row2 mb10">
                <label>Mô tả </label> <br>
                <textarea name="mota" cols="30" rows="10"> <?= $product_content ?></textarea>
            </div>
            <div class="row mb10 ">
                <input type="hidden" name="id" value="<?= $product_id ?>">
                <input class="mr20" type="submit" value="Cập nhật" name="capnhat">
                <input class="mr20" type="reset" value="Nhập lại">

                <a href="index.php?act=listsp"><input class="mr20" type="button" value="DANH SÁCH"></a>
            </div>
            <?php
            if (isset($thongbao) && ($thongbao != "")) echo $thongbao;

            ?>


        </form>
    </div>
</div>