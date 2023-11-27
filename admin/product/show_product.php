<div class="admin-content">
    <h1>DANH SÁCH SẢN PHẨM</h1>

    <div class="row2 form_content ">
        <form action="index.php?act=listsp" method="POST" enctype="multipart/form-data">
            <div class="row2 mb10 formds_loai">

                <input type="text" name="kyw" class="search-input" style=" margin: 0 0 17px 1023px; ">
                <select name="iddm" class="search-input">
                    <option value="0">tất cả</option>
                    <?php
                    foreach ($listdanhmuc as $danhmuc) {
                        extract($danhmuc);
                        echo ' <option value="' . $genre_id . '">' . $genre_name . '</option>';
                    }
                    ?>
                </select>

                <input class="search-btn" type="submit" name="listok" value="Tìm kiếm">
        </form>

        <table>
            <tr>
                <th style="     width: 448px; ">TÊN SẢN PHẨM</th>
                <th>Hình</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th>Số lượng</th>
                <th>Lượt Xem</th>
                <th style="     WIDTH: 300px; ">Xem Bình Luận</th>
            </tr>

            <?php

            foreach ($listsanpham as $sanpham) {
                extract($sanpham);
                $suasp = "index.php?act=suasp&id=".$product_id;
                $xoasp = "index.php?act=xoasp&id=".$product_id;
                $showcomment = "index.php?act=showcommentofid&product_id=" . $product_id;
                $hinhpart = "../upload/" . $product_img;
                if (is_file($hinhpart)) {
                    $hinh = "<img src='" . $hinhpart . "'style='width: 200px;height: 150px;'>";
                } else {
                    $hinh = "no poto";
                }

                echo '<tr>
       <td>' . $product_name . '</td>
       <td style="width: 230px;">' . $hinh . '</td>
       <td>' . $product_price . '</td>
       <td>' . $product_content . '</td>
       <td>' . $product_quantity . '</td>
       <td>' . $product_view . '</td>
       <td>
            <a href="' . $suasp . '"><input type="button" value="Sửa" class="submit-btn"></a>
            <a href="' . $xoasp . '"><input type="button" value="Xóa" class="submit-btn"></a>
            <a href="' . $showcomment . '"><input type="button" value="xem comment" class="submit-btn"></a>
        </td>
      </tr>';
            }

            ?>
        </table>
    </div>
    <div class="row mb10 ">
        <a href="index.php?act=addsp"> <input  type="button" value="NHẬP THÊM" class="submit-btn" style="margin: 20px 11px;"></a>
        <a href="index.php?act=bieudosp"> <input type="button" value="Biểu đồ bình luận sản phẩm" class="submit-btn" style="margin: 20px 11px;"></a>
    </div>

</div>
</div>


