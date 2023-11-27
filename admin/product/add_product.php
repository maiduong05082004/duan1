<div class="admin-content">
    <h1>Thêm hàng hóa</h1>
    <div class="row2 form_content ">
        <form action="index.php?act=addsp" method="POST" enctype="multipart/form-data">

            <div class="container-add">
                <div class="form-section-add">
                    <div class="input-group-add-2">
                        <div class="left-box">
                            <div class="email">Tên sản phẩm</div>
                            <input type="text" id="email" name="tensp" placeholder="nhập tên">
                        </div>
                        <div class="right-box">
                            <div class="phone">giá</div>
                            <input type="text" id="phone" name="giasp" placeholder="1.000.000₫">
                        </div>
                    </div>
                    <div class="input-group-add-2">
                        <div class="left-box">
                            <div class="email">view</div>
                            <input type="text" id="email" name="view" placeholder="nhập view">
                        </div>
                        <div class="right-box">
                            <div class="phone">Số lượng</div>
                            <input type="number" id="phone" name="soluong">
                        </div>
                    </div>
                    <div class="input-group-add-2">
                        <div class="left-box">
                            <div class="email">mô tả</div>
                            <textarea id="phone" name="mota" rows="5" placeholder="nhập mô tả sản phẩm"></textarea>
                        </div>
                        <div class="right-box" style="margin-bottom: 42px; ">
                            <div class="phone">hình</div>
                            <input type="file" id="phone" name="hinh">
                            <div class="row2 mb10 form_content_container">
                                <label> Danh Mục </label> <br>
                                <select name="iddm" id="phone">
                                    <?php
                                    foreach ($listdanhmuc as $danhmuc) {
                                        extract($danhmuc);
                                        echo ' <option value="' . $genre_id . '">' . $genre_name . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb10 ">
                        <input class="submit-btn" type="submit" value="THÊM MỚI" name="themmoi">
                        <input class="submit-btn" type="reset" value="NHẬP LẠI" style="     margin: 0 10px; ">

                        <a href="index.php?act=listsp"><input class="submit-btn" type="button" value="DANH SÁCH"></a>
                    </div>
                    <?php
                    if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
                    ?>
                </div>
            </div>
        </form>
    </div>
</div>