
<div class="admin-content">
    <div class="row2 font_title">
        <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
    </div>
    <div class="row2 form_content ">
        <form action="index.php?act=listdm" method="POST">
            <div class="row2 mb10 formds_loai">
                <table>
                    <tr>
                        <th>TÊN LOẠI</th>
                        <th>Hành động</th>
                    </tr>
                    <?php
                        foreach($listdanhmuc as $danhmuc) {
                            extract($danhmuc);
                            $suadm = "index.php?act=suadm&genre_id=".$genre_id;
                            $xoadm = "index.php?act=xoadm&genre_id=".$genre_id;
                            echo '<tr>
                                <td>'.$genre_name.'</td>
                                <td><a href="'.$suadm.'"><input type="button" value="Sửa" class="submit-btn"></a> <a href="'.$xoadm.'"><input type="button" class="submit-btn" value="Xóa"></a></td>
                            </tr>';
                        }
                    ?>

                </table>
            </div>
            <div class="row mb10 ">
                <a href="index.php?act=adddm"> <input class="submit-btn" type="button" value="NHẬP THÊM" style="margin: 20px 11px;"></a>
            </div>
        </form>
    </div>
</div>




</div>